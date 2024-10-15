<?php
declare(strict_types=1);

namespace App\Traits;

use Illuminate\Validation\Rules\Password;

trait UserLoginValidationRules
{
    public function userLoginValidationRules(): array
    {
        return [
            'email' => 'required|unique:users,email',
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
            ],
        ];
    }
}
