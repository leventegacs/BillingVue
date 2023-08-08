<?php

namespace Lev\Product\Providers;

use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    public function register(): void
    {

    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/admin.php');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
    }
}
