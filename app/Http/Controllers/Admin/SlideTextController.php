<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Models\SlideText;
use Validator;

class SlideTextController extends Controller
{
    public function index($id)
    {
        $slide = Slide::find($id);

        return view('admin.slides.text.index')
        ->with('slide', $slide)
        ->with('counter', 1);
    }

    public function save(Request $request)
    {
        $validation = Validator::make($request->all(),
        [
            'text'      => 'required|max:51|min:3',
            'order'      => 'required|numeric|min:1|unique:slide_text,order',
        ]);

        if($validation->passes())
        {
            $order = $request->order;
            $text  = $request->text;
            $type  = $request->type;

            $slide_text = new SlideText;
            $slide_text->slide_id = $request->slide_id;
            $slide_text->type     = $type;
            $slide_text->order    = $order;
            $slide_text->text     = $text;
            $slide_text->save();

            return response()->json([
                'message'        => 'slide text saved Successfully',
                'errors'         => '',
                'slide_text_id'    => $slide_text->id,
                'slide_text_link_edit'=> route('admin.slides.text.edit', [$request->slide_id,$slide_text->id]),
                'slide_text_text' => $slide_text->text,
                'slide_text_order' => $slide_text->order,
                'slide_text_count' => SlideText::get()->count(),
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

    public function edit(Request $request, $slide_id, $id)
    {
        $current = SlideText::find($id);
        $slide = Slide::find($slide_id);

        return view('admin.slides.text.edit')
        ->with('current', $current)
        ->with('slide', $slide)
        ->with('counter', 1);

    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),
        [
            'text'      => 'required|max:51|min:3',
            'order'      => 'required|numeric|min:1',
        ]);

        if($validation->passes())
        {

            $order = $request->order;
            $text  = $request->text;
            $type  = $request->type;

            $slide_text = SlideText::find($id);
            $slide_text->type     = $type;
            $slide_text->order    = $order;
            $slide_text->text     = $text;
            $slide_text->save();


            return response()->json([
                'message'        => 'Slide Text saved Successfully',
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
        $slide = SlideText::find($request->id);
        $slide->delete();
        return response()->json(array('id' => $request->id), 200);
    }
}
