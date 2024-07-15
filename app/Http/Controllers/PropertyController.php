<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyListRequest;
use App\Http\Resources\PropertyResource;
use App\Models\Property;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PropertyListRequest $request)
    {
        return PropertyResource::collection(Property::paginate());
    }
}
