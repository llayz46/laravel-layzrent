<?php

use App\Livewire\Properties;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Properties::class)
        ->assertStatus(200);
});
