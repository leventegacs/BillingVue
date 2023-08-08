<?php

namespace Lev\Inward\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InwardItem extends Model
{
    protected $guarded = [];

    public function inward(): BelongsTo
    {
        return $this->belongsTo(Inward::class);
    }
}
