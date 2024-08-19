<?php

use App\Models\Category;
use App\Models\Property;

it('has many properties', function () {
    // AAA

    // Arrange = Mise en place de l'environnement
    $category = Category::factory()->create();
    $property = Property::factory()->create([
        'category_id' => $category->id,
    ]);

    // Act = Exécution du code
    // Assert = Vérification des résultats
    expect($property->category)->toBeInstanceOf(Category::class)
        ->and($property->category->is($category))->toBeTrue()
        ->and($category->properties->contains($property))->toBeTrue();
});

it('delete properties when deleting a category', function () {
    // AAA

    // Arrange = Mise en place de l'environnement
    $category = Category::factory()->create();
    $property = Property::factory()->create([
        'category_id' => $category->id,
    ]);

    // Act = Exécution du code
    $category->delete();

    // Assert = Vérification des résultats
    expect(Property::find($property->id))->toBeNull();
});
