<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyListRequest;
use App\Http\Resources\PropertyResource;
use App\Models\Property;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PropertyListRequest $request): AnonymousResourceCollection
    {
        $qb = Property::selectList(
            name: $request->get('name'),
            priceFrom: $request->get('priceFrom'),
            priceTo: $request->get('priceTo'),
            bedrooms: $request->get('bedrooms'),
            bathrooms: $request->get('bathrooms'),
            storeys: $request->get('storeys'),
            garages: $request->get('garages')
        );

        return PropertyResource::collection($qb->paginate(10));
    }
}
