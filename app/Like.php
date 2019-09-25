<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    function user()
    {
        return $this->hasOne('App\User');
    }

    function post()
    {
        return $this->hasOne('App\Post');
    }
}
