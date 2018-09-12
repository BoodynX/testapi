<?php

Route::namespace('User\Api\Controllers')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');

    Route::middleware('auth:api')->group(function () {
        Route::get('user', 'UserController@show')->name('user.show');
    });
});

