<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repost extends Model
{
    function post()
    {
        return $this->belongsTo('App\Post');
    }

    function user()
    {
        return $this->belongsTo('App\User');
    }
}
