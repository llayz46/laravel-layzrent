<?php

use App\Models\Property;
use App\Models\Reservation;
use App\Models\User;

it('belongs to an property', function () {
    // AAA

    // Arrange = Mise en place de l'environnement
    $user = User::factory()->create();
    $property = Property::factory()->create();

    $reservation = Reservation::factory()->create([
        'user_id' => $user->id,
        'property_id' => $property->id,
    ]);

    // Act = Exécution du code
    // Assert = Vérification des résultats
    expect($reservation->property)->toBeInstanceOf(Property::class)
        ->and($reservation->property->is($property))->toBeTrue();
});

it('belongs to an user', function () {
    // AAA

    // Arrange = Mise en place de l'environnement
    $user = User::factory()->create();
    $property = Property::factory()->create();

    $reservation = Reservation::factory()->create([
        'user_id' => $user->id,
        'property_id' => $property->id,
    ]);

    // Act = Exécution du code
    // Assert = Vérification des résultats
    expect($reservation->user)->toBeInstanceOf(User::class)
        ->and($reservation->user->is($user))->toBeTrue();
});
