<?php

namespace Lev\Inward\Enums;


use PhpParser\Node\Scalar\String_;

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

    public function color(): String
    {
        return match($this) {
            self::OPEN => 'success',
            self::CLOSED => 'danger',
            self::CANCELLED => 'warning',
        };
    }
}
