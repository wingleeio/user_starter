<?php

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Laravel Starter V1 Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'v1'], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');

    // Public user routes
    Route::get('users', 'UserController@get_all_users');

    // Public post routes
    Route::get('posts', 'PostController@get_all_posts');
    Route::get('posts/{id}', 'PostController@get_one_post');

    // Public repost routes
    Route::get('reposts', 'RepostController@get_all_reposts');

    // Protected routes
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', 'Auth\LoginController@logout');
        Route::get('user', 'UserController@get_current_user');

        // Protected post routes
        Route::post('posts', 'PostController@create_post');

        // Protected repost routes
        Route::post('reposts', 'RepostController@repost');

        // Protected like routes
        Route::post('like', 'LikeController@like');
    });
});
