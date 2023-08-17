<?php

namespace Lev\Inward\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Lev\Inward\Enums\PaymentType;

class CreateInwardRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'inward_date' => ['required', 'date'],
            'partner' => ['required'],
            'payment_type' => ['required', new Enum(PaymentType::class)],
            'comment' => ['nullable'],
            'items.*.product_id' => ['required', 'exists:products,id'],
            'items.*.net_price' => ['required', 'integer'],
            'items.*.quantity' => ['required', 'integer']
        ];
    }
}
