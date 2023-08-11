<?php

namespace Lev\Product\Actions;

use Lev\Product\Models\Product;

class UpdateProduct
{
    public function __invoke(Product $product, array $validated): void
    {
        $product->update($validated);
    }
}
