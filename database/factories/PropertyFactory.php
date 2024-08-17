<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'housing_description' => $this->faker->paragraph(3),
            'exterior_description' => $this->faker->paragraph(4),
            'access_description' => $this->faker->paragraph(3),
            'country' => $this->faker->country,
            'city' => $this->faker->city,
            'address' => $this->faker->address,
            'zip_code' => $this->faker->postcode,
            'rooms' => $this->faker->numberBetween(1, 10),
            'bedrooms' => $this->faker->numberBetween(1, 5),
            'bathrooms' => $this->faker->numberBetween(1, 3),
            'beds' => $this->faker->numberBetween(1, 5),
            'surface' => $this->faker->numberBetween(20, 200),
            'price_per_night' => $this->faker->numberBetween(50, 800),
            'max_guests' => $this->faker->numberBetween(1, 10),
            'active' => $this->faker->boolean,
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
