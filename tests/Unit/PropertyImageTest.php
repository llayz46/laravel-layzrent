<?php

use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\User;

it('belongs to an property', function () {
    // AAA

    // Arrange = Mise en place de l'environnement
    $property = Property::factory()->create();
    $propertyImage = PropertyImage::factory()->create([
        'property_id' => $property->id,
    ]);

    // Act = Exécution du code
    // Assert = Vérification des résultats
    expect($propertyImage->property)->toBeInstanceOf(Property::class)
        ->and($propertyImage->property->is($property))->toBeTrue();
});
