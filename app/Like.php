<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    function user()
    {
        $this->hasOne('App\User');
    }

    function post()
    {
        $this->hasOne('App\Post');
    }
}
