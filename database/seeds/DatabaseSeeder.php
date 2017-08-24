<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        \App\User::create([
            'name' => 'ashucn',
            'email' => 'ashucn@gmail.com',
            'password' => bcrypt('666666'),
            'remember_token' => str_random(10),
        ]);

        factory(\App\Models\Event::class, 20)->create();
    }
}
