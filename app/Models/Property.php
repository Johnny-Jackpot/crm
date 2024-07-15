<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties';

    public static function selectList(
        ?string $name = null,
        ?int    $priceFrom = null,
        ?int    $priceTo = null,
        ?int    $bedrooms = null,
        ?int    $bathrooms = null,
        ?int    $storeys = null,
        ?int    $garages = null
    ): Builder
    {
        $qb = self::query();

        if ($name) {
            $qb->where('name', 'LIKE', "%$name%");
        }

        if ($priceFrom !== null) {
            $qb->where('price', '>=', $priceFrom);
        }

        if ($priceTo !== null) {
            $qb->where('price', '<=', $priceTo);
        }

        if ($bedrooms !== null) {
            $qb->where('bedrooms', '=', $bedrooms);
        }

        if ($bathrooms !== null) {
            $qb->where('bedrooms', '=', $bedrooms);
        }

        if ($storeys !== null) {
            $qb->where('storeys', '=', $storeys);
        }

        if ($garages !== null) {
            $qb->where('garages', '=', $garages);
        }

        return $qb;
    }
}
