<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlideText extends Model
{
    protected $table = "slide_text";

    public function slide()
    {
        return $this->belongsTo('App\Models\Slide', 'slide_id');
    }
}
