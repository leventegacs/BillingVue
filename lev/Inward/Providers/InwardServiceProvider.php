<?php

namespace Lev\Inward\Providers;

use Illuminate\Support\ServiceProvider;

class InwardServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/admin.php');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
    }
}
