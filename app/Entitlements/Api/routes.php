<?php

Route::namespace('Entitlements\Api\Controllers')->group(function () {
    Route::apiResource('ppvs', 'PpvController');
});

