<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Testimonial;
use Validator;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();

        return view('admin.testimonials.index')
        ->with('testimonials', $testimonials)
        ->with('counter', 1);
    }

    public function save(Request $request)
    {
        $validation = Validator::make($request->all(),
        [
            'text'  => 'required',
            'order' => 'required|numeric|min:1',
        ]);

        if($validation->passes())
        {
            $testimonial= Testimonial::create($request->all());

            return response()->json([
                'message'        => 'testimonial saved Successfully',
                'errors'         => '',
                'testimonial_id'    => $testimonial->id,
                'testimonial_order'    => $testimonial->order,
                'testimonial_text'    => $testimonial->text,
                'testimonial_link_edit'=> route('admin.testimonials.edit', [$testimonial->id]),
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
        $current = testimonial::find($id);

        return view('admin.testimonials.edit')
        ->with('current', $current)
        ->with('counter', 1);

    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),
        [
            'text'  => 'required',
            'order' => 'required',
        ]);

        if($validation->passes())
        {

            $testimonial= Testimonial::find($id)->update($request->all());

            return response()->json([
                'message'        => 'testimonial saved Successfully',
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
        $testimonial= Testimonial::find($request->id);
        $testimonial->delete();
        return response()->json(array('id' => $request->id), 200);
    }
}
