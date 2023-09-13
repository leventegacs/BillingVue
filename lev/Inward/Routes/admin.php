<?php

use Lev\Inward\Controllers\CloseInwardController;
use Lev\Inward\Controllers\InwardController;

Route::middleware(['web', 'auth'])
    ->as('admin.')
    ->group(function () {
        Route::resource('inwards', InwardController::class);

        Route::put('/inwards/{inward}/close', CloseInwardController::class)->name('inwards.close');
    });
