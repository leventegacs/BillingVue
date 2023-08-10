<?php

namespace Lev\Product\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'net_price' => $this->net_price,
            'identifier' => $this->identifier
        ];
    }
}
