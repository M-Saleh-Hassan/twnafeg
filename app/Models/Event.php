<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['image_id', 'title', 'description', 'date_text', 'date_to_compare', 'place', 'map', 'price'];

    public function image()
    {
        return $this->belongsTo('App\Models\Media', 'image_id');
    }
}
