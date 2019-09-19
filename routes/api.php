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

    // Protected routes
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', 'Auth\LoginController@logout');
        Route::get('user', 'UserController@get_current_user');
    });
});
