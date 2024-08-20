<?php

use App\Http\Controllers\LogoutController;
use App\Livewire\CreateProperty;
use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\Properties;
use App\Livewire\Property;
use App\Livewire\Register;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::get('/{Property}-{slug}', Property::class)->name('property.show');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

Route::delete('/logout', LogoutController::class)->name('logout')->middleware('auth');

Route::get('/properties', Properties::class)->name('properties')->middleware('auth');
Route::get('/properties/create', CreateProperty::class)->name('properties.create')->middleware('auth');
