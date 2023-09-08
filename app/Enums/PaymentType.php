<?php

namespace App\Enums;

use Illuminate\Support\Collection;

enum PaymentType: String
{
    case CASH = 'cash';
    case BANK_CARD = 'bank_card';
    case BANK_TRANSFER = 'bank_transfer';

    public function name(): String
    {
        return match($this) {
            self::CASH => 'Készpénz',
            self::BANK_CARD => 'Bankkártya',
            self::BANK_TRANSFER => 'Átutalás',
        };
    }

    public static function items(): Collection
    {
        return collect(self::cases())->map(function($item) {
            return [
                'id' => $item->value,
                'name' => $item->name()
            ];
        });
    }
}
