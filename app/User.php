<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_verified_at', 'avatar_id', 'cover_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['following_user', 'followed_by'];

    protected $with = ['avatar', 'cover'];

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function avatar()
    {
        return $this->hasOne('App\Image', 'id', 'avatar_id');
    }

    public function cover()
    {
        return $this->hasOne('App\Image', 'id', 'cover_id');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function followers()
    {
        return $this->belongsToMany('App\User', 'follower_user', 'user_id', 'follower_id');
    }

    public function following()
    {
        return $this->belongsToMany('App\User', 'follower_user', 'follower_id', 'user_id');
    }

    public function getFollowingUserAttribute()
    {
        $following = false;

        if (!auth('api')->check()) {
            return $following;
        }

        $follower = $this->followers()->where('id', '=', auth('api')->user()->id)->first();

        if ($follower) {
            $following = true;
        }

        return $following;
    }

    public function getFollowedByAttribute()
    {
        $following = false;

        if (!auth('api')->check()) {
            return $following;
        }

        $follower = $this->following()->where('id', '=', auth('api')->user()->id)->first();

        if ($follower) {
            $following = true;
        }

        return $following;
    }
}
