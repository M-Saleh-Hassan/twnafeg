<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormElement extends Model
{
    protected $fillable = ['form_id', 'label', 'type', 'name', 'id_attribute', 'value', 'active'];
    
    public function options()
    {
        return $this->hasMany('App\Models\FormElementOption', 'form_element_id');
    }
}
