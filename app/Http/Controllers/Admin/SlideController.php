<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\Slide;
use App\Models\Media;
use Validator;

class SlideController extends Controller
{
    public function index()
    {
        $media = Media::all();
        $slides = Slide::OrderBy('order','ASC')->get();

        return view('admin.slides.index')
        ->with('media', $media)
        ->with('slides', $slides)
        ->with('counter', 1);
    }

    public function save(Request $request)
    {
        $validation = Validator::make($request->all(),
        [
            'order'      => 'required|numeric|min:1',
            'image'      => 'required',
        ]);

        if($validation->passes())
        {
            $order = $request->order;
            $image = $request->image;

            $slide = new Slide;
            $slide->order     = $order;
            $slide->image_id     = $image;
            $slide->save();

            return response()->json([
                'message'        => 'slide saved Successfully',
                'errors'         => '',
                'slide_id'    => $slide->id,
                'slide_link_text'=> route('admin.slides.text.index', [$slide->id]),
                'slide_link_edit'=> route('admin.slides.edit', [$slide->id]),
                'slide_count' => Slide::get()->count(),
                'slide_order' => $slide->order,
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
        $current = Slide::find($id);
        $media = Media::all();

        return view('admin.slides.edit')
        ->with('current', $current)
        ->with('media', $media)
        ->with('counter', 1);

    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),
        [
            'order'      => 'required|numeric|min:1',
            'image'      => 'required',
        ]);

        if($validation->passes())
        {

            $order = $request->order;
            $image = $request->image;

            $slide = Slide::find($id);
            $slide->order = $order;
            $slide->image_id = $image;
            $slide->save();



            return response()->json([
                'message'        => 'Slide saved Successfully',
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
        $slide = Slide::find($request->id);
        $slide->delete();
        return response()->json(array('id' => $request->id), 200);
    }
}
