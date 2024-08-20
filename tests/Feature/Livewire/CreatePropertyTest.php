<?php

use App\Livewire\CreateProperty;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(CreateProperty::class)
        ->assertStatus(200);
});
