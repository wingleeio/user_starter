<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repost extends Model
{
    function post()
    {
        $this->belongsTo('App\Post');
    }

    function user()
    {
        $this->belongsTo('App\User');
    }
}
