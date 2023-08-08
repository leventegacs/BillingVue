<?php

namespace Lev\Inward\Enums;


enum PaymentStatus: String
{
    case OPEN = 'open';
    case CLOSED = 'closed';
    case CANCELLED = 'cancelled';

    public function name(): String
    {
        return match($this) {
            self::OPEN => 'Nyitott',
            self::CLOSED => 'Lezárt',
            self::CANCELLED => 'Sztornózott',
        };
    }
}
