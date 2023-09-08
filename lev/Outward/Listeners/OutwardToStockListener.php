<?php

namespace Lev\Outward\Listeners;

use Lev\Outward\Events\CreatedOutwardEvent;
use Lev\Stock\Actions\CreateStockMoveLog;
use Lev\Stock\Actions\DecreaseStock;

class OutwardToStockListener
{
    public DecreaseStock $decreaseStock;

    public CreateStockMoveLog $createStockMoveLog;

    public function __construct(DecreaseStock $decreaseStock, CreateStockMoveLog $createStockMoveLog)
    {
        $this->decreaseStock = $decreaseStock;
        $this->createStockMoveLog = $createStockMoveLog;
    }

    public function handle(CreatedOutwardEvent $event): void
    {
        $outward = $event->outward;

        $outward->items()->each(function($item) use ($outward) {
            $stock = ($this->decreaseStock)(
                product: $item->product,
                quantity: $item->quantity
            );

            ($this->createStockMoveLog)(
                eventable: $outward,
                product: $item->product,
                quantity: $item->quantity,
                updatedQuantity: $stock->quantity
            );
        });
    }

}
