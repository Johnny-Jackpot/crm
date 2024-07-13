<?php

use App\Http\Resources\PropertyResource;
use App\Models\Property;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/properties', function () {
    return PropertyResource::collection(Property::paginate());
});
