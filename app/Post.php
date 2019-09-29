<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $hidden = ['user_id', 'image_id'];
    protected $with = ['author', 'replies', 'image'];
    protected $withCount = ['likes', 'reposts'];
    protected $appends = ['liked_by_user', 'reposted_by_user'];

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

    public function image()
    {
        return $this->hasOne('App\Image', 'id', 'image_id');
    }

    public function getLikedByUserAttribute()
    {
        $liked = false;

        if (!auth('api')->check()) {
            return $liked;
        }

        $like = $this->likes()->where('user_id', '=', auth('api')->user()->id)->first();

        if ($like) {
            $liked = true;
        }

        return $liked;
    }

    public function getRepostedByUserAttribute()
    {
        $reposted = false;

        if (!auth('api')->check()) {
            return $reposted;
        }

        $repost = $this->reposts()->where('user_id', '=', auth('api')->user()->id)->first();

        if ($repost) {
            $reposted = true;
        }

        return $reposted;
    }
}
