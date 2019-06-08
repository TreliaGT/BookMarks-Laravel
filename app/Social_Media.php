<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social_Media extends Model
{
    public function Profile()
    {
        return $this->belongsTo('App\Profile');
    }
}
