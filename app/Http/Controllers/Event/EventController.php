<?php

namespace App\Http\Controllers\Event;

use App\Models\Event;
use Carbon\Carbon;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {
        $today = Carbon::today()->format('Y-m-d');
        $upcomingEvents = Event::where('end_date', '>', $today)
            ->orderBy('start_date', 'desc')
            ->get();
        $pastEvents = Event::where('end_date', '<', $today)
            ->orderBy('start_date', 'desc')
            ->limit(3)
            ->get();

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

        $event = new Event;
        $event->fill($data);
        $event->save();
//        dd($event);

        return redirect(route('events'))->with('status', 'Add new event successfully');
    }
}
