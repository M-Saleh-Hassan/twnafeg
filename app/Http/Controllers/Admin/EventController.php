<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Event;
use App\Models\Media;
use Validator;

class EventController extends Controller
{
    public function index()
    {
        $media = Media::all();
        $events = Event::OrderBy('date_to_compare','DESC')->get();

        return view('admin.events.index')
        ->with('media', $media)
        ->with('events', $events)
        ->with('counter', 1);
    }

    public function save(Request $request)
    {
        $validation = Validator::make($request->all(),
        [
            'title'           => 'required|max:51|min:3',
            'image_id'        => 'required',
            'date_text'       => 'required',
            'date_to_compare' => 'required',
            'description'     => 'required',
            'place'           => 'required',
            'map'             => 'required',
            'price'           => 'required',
        ]);

        if($validation->passes())
        {
            $event= Event::create($request->all());

            return response()->json([
                'message'        => 'event saved Successfully',
                'errors'         => '',
                'event_id'    => $event->id,
                'event_title'    => $event->title,
                'event_link_edit'=> route('admin.events.edit', [$event->id]),
                'event_date_to_compare' => $event->date_to_compare,
            ]);
        }
        else
        {
            return response()->json([
                'message' => '',
                'errors'  => $validation->errors()->all(),
            ]);
        }

    }

    public function edit(Request $request, $id)
    {
        $current = Event::find($id);
        $media = Media::all();

        return view('admin.events.edit')
        ->with('current', $current)
        ->with('media', $media)
        ->with('counter', 1);

    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),
        [
            'title'           => 'required|max:51|min:3',
            'image_id'        => 'required',
            'date_text'       => 'required',
            'date_to_compare' => 'required',
            'description'     => 'required',
            'place'           => 'required',
            'map'             => 'required',
            'price'           => 'required',
        ]);

        if($validation->passes())
        {

            $event= Event::find($id)->update($request->all());

            return response()->json([
                'message'        => 'event saved Successfully',
                'errors'         => '',
            ]);
        }
        else
        {
            return response()->json([
                'message' => '',
                'errors'  => $validation->errors()->all(),
            ]);
        }

    }

    public function delete(Request $request)
    {
        $event= Event::find($request->id);
        $event->delete();
        return response()->json(array('id' => $request->id), 200);
    }
}
