<?php

namespace Lev\Product\Actions;

use Lev\Product\Models\Product;

class CreateProduct
{
    public function __invoke(array $validated): Product
    {
        return Product::query()->create($validated);
    }
}
