<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
    protected $fillable = ['title', 'date', 'image_id', 'link'];

    public function image()
    {
        return $this->belongsTo('App\Models\Media', 'image_id');
    }
}
