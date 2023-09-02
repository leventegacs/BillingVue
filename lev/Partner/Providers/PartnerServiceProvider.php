<?php

namespace Lev\Partner\Providers;

use Illuminate\Support\ServiceProvider;

class PartnerServiceProvider extends ServiceProvider
{
    public function register(): void
    {

    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__.'/../Routes/admin.php');
    }
}
