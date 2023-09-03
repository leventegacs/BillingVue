<?php

namespace Lev\Inward\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Lev\Inward\Models\Inward;

class CreatedInwardEvent
{
    use Dispatchable;

    public Inward $inward;

    public function __construct(Inward $inward)
    {
        $this->inward = $inward;
    }
}
