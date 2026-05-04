<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View {
        $events = Event::all();

        // dd($events);  // dump and die dump ($events)  die();


        return view('events.index', ['title' => 'GFU Training Schedule', 'events' => $events,]);
    }
}
