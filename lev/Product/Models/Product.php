<?php

namespace Lev\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Lev\Product\Database\Factories\ProductFactory;

class Product extends Model
{
    use HasFactory;

    protected static function newFactory(): ProductFactory
    {
        return new ProductFactory();
    }

}
