<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    public function image()
    {
        return $this->belongsTo('App\Models\Media', 'image_id');
    }

    public function text()
    {
        return $this->hasMany('App\Models\SlideText', 'slide_id');
    }

}
