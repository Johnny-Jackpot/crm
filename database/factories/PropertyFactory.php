<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Property>
 */
class PropertyFactory extends Factory
{
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'price' => fake()->numberBetween(263_604, 4_294_967_295),
            'bedrooms' => fake()->numberBetween(0, 255),
            'bathrooms' => fake()->numberBetween(0, 255),
            'storeys' => fake()->numberBetween(0, 255),
            'garages' => fake()->numberBetween(0, 255),
        ];
    }
}
