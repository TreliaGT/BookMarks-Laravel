<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $fillable= [
     'first_name','last_name', 'user_id'];

    public function user()
{
    return $this->belongsTo('App\User');
}

    public function social_media(){
        return $this->hasMany('App\SocialMediaLink');
    }
}
