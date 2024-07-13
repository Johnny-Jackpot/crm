<?php

use App\Http\Resources\PropertyResource;
use App\Models\Property;
use Illuminate\Support\Facades\Route;

Route::get('/properties', function () {
    return PropertyResource::collection(Property::paginate());
});
