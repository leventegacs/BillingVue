<?php

namespace Lev\Stock\Actions;

use Lev\Inward\Models\Inward;
use Lev\Product\Models\Product;
use Lev\Stock\Contracts\InteractsWithStock;
use Lev\Stock\Models\Stock;
use Lev\Stock\Models\StockLog;

class CreateStockMoveLog
{
    public function __invoke(InteractsWithStock $eventable, Product $product, int $quantity, int $updatedQuantity)
    {
        StockLog::query()->create([
            'eventable_type' => $eventable::class,
            'eventable_id' => $eventable->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'updated_quantity' => $updatedQuantity
        ]);
    }
}
