<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMediaLink extends Model
{
    protected $fillable = [
        'name', 'url', 'profile_id'
    ];

    public function Profile()
    {
        return $this->belongsTo('App\Profile');
    }
}
