<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $fillable= [
        'title', 'url', 'description' , 'thumbnail', 'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }


}
