<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $fillable= [
    'email', 'first_name','last_name', 'user_id'];
}
