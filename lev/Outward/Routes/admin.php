<?php

use Illuminate\Support\Facades\Route;
use Lev\Outward\Controllers\OutwardCloseController;
use Lev\Outward\Controllers\OutwardController;

Route::middleware(['web', 'auth'])
    ->as('admin.')
    ->group(function() {
        Route::resource('outwards', OutwardController::class);

        Route::put('/outwards/{outward}/close', OutwardCloseController::class)->name('outwards.close');
    });
