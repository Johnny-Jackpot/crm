<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(100)->create();
        User::factory()->count(1)->create([
            'email' => 'admin@example.com',
            'roles' => [User::ROLE_ADMIN],
            'password' => Hash::make('admin'),
        ]);
    }
}
