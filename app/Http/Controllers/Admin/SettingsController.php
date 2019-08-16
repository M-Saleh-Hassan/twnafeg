<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Media;

use Validator;

class SettingsController extends Controller
{
    public function index()
    {
        $media = Media::all();
        $settings = Setting::first();

        return view('admin.settings.index')
        ->with('current', $settings)
        ->with('media', $media);
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),
        [
            'website_title' => 'required|max:51|min:3',
            'email' => 'required|email',
            'logo' => 'required',
            'fav_icon' => 'required',
        ]);
        if($validation->passes())
        {

            $website_title = $request->website_title;
            $email    = $request->email;
            $logo     = $request->logo;
            $fav_icon = $request->fav_icon;
            $fb       = $request->fb;
            $whatsapp = $request->whatsapp;
            $fb_show  = ($request->fb_show == '1') ? 1 : 0;
            $whatsapp_show = ($request->whatsapp_show == '1') ? 1 : 0;
            $setting =  Setting::find($id);
            $setting->website_title   = $website_title;
            $setting->email           = $email;
            $setting->logo            = $logo;
            $setting->fav             = $fav_icon;
            $setting->facebook_link   = $fb;
            $setting->whatsapp_number = $whatsapp;
            $setting->facebook_link_show = $fb_show;
            $setting->whatsapp_number_show = $whatsapp_show;
            $setting->save();

            return response()->json([
                'message'        => 'Settings saved Successfully',
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
