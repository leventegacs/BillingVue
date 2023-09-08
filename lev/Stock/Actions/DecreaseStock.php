<?php

namespace Lev\Stock\Actions;

use Lev\Product\Models\Product;
use Lev\Stock\Exceptions\ProductShortage;
use Lev\Stock\Models\Stock;
use Throwable;

class DecreaseStock
{
    /**
     * @throws Throwable
     */
    public function __invoke(Product $product, int $quantity): Stock
    {
        throw_if(
            condition: $product->stock->quantity < $quantity,
            exception: new ProductShortage('Nincs elegendő termék készleten.')
        );

        $product->stock()->decrement('quantity', $quantity);

        return $product->stock->fresh();
    }
}
