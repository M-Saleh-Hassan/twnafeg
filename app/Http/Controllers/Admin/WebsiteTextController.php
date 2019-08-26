<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WebsiteText;

use Validator;

class WebsiteTextController extends Controller
{
    public function index()
    {
        $text = WebsiteText::find(1);

        return view('admin.website_Text.index')
        ->with('text', $text);
    }

    public function update(Request $request)
    {
        $validation = Validator::make($request->all(),
        [
            'how_it_started'  => 'required',
            'quote1'  => 'required',
            'then_in_egypt'  => 'required',
            'quote2'  => 'required',
            'camps_description'  => 'required',
            'internationally_today'  => 'required',
            'vision'  => 'required',
            'quote3'  => 'required',
            'mother_design'  => 'required',
            'quote4'  => 'required',
            'who_we_are'  => 'required',
            'get_in_touch'  => 'required',
        ]);

        if($validation->passes())
        {
            $text = WebsiteText::first()->update($request->all());

            return response()->json([
                'message'        => 'text saved Successfully',
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
