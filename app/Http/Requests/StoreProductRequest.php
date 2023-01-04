<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'min:5',
            ],
            'product_code' => [
                'string',
                'max:255',
                'min:2',
            ],
            'price' => [
                'integer',
            ],
            'status' => [
                'boolean',
            ],

        ];
    }
}
