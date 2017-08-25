<?php

namespace App\Http\Controllers\Event;

use App\Models\Participant;
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
        $participant = Participant::where(['user_id' => $user->id, 'event_id' => $event->id])->first();
        if ($participant) {
            // 删除 1
            $participant->delete();
            $type = 1;
        } else {
            // 添加 2
            $this->events->registerForEvent($event, $user);
            $type = 2;
        }

        return response(['type' => $type, ], 200);
    }
}
