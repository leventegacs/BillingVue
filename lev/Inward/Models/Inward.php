<?php

namespace Lev\Inward\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Lev\Inward\Enums\InwardStatus;
use Lev\Inward\Enums\PaymentType;
use Lev\Partner\Models\Partner;

class Inward extends Model
{
    protected $guarded = [];

    protected $casts = [
        'payment_type' => PaymentType::class,
        'status' => InwardStatus::class,
        'inward_date' => 'date',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(InwardItem::class);
    }

    public function scopeSearch($query, ?string $search): void
    {
        $query->when($search, function($query, $search) {
            $query->where('document_number', 'like', "%$search%");
        });
    }

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }
}
