<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public function getLogo()
    {
        return $this->belongsTo('App\Models\Media', 'logo');
    }

    public function getFav()
    {
        return $this->belongsTo('App\Models\Media', 'fav');
    }
}
