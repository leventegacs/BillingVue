<?php

use Lev\Product\Controllers\ProductController;

Route::middleware(['web', 'auth'])
    ->as('admin.')
    ->group(function () {
        Route::resource('products', ProductController::class);
    });
