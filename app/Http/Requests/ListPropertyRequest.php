<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ListPropertyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string',
            'priceFrom' => 'numeric|gt:0',
            'priceTo' => 'numeric|gt:0',
            'bedrooms' => 'numeric|gt:0',
            'bathrooms' => 'numeric|gt:0',
            'storeys' => 'numeric|gt:0',
            'garages' => 'numeric|gt:0',
        ];
    }
}
