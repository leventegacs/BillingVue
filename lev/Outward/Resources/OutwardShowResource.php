<?php

namespace Lev\Outward\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Lev\Outward\Models\Outward */
class OutwardShowResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'document_number' => $this->document_number,
            'outward_date' => $this->outward_date->format('Y-m-d'),
            'partner' => $this->partner->name,
            'payment_type' => $this->payment_type->name(),
            'comment' => $this->comment,
            'items' => OutwardItemResource::collection($this->items)
        ];
    }
}
