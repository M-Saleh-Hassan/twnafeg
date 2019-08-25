<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Form;
use Validator;

class FormController extends Controller
{
    public function index()
    {
        $forms = Form::all();

        return view('admin.forms.index')
        ->with('forms', $forms)
        ->with('counter', 1);
    }

    public function save(Request $request)
    {
        $validation = Validator::make($request->all(),
        [
            'title'           => 'required|max:51|min:3',
        ]);

        if($validation->passes())
        {
            $form= Form::create($request->all());

            return response()->json([
                'message'        => 'form saved Successfully',
                'errors'         => '',
                'form_id'    => $form->id,
                'form_title'    => $form->title,
                'form_link_edit'=> route('admin.forms.edit', [$form->id]),
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
        $current = Form::find($id);

        return view('admin.forms.edit')
        ->with('current', $current)
        ->with('counter', 1);

    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),
        [
            'title'           => 'required|max:51|min:3',
        ]);

        if($validation->passes())
        {

            $form= Form::find($id)->update($request->all());

            return response()->json([
                'message'        => 'form saved Successfully',
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
        $form= Form::find($request->id);
        $form->delete();
        return response()->json(array('id' => $request->id), 200);
    }
}
