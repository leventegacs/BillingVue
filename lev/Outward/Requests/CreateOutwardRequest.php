<?php

namespace Lev\Outward\Requests;

use App\Enums\PaymentType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateOutwardRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'outward_date' => ['required', 'date'],
            'partner_id' => ['required', 'exists:partners,id'],
            'payment_type' => ['required', new Enum(PaymentType::class)],
            'comment' => ['nullable'],
            'items.*.product_id' => ['required', 'exists:products,id'],
            'items.*.net_price' => ['required', 'integer'],
            'items.*.quantity' => ['required', 'integer', 'min:1']
        ];
    }
}
