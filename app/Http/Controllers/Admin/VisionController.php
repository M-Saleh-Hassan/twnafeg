<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vision;

use Validator;

class VisionController extends Controller
{
    public function index()
    {
        $vision = Vision::find(1);

        return view('admin.vision.index')
        ->with('vision', $vision);
    }

    public function update(Request $request)
    {
        $validation = Validator::make($request->all(),
        [
            'vision_text'  => 'required|min:10'
        ]);

        if($validation->passes())
        {
            $vision = Vision::find(1);
            $vision->text  = $request->vision_text;
            $vision->save();


            return response()->json([
                'message'        => 'Vision saved Successfully',
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
