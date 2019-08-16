<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\News;
use App\Models\Media;
use Validator;

class NewsController extends Controller
{
    public function index()
    {
        $media = Media::all();
        $news  = News::all();

        return view('admin.news.index')
        ->with('media', $media)
        ->with('news', $news)
        ->with('counter', 1);
    }

    public function save(Request $request)
    {
        $validation = Validator::make($request->all(),
        [
            'title'    => 'required|max:51|min:3',
            'image_id' => 'required',
            'date'     => 'required',
        ]);

        if($validation->passes())
        {
            $news= News::create($request->all());

            return response()->json([
                'message'        => 'news saved Successfully',
                'errors'         => '',
                'news_id'        => $news->id,
                'news_title'     => $news->title,
                'news_link_edit' => route('admin.news.edit', [$news->id]),
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
        $current = News::find($id);
        $media   = Media::all();

        return view('admin.news.edit')
        ->with('current', $current)
        ->with('media', $media)
        ->with('counter', 1);

    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),
        [
            'title'    => 'required|max:51|min:3',
            'image_id' => 'required',
            'date'     => 'required',
        ]);

        if($validation->passes())
        {

            $news= News::find($id)->update($request->all());

            return response()->json([
                'message'        => 'news saved Successfully',
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
        $news= News::find($request->id);
        $news->delete();
        return response()->json(array('id' => $request->id), 200);
    }
}
