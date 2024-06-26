<?php

namespace Lev\Inward\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Lev\Product\Models\Product;

class InwardItem extends Model
{
    protected $guarded = [];

    public function inward(): BelongsTo
    {
        return $this->belongsTo(Inward::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
