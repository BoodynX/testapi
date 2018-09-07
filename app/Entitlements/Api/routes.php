<?php

Route::namespace('Entitlements\Api\Controllers')
    ->middleware('auth:api')
    ->group(function () {
        Route::apiResource('ppvs', 'PpvController');

        Route::get(
            'ppvs/{ppv}/relationships/user',
            [
                'uses' => PpvController::class . '@users',
                'as' => 'ppvs.relationships.user',
            ]
        );

        Route::get(
            'ppvs/{ppv}/user',
            [
                'uses' => PpvController::class . '@users',
                'as' => 'ppvs.user',
            ]
        );
    });

