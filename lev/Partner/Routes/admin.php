<?php

use Lev\Partner\Controllers\PartnerController;

Route::middleware(['web', 'auth'])
    ->as('admin.')
    ->group(function() {
       Route::resource('partners', PartnerController::class);
    });
