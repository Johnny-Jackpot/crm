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
            'price' => 'required|numeric|gt:0|lte:4294967295',
            'bedrooms' => 'required|numeric|gt:0|lte:255',
            'bathrooms' => 'required|numeric|gt:0|lte:255',
            'storeys' => 'required|numeric|gt:0|lte:255',
            'garages' => 'required|numeric|gt:0|lte:255',
        ];
    }

    public function getData(): array
    {
        return $this->only([
            'name',
            'price',
            'bedrooms',
            'bathrooms',
            'storeys',
            'garages',
        ]);
    }
}
