<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $hidden = ['user_id'];
    protected $with = ['author', 'replies'];
    protected $withCount = ['likes', 'reposts'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function reposts()
    {
        return $this->hasMany('App\Repost');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function author()
    {
        return $this->user();
    }

    public function hearts()
    {
        return $this->belongsToMany('App\User');
    }

    public function replies()
    {
        return $this->hasMany('App\Post', 'parent_id');
    }
}
