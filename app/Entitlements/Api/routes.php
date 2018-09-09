<?php

Route::namespace('Entitlements\Api\Controllers')
    ->middleware('auth:api')
    ->group(function () {
        Route::middleware('can:show,ppv,App\Entitlements\Infrastructure\Models\Ppv')->group( function () {
            Route::get('ppvs/{ppv}', 'PpvController@show')->name('ppvs.show');
            Route::get('ppvs/{ppv}/user', 'PpvController@users')->name('ppvs.user');
            Route::get('ppvs/{ppv}/relationships/user', 'PpvController@users')->name('ppvs.relationships.user');
        });
        Route::get('ppvs', 'PpvController@index')->name('ppvs.index');
    });

