<?php

namespace Lev\Partner\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePartnerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'tax_number' => ['required'],
            'postal_code' => ['required', 'integer'],
            'city' => ['required'],
            'street' => ['required'],
            'house_number' => ['required'],
        ];
    }
}
