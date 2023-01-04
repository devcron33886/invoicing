<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required', 'string', 'max:255', 'min:5',
            ],
            'mobile' => ['required', 'string', 'max:18', 'min:10'],
            'email' => ['required', 'email', 'max:255'],
            'company' => ['string', 'max:255', 'min:5'],
            'website' => ['url', 'max:255', 'min:5'],
            'country' => ['required', 'string', 'max:255', 'min:4'],
            'state' => ['required', 'string', 'max:255', 'min:5'],
            'address' => ['required', 'string', 'max:255', 'min:5'],
        ];
    }
}
