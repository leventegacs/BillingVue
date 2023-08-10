<?php

namespace Lev\Product\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Lev\Product\Models\Product;

class ProductFactory extends Factory
{
    protected $model = Product::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(2),
            'net_price' => $this->faker->numberBetween(1000, 20000),
            'identifier' => $this->faker->word().$this->faker->randomNumber(),
        ];
    }
}
