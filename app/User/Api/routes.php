<?php

Route::namespace('User\Api\Controllers')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');

    Route::get(
        'user',
        [
            'uses' => UserController::class . '@show',
            'as' => 'user.show',
        ]
    );

});

