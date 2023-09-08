<?php

namespace Lev\Inward\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InwardItemResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->product->name,
            'net_price' => $this->net_price,
            'quantity' => $this->quantity,
        ];
    }
}
