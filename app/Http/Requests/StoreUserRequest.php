<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\User;
use App\Traits\UserLoginValidationRules;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    use UserLoginValidationRules;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            ...$this->userLoginValidationRules(),
            'roles' => 'required|array',
            'roles.*' => Rule::in([User::ROLE_ADMIN, User::ROLE_REGULAR]),
        ];
    }

    public function getData(): array
    {
        return $this->only(['email', 'password', 'roles']);
    }
}
