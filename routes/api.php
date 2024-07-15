<?php

use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

Route::apiResource('property', PropertyController::class)->only('index');
