<?php

namespace App\Http\Controllers\Admin;

use App\Models\FormElementOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class FormElementOptionController extends Controller
{
    public function save(Request $request, $form_id, $element_id)
    {
        $validation = Validator::make($request->all(),
        [
            'text' => 'required',
            'value' => 'required',
        ]);

        if($validation->passes())
        {
            $data = $request->all();
            $data['form_element_id'] = $element_id;
            $data['active'] = ($request->active == '1') ? 1 : 0;
            $data['default'] = ($request->default == '1') ? 1 : 0;

            $option= FormElementOption::create($data);

            return response()->json([
                'message'        => 'option saved Successfully',
                'errors'         => '',
                'option_id'    => $option->id,
                'option_value'    => $option->text,
                'option_link_edit'=> route('admin.forms.elements.options.edit', [$form_id, $element_id, $option->id]),
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

    public function edit(Request $request, $form_id, $element_id, $id)
    {
        $current = FormElementOption::find($id);

        return view('admin.forms.elements.options.edit')
        ->with('current', $current)
        ->with('form_id', $form_id)
        ->with('element_id', $element_id)
        ->with('counter', 1);

    }

    public function update(Request $request, $form_id, $element_id, $id)
    {
        $validation = Validator::make($request->all(),
        [
            'text' => 'required',
            'value' => 'required',
        ]);

        if($validation->passes())
        {
            $data = $request->all();
            $data['form_element_id'] = $element_id;
            $data['active'] = ($request->active == '1') ? 1 : 0;
            $data['default'] = ($request->default == '1') ? 1 : 0;

            $option= FormElementOption::find($id)->update($data);

            return response()->json([
                'message'        => 'option saved Successfully',
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
        $option= FormElementOption::find($request->id);
        $option->delete();
        return response()->json(array('id' => $request->id), 200);
    }
}
