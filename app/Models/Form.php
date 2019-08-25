<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = ['title', 'id_attribute', 'name_attribute'];
    
    public function elements()
    {
        return $this->hasMany('App\Models\FormElement', 'form_id');
    }
}
