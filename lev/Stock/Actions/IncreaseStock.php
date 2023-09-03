<?php

namespace Lev\Stock\Actions;

use Lev\Product\Models\Product;
use Lev\Stock\Models\Stock;

class IncreaseStock
{
    public function __invoke(Product $product, int $quantity): Stock
    {
        $stock = Stock::query()->where('product_id', $product->id)->first();

        if (!$stock) {
            $stock = Stock::query()->create([
                'product_id' => $product->id,
                'quantity' => $quantity
            ]);
        } else {
            $product->stocks()->increment('quantity', $quantity);
        }

        return $stock;
    }
}
