<?php

namespace App\Http\Controllers\english;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Models\WebsiteText;

class HomeController extends Controller
{
    public function index()
    {

        $slides = Slide::orderBy('order', 'ASC')->get();
        $website_text = WebsiteText::first();

        return view('english.home.index')
        ->with('slides', $slides)
        ->with('website_text', $website_text);
    }
}
