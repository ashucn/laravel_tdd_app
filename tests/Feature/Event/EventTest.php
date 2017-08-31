<?php

namespace Tests\Feature\Event;

use App\User;
use App\Models\Event;
use Faker\Factory;
use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EventTest extends TestCase
{

    use DatabaseMigrations;

    private $user;

    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->user = factory(User::class)->create();
    }

    /** @test */
    public function a_guest_should_not_see_events_list()
    {
        $this->get(route('events'))
            ->assertRedirect(route('login'));
    }

    // the method name should start at 'test'

    /** @test */
    public function user_can_see_list_of_events()
    {
        $event = factory(Event::class)->create();

        // vendor/bin/phpunit
        $this->actingAs($this->user)
            ->get(route('events'))
            ->assertStatus(200)
            ->assertSeeText($event->title)
            ->assertSeeText(limit_words($event->description, 30));
    }

    /** @test */
    public function a_guest_can_see_event_detail()
    {
        $event = factory(Event::class)->create();
        $this->actingAs($this->user)
            ->get(route('event-view', $event->slug))
            ->assertSeeText($event->title);
//            ->assertSeeText($event->creator->name);
    }


    public function a_user_can_create_an_event_and_view_it()
    {
        $faker = Factory::create();
        $title = $faker->sentence(3);
        $postData = [
            'title'       => $title,
            'description' => $faker->paragraph(3),
            'address'     => $faker->address,
            'lat'         => $faker->latitude,
            'lng'         => $faker->longitude,
            'start_date'  => $faker->dateTime,
            'end_date'    => $faker->dateTime,
            'user_id'     => $this->user->id,
            'slug'        => Str::slug($title) . '-' . uniqid(time()),
        ];

        $this->actingAs($this->user)
            ->post(route('event-store'), $postData)
            ->assertRedirect(route('events'));

        $this->get(route('events'))
            ->assertSee($title);
    }


    public function confirm_fields_are_required_to_create_event()
    {

        $this->actingAs($this->user)
            ->post(route('event-store'), [])
            ->assertSessionHasErrors([
                'title',
                'description',
                'address',
                'start_date',
                'end_date',
            ]);
    }


}
