<?php

use Lev\Dashboard\Controllers\DashboardController;

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
});
