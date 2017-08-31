<?php

namespace App\Listeners;

use App\Events\EventDeRegistered;
use App\Jobs\DeRegisteredEventConfirmEmail;

class EventDeRegisteredListener
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
    public function handle(EventDeRegistered $eventDeRegistered)
    {

        dispatch(new DeRegisteredEventConfirmEmail($eventDeRegistered->event, $eventDeRegistered->user));
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            EventDeRegistered::class,
            'App\Listeners\EventDeRegisteredListener@handle'
        );
    }
}
