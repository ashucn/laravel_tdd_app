<?php

namespace App\Listeners;

use App\Events\EventRegistered;
use App\Jobs\RegisteredEventConfirmEmail;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventRegisteredListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EventRegistered  $event
     * @return void
     */
    public function handle(EventRegistered $eventRegistered)
    {
/*        $username = $eventRegistered->user->name;
        $eventId = $eventRegistered->event->id;
       \Log::info("{$username} has registered event {$eventId}");*/
        // dispatch job
        dispatch(new RegisteredEventConfirmEmail($eventRegistered->event, $eventRegistered->user));
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            EventRegistered::class,
            'App\Listeners\EventRegisteredListener@handle'
        );
    }
}
