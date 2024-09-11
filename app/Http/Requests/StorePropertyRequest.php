<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|between:2,255|unique:App\Models\Property,name',
            'price' => 'numeric|gt:0',
            'bedrooms' => 'numeric|gt:0',
            'bathrooms' => 'numeric|gt:0',
            'storeys' => 'numeric|gt:0',
            'garages' => 'numeric|gt:0',
        ];
    }
}
