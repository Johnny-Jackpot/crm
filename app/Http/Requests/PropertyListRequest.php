<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PropertyListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string',
            'price' => 'numeric|gte:0',
            'bedrooms' => 'numeric|gte:0',
            'bathrooms' => 'numeric|gte:0',
            'storeys' => 'numeric|gte:0',
            'garages' => 'numeric|gte:0',
        ];
    }
}
