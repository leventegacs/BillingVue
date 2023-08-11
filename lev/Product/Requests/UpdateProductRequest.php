<?php

namespace Lev\Product\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'net_price' => ['required', 'integer'],
            'identifier' => ['required']
        ];
    }
}
