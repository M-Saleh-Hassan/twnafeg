<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = ['image_id', 'short_description', 'long_description'];

    public function image()
    {
        return $this->belongsTo('App\Models\Media', 'image_id');
    }

}
