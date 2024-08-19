<?php

use App\Livewire\Login;
use App\Models\User;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Login::class)
        ->assertStatus(200);
});

it('requires email', function () {
    Livewire::test(Login::class)
        ->set('email', '')
        ->set('password', 'password')
        ->call('login')
        ->assertHasErrors(['email' => 'required']);
});

it('requires a real email', function () {
    Livewire::test(Login::class)
        ->set('email', 'test')
        ->set('password', 'password')
        ->call('login')
        ->assertHasErrors(['email' => 'email']);
});

it('requires password', function () {
    Livewire::test(Login::class)
        ->set('email', 'mail@mail.com')
        ->set('password', '')
        ->call('login')
        ->assertHasErrors(['password' => 'required']);
});

it('requires valid credentials', function () {
    $user = User::factory()->create([
        'email' => 'mail@mail.com',
        'password' => 'testtest',
    ]);

    Livewire::test(Login::class)
        ->set('email', 'mail@mail.com')
        ->set('password', 'password')
        ->call('login')
        ->assertHasErrors('email');
});

it('redirects to home after successful login', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => 'password123',
    ]);

    Livewire::test(Login::class)
        ->set('email', $user->email)
        ->set('password', 'password123')
        ->call('login')
        ->assertRedirect(route('home'));
});

it('redirects to home if user is logged in', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(Login::class)
        ->call('login')
        ->assertRedirect(route('home'));
});
