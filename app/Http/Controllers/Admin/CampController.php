<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Media;
use App\Models\Camp;
use Validator;

class CampController extends Controller
{
    public function index()
    {
        $media = Media::all();
        $camps = Camp::first();

        return view('admin.camps.index')
        ->with('current', $camps)
        ->with('media', $media);
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),
        [
            'image_id' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
        ]);
        if($validation->passes())
        {

            $camp =  Camp::find($id)->update($request->all());

            return response()->json([
                'message'        => 'camps saved Successfully',
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
}
