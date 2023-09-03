<?php

namespace Lev\Inward\Listeners;

use Lev\Inward\Events\CreatedInwardEvent;
use Lev\Stock\Actions\CreateStockMoveLog;
use Lev\Stock\Actions\IncreaseStock;

class InwardToStockListener
{
    public IncreaseStock $increaseStock;

    public CreateStockMoveLog $createStockMoveLog;

    public function __construct(IncreaseStock $increaseStock, CreateStockMoveLog $createStockMoveLog)
    {
        $this->increaseStock = $increaseStock;
        $this->createStockMoveLog = $createStockMoveLog;
    }

    public function handle(CreatedInwardEvent $event): void
    {
        $inward = $event->inward;

        $inward->items()->each(function($item) use ($inward) {
            $stock = ($this->increaseStock)(
                product: $item->product,
                quantity: $item->quantity
            );

            ($this->createStockMoveLog)(
                eventable: $inward,
                product: $item->product,
                quantity: $item->quantity
            );
        });
    }

}
