<?php

use App\Livewire\Home;
use App\Livewire\Property;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::get('/{Property}-{slug}', Property::class)->name('property.show');
