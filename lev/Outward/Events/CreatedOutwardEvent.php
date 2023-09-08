<?php

namespace Lev\Outward\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Lev\Outward\Models\Outward;

class CreatedOutwardEvent
{
    use Dispatchable;

    public Outward $outward;

    public function __construct(Outward $outward)
    {
        $this->outward = $outward;
    }
}
