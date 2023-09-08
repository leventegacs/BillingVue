<?php

namespace Lev\Outward\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Lev\Outward\Events\CreatedOutwardEvent;
use Lev\Outward\Listeners\OutwardToStockListener;

class OutwardServiceProvider extends ServiceProvider
{
    public function register(): void
    {

    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/admin.php');

        Event::listen(CreatedOutwardEvent::class, [OutwardToStockListener::class, 'handle']);
    }
}
