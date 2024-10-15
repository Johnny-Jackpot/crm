<?php

use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\UserHasRoles;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::post('login', [ApiLoginController::class, 'authenticate'])->name('login');
Route::apiResource('properties', PropertyController::class);
Route::apiResource('users', UserController::class)
    ->only(['index', 'store'])
    ->middleware('auth:sanctum')
    ->middleware(UserHasRoles::class . ':' . User::ROLE_ADMIN);
