<?php

namespace App\Http\Controllers\english;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slide;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slide::orderBy('order', 'ASC')->get();
        return view('english.home.index')
        ->with('slides', $slides);
    }
}
