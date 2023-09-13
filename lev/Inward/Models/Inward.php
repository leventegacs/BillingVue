<?php

namespace Lev\Inward\Models;

use App\Enums\StockMoveStatus;
use App\Enums\PaymentType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Lev\Partner\Models\Partner;
use Lev\Stock\Contracts\InteractsWithStock;
use Lev\Stock\Models\StockLog;

class Inward extends Model implements InteractsWithStock
{
    protected $guarded = [];

    protected $casts = [
        'payment_type' => PaymentType::class,
        'status' => StockMoveStatus::class,
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

    public function stockLogs(): MorphMany
    {
        return $this->morphMany(StockLog::class, 'eventable');
    }

    public function route(): string
    {
        if($this->status === StockMoveStatus::CLOSED) {
            return route('admin.inwards.show', $this->id);
        }

        return route('admin.inwards.edit', $this->id);
    }
}
