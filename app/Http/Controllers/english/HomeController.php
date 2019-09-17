<?php

namespace App\Http\Controllers\english;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Camp;
use App\Models\CampImage;
use App\Models\Slide;
use App\Models\Event;
use App\Models\WebsiteText;
use App\Models\Testimonial;
use App\Models\News;
use App\Models\Session;
use App\Models\SessionImage;
use App\Models\Setting;
use App\Models\Training;
use App\Models\TrainingImage;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $slides = Slide::orderBy('order', 'ASC')->get();
        $events = Event::where('date_to_compare', '>=', date('Y-m-d'))->get();
        $testimonials = Testimonial::orderBy('order', 'ASC')->get();
        $news = News::all();
        $website_text = WebsiteText::first();
        $setting = Setting::first();
        $camp = Camp::first();
        $training = Training::first();
        $session = Session::first();

        $event_modal = 0;

        if($request->has('event'))
        {
            $event = Event::where('slug', $request->event)->first();
            if(!empty($event)) $event_modal = $event->id;
            else $event_modal = 0;
        }

        return view('english.home.index')
        ->with('slides', $slides)
        ->with('events', $events)
        ->with('testimonials', $testimonials)
        ->with('news', $news)
        ->with('website_text', $website_text)
        ->with('setting', $setting)
        ->with('camp', $camp)
        ->with('training', $training)
        ->with('session', $session)
        ->with('event_modal' , $event_modal);
    }

    public function news($id)
    {
        $news = News::find($id);
        if(!$news) return redirect()->route('en.home.index', [app()->getLocale()]);

        return view('english.news.index')
        ->with('news', $news);
    }

    public function camps()
    {
        $camp = Camp::first();
        $camp_images = CampImage::all();

        return view('english.home.camps')
        ->with('camp', $camp)
        ->with('camp_images', $camp_images);
    }

    public function sessions()
    {
        $session = Session::first();
        $session_images = SessionImage::all();

        return view('english.home.sessions')
        ->with('session', $session)
        ->with('session_images', $session_images);
    }

    public function trainings()
    {
        $training = Training::first();
        $training_images = TrainingImage::all();

        return view('english.home.trainings')
        ->with('training', $training)
        ->with('training_images', $training_images);
    }

}
