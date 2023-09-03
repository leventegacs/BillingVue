<?php

namespace Lev\Stock\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Lev\Stock\Models\StockLog */
class StockLogResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'action' => 'Bevételezés',
            'identifier' => $this->eventable->document_number,
            'quantity' => $this->quantity
        ];
    }
}
