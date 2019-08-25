<?php

namespace App\Http\Controllers\Admin;

use App\Models\FormElement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class FormElementController extends Controller
{
    public function save(Request $request, $form_id)
    {
        $validation = Validator::make($request->all(),
        [
            'label' => 'required|max:51|min:3',
            'name'  => 'required|max:51',
        ]);

        if($validation->passes())
        {
            $data = $request->all();
            $data['form_id'] = $form_id;
            $data['active'] = ($request->active == '1') ? 1 : 0;

            $element= FormElement::create($data);

            return response()->json([
                'message'        => 'element saved Successfully',
                'errors'         => '',
                'element_id'    => $element->id,
                'element_label'    => $element->label,
                'element_link_edit'=> route('admin.forms.elements.edit', [$form_id, $element->id]),
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

    public function edit(Request $request, $form_id, $id)
    {
        $current = FormElement::find($id);

        return view('admin.forms.elements.edit')
        ->with('current', $current)
        ->with('form_id', $form_id)
        ->with('counter', 1);

    }

    public function update(Request $request, $form_id, $id)
    {
        $validation = Validator::make($request->all(),
        [
            'label' => 'required|max:51|min:3',
            'name'  => 'required|max:51',
        ]);

        if($validation->passes())
        {
            $data = $request->all();
            $data['form_id'] = $form_id;
            $data['active'] = ($request->active == '1') ? 1 : 0;

            $element= FormElement::find($id)->update($data);

            return response()->json([
                'message'  => 'element saved Successfully',
                'redirect' => route('admin.forms.elements.edit', [$form_id, $id]),
                'errors'   => '',
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
        $element= FormElement::find($request->id);
        $element->delete();
        return response()->json(array('id' => $request->id), 200);
    }
}
