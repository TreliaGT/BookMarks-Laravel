<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;

class Bookmark extends Model
{
    use Taggable;

    protected $fillable= [
        'title', 'url', 'description' , 'thumbnail', 'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }


}
