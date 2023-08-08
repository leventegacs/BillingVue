<?php

use Lev\Inward\Controllers\InwardController;

Route::middleware(['web', 'auth'])
    ->as('admin.')
    ->group(function () {
        Route::resource('inwards', InwardController::class);
    });
