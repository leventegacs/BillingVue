<?php

namespace Lev\Outward\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Lev\Product\Models\Product;

class OutwardItems extends Model
{
    protected $guarded = [];

    public function outward(): BelongsTo
    {
        return $this->belongsTo(Outward::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
