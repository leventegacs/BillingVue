<?php

namespace Lev\Inward\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class InwardIndexResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'document_number' => $this->document_number,
            'inward_date' => $this->inward_date->format('Y-m-d'),
            'partner' => $this->partner,
            'payment_type' => $this->payment_type->name(),
            'status' => $this->status->name(),
        ];
    }
}