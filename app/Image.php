<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $hidden = ['user_id', 'post_id'];
    public $appends = ['url'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function author()
    {
        return $this->user();
    }

    public function getUrlAttribute()
    {
        return Storage::disk('s3')->url($this->path);
    }
}
