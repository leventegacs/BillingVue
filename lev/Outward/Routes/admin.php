<?php

use Illuminate\Support\Facades\Route;
use Lev\Outward\Controllers\OutwardController;

Route::middleware(['web', 'auth'])
    ->as('admin.')
    ->group(function() {
        Route::resource('outwards', OutwardController::class);
    });
