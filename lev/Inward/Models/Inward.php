<?php

namespace Lev\Inward\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inward extends Model
{
    protected $guarded = [];

    public function items(): HasMany
    {
        return $this->hasMany(InwardItem::class);
    }
}
