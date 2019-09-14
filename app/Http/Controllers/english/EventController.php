<?php

namespace App\Http\Controllers\english;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{
    public function index($slug)
    {
        $event = Event::whereSlug($slug)->first();
        if(empty($event)) return redirect()->route('en.home.index');

        return view('english.events.index')
        ->with('event', $event)
        ->with('event_modal' , 0);
    }
}
