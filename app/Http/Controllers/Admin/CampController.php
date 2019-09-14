<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Media;
use App\Models\Camp;
use App\Models\CampImage;
use Validator;

class CampController extends Controller
{
    public function index()
    {
        $media = Media::all();
        $camps = Camp::first();
        $camp_images = CampImage::all();

        return view('admin.camps.index')
        ->with('current', $camps)
        ->with('media', $media)
        ->with('camp_images', $camp_images)
        ->with('counter', 1);
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

    public function upload(Request $request)
    {
        // This method will cover file upload
        $photos = [];
        foreach ($request->photos as $photo) {
            $name = date('mdYHis') . uniqid() . $photo->getClientOriginalName();
            $size = round($photo->getSize() / 1024, 2);
            $filename = $photo->move('storage/photos/', $name);

            // $link = str_replace('public/', 'storage/',$filename);
            $link = 'storage/photos/'.$name;
            $original_name = $photo->getClientOriginalName();
            $type = $photo->getClientOriginalExtension();
            // $size = round(Storage::size($filename) / 1024, 2);

            $media_object = new CampImage;
            $media_object->original_name = $original_name;
            $media_object->size = $size;
            $media_object->link = $link;
            $media_object->type = $type;
            $media_object->save();

            $photo_object = new \stdClass();
            $photo_object->name = $original_name;
            $photo_object->size = $size;
            $photo_object->fileID = $media_object->id;
            $photo_object->link = $link;
            $photo_object->type = $type;
            $photos[] = $photo_object;
        }

        return response()->json(array('files' => $photos), 200);
    }

    public function delete(Request $request)
    {
        $media = CampImage::find($request->id);
        unlink($media->link);
        $media->delete();
        return response()->json(array('id' => $request->id), 200);
    }
}
