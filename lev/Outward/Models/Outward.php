<?php

namespace Lev\Outward\Models;

use App\Enums\PaymentType;
use App\Enums\StockMoveStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Lev\Partner\Models\Partner;
use Lev\Stock\Contracts\InteractsWithStock;

class Outward extends Model implements InteractsWithStock
{
    protected $guarded = [];

    protected $casts = [
        'outward_date' => 'date',
        'payment_type' => PaymentType::class,
        'status' => StockMoveStatus::class,
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OutwardItems::class);
    }

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    public function scopeSearch($query, ?string $search): void
    {
        $query->when($search, function($query, $search) {
            $query->where('document_number', 'like', "%$search%");
        });
    }

    public function route(): string
    {
        if($this->status === StockMoveStatus::CLOSED) {
            return route('admin.outwards.show', $this->id);
        }

        return route('admin.outwards.edit', $this->id);
    }
}
