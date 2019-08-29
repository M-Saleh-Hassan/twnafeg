<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\Event;

class AdminController extends Controller
{

    public function index()
    {
        $forms_count  = Form::get()->count();
        $events_count = Event::get()->count();
        return view('admin.home.index')
        ->with('forms_count', $forms_count)
        ->with('events_count', $events_count);
    }
}
