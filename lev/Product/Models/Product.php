<?php

namespace Lev\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Lev\Inward\Models\InwardItem;
use Lev\Product\Database\Factories\ProductFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory(): ProductFactory
    {
        return new ProductFactory();
    }

    public function scopeSearch($query, ?string $search): void
    {
        $query->when($search, function($query, $search) {
            $query->where('name', 'like', "%$search%");
        });
    }

    public function inwardItems(): HasMany
    {
        return $this->hasMany(InwardItem::class);
    }



}
