<?php

use Lev\Dashboard\Controllers\DashboardController;

Route::middleware(['web', 'auth'])
    ->as('admin.')
    ->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
});
