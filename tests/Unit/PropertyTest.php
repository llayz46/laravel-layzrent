<?php

use App\Models\Amenity;
use App\Models\Category;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

it('belongs to an user', function () {
    // AAA

    // Arrange = Mise en place de l'environnement
    $user = User::factory()->create();
    $property = Property::factory()->create([
        'user_id' => $user->id,
    ]);

    // Act = Exécution du code
    // Assert = Vérification des résultats
    expect($property->user)->toBeInstanceOf(User::class)
        ->and($property->user->is($user))->toBeTrue();
});

it('belongs to many amenities', function () {
    // AAA

    // Arrange = Mise en place de l'environnement
    $property = Property::factory()->create();
    $amenities = Amenity::factory(3)->create();
    $property->amenities()->attach($amenities);

    // Act = Exécution du code
    // Assert = Vérification des résultats
    expect($property->amenities)->toBeInstanceOf(Collection::class)
        ->and($property->amenities->count())->toBe(3);
});

it('belongs to an category', function () {
    // AAA

    // Arrange = Mise en place de l'environnement
    $category = Category::factory()->create();
    $property = Property::factory()->create([
        'category_id' => $category->id,
    ]);

    // Act = Exécution du code
    // Assert = Vérification des résultats
    expect($property->category)->toBeInstanceOf(Category::class)
        ->and($property->category->is($category))->toBeTrue();
});
