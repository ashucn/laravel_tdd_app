<?php

namespace App\Http\Controllers\Event;

use App\Models\Event;
use App\Repositories\EventRepository;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{

    protected $events;

    public function __construct(EventRepository $eventsRepository)
    {
        $this->events = $eventsRepository;
    }

    public function index()
    {
        $upcomingEvents = $this->events->getUpcomingEvents('desc', 'created_at');
        $pastEvents = $this->events->getPastEvents();

        return view('event.event-list', compact('upcomingEvents', 'pastEvents'));
    }

    public function show(Event $event)
    {
        return view('event.event-show', compact('event'));
    }

    public function add()
    {
        return view('event.event-add');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'title'       => 'required',
            'description' => 'required',
            'address'     => 'required',
            'lat'         => 'required',
            'lng'         => 'required',
            'start_date'  => 'required',
            'end_date'    => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['user_id'] = $request->user()->id;
        $data['slug'] = Str::slug($data['title']) . '-' . uniqid(time());

        $this->events->store($data);

        return redirect(route('events'))->with('status', 'Add new event successfully');
    }
}
