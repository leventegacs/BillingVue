<?php

namespace Lev\Inward\Enums;


enum InwardStatus: String
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
