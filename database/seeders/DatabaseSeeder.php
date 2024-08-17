<?php

namespace Database\Seeders;

use App\Models\Amenity;
use App\Models\Property;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@test.fr',
            'password' => bcrypt('testtest'),
        ]);

        $properties = Property::factory(10)->create();

        foreach ($properties as $property) {
            $amenities = Amenity::factory()->count(3)->create();
            $property->amenities()->attach($amenities->pluck('id'));
        }
    }
}
