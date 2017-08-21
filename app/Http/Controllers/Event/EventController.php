<?php

namespace App\Http\Controllers\Event;

use App\Models\Event;
use Carbon\Carbon;
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
}
