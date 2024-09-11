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
            'priceFrom' => 'numeric|gte:0',
            'priceTo' => 'numeric|gte:0',
            'bedrooms' => 'numeric|gte:0',
            'bathrooms' => 'numeric|gte:0',
            'storeys' => 'numeric|gte:0',
            'garages' => 'numeric|gte:0',
        ];
    }
}
