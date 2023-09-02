<?php

namespace Lev\Partner\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Lev\Partner\Models\Partner */
class PartnerFormResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'tax_number' => $this->tax_number,
            'postal_code' => $this->postal_code,
            'city' => $this->city,
            'street' => $this->street,
            'house_number' => $this->house_number,
        ];
    }
}
