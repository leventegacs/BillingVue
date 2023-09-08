<?php

namespace Lev\Outward\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Lev\Outward\Models\Outward */
class OutwardResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'document_number' => $this->document_number,
            'inward_date' => $this->outward_date->format('Y-m-d'),
            'partner' => $this->partner->name,
            'payment_type' => $this->payment_type->name(),
            'status' => [
                'color' => $this->status->color(),
                'name' => $this->status->name()
            ],
        ];
    }
}
