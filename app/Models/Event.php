<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['form_id', 'slug', 'image_id', 'title', 'description', 'long_description', 'home_date_days', 'home_date_month', 'date_text', 'date_to_compare', 'place', 'map', 'price'];

    public function form()
    {
        return $this->belongsTo('App\Models\Form', 'form_id');
    }

    public function image()
    {
        return $this->belongsTo('App\Models\Media', 'image_id');
    }
}
