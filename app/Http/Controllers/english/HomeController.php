<?php

namespace App\Http\Controllers\english;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Models\Event;
use App\Models\WebsiteText;
use App\Models\Testimonial;
use App\Models\News;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {

        $slides = Slide::orderBy('order', 'ASC')->get();
        $events = Event::where('date_to_compare', '>=', date('Y-m-d'))->get();
        $testimonials = Testimonial::orderBy('order', 'ASC')->get();
        $news = News::all();
        $website_text = WebsiteText::first();
        $setting = Setting::first();

        return view('english.home.index')
        ->with('slides', $slides)
        ->with('events', $events)
        ->with('testimonials', $testimonials)
        ->with('news', $news)
        ->with('website_text', $website_text)
        ->with('setting', $setting);
    }

    public function news($id)
    {
        $news = News::find($id);
        if(!$news) return redirect()->route('en.home.index');

        return view('english.news.index')
        ->with('news', $news);
    }

    public function camps()
    {
        return view('english.home.camps');
    }

    public function sessions()
    {
        return view('english.home.sessions');
    }

    public function trainings()
    {
        return view('english.home.trainings');
    }

}
