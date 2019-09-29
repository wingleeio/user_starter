<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $hidden = ['user_id', 'post_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function author()
    {
        return $this->user();
    }
}
