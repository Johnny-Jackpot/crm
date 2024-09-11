<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListPropertyRequest;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Resources\PropertyResource;
use App\Models\Property;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PropertyController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'auth:sanctum',
            new Middleware('abilities:view-property', only: ['index', 'show']),
            new Middleware('abilities:store-property', only: ['store']),
            new Middleware('abilities:update-property', only: ['update']),
            new Middleware('abilities:delete-property', only: ['destroy']),
        ];
    }

    public function index(ListPropertyRequest $request): AnonymousResourceCollection
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

    public function store(StorePropertyRequest $request)
    {
        //
    }

    public function show(Property $property)
    {
        //
    }

    public function update(StorePropertyRequest $request, Property $property)
    {
        //
    }


    public function destroy(Property $property)
    {
        //
    }
}
