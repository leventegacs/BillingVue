<?php

namespace Lev\Inward\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Lev\Inward\Events\CreatedInwardEvent;
use Lev\Inward\Listeners\InwardToStockListener;

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

        Event::listen(CreatedInwardEvent::class, [InwardToStockListener::class, 'handle']);
    }
}
