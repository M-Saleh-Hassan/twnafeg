<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormElementOption extends Model
{
    protected $fillable = ['form_element_id', 'value', 'active', 'default'];

}
