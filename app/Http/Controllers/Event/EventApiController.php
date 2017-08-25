<?php

namespace App\Http\Controllers\Event;

use App\Repositories\EventRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventApiController extends Controller
{
    protected $events;

    public function __construct(EventRepository $eventRepository)
    {
        $this->events = $eventRepository;
    }

    public function handleRegister(Request $request)
    {
        $user = $request->user();

        $event = $this->events->getById($request->input('eventId'));

        return $event;
    }
}
