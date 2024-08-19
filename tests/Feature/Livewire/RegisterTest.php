<?php

use App\Livewire\Register;
use App\Models\User;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Register::class)
        ->assertStatus(200);
});

it('requires first name', function () {
    Livewire::test(Register::class)
        ->set('first_name', '')
        ->set('last_name', 'Doe')
        ->set('email', 'test@test.com')
        ->set('password', 'password')
        ->set('password_confirmation', 'password')
        ->call('register')
        ->assertHasErrors(['first_name' => 'required']);
});

it('requires a first name of 2 chars minimum', function () {
    Livewire::test(Register::class)
        ->set('first_name', 'j')
        ->set('last_name', 'Doe')
        ->set('email', 'test@test.com')
        ->set('password', 'password')
        ->set('password_confirmation', 'password')
        ->call('register')
        ->assertHasErrors(['first_name' => 'min']);
});

it('requires a first name of 50 chars maximum', function () {
    Livewire::test(Register::class)
        ->set('first_name', 'lorem ipsum dolor sit amet consectetur adipiscing elit dolor sit amet consectetur adipiscing dolor sit amet consectetur adipiscing')
        ->set('last_name', 'Doe')
        ->set('email', 'test@test.com')
        ->set('password', 'password')
        ->set('password_confirmation', 'password')
        ->call('register')
        ->assertHasErrors(['first_name' => 'max']);
});

it('requires last name', function () {
    Livewire::test(Register::class)
        ->set('first_name', 'John')
        ->set('last_name', '')
        ->set('email', 'test@test.com')
        ->set('password', 'password')
        ->set('password_confirmation', 'password')
        ->call('register')
        ->assertHasErrors(['last_name' => 'required']);
});

it('requires a last name of 2 chars minimum', function () {
    Livewire::test(Register::class)
        ->set('first_name', 'John')
        ->set('last_name', 'd')
        ->set('email', 'test@test.com')
        ->set('password', 'password')
        ->set('password_confirmation', 'password')
        ->call('register')
        ->assertHasErrors(['last_name' => 'min']);
});

it('requires a last name of 50 chars maximum', function () {
    Livewire::test(Register::class)
        ->set('first_name', 'John')
        ->set('last_name', 'lorem ipsum dolor sit amet consectetur adipiscing elit dolor sit amet consectetur adipiscing dolor sit amet consectetur adipiscing')
        ->set('email', 'test@test.com')
        ->set('password', 'password')
        ->set('password_confirmation', 'password')
        ->call('register')
        ->assertHasErrors(['last_name' => 'max']);
});

it('requires an email', function () {
    Livewire::test(Register::class)
        ->set('first_name', 'John')
        ->set('last_name', 'Doe')
        ->set('email', '')
        ->set('password', 'password')
        ->set('password_confirmation', 'password')
        ->call('register')
        ->assertHasErrors(['email' => 'required']);
});

it('requires a real email', function () {
    Livewire::test(Register::class)
        ->set('first_name', 'John')
        ->set('last_name', 'Doe')
        ->set('email', 'testerzzerzer')
        ->set('password', 'password')
        ->set('password_confirmation', 'password')
        ->call('register')
        ->assertHasErrors(['email' => 'email']);
});

it('requires a unique email', function () {
    $user = User::factory()->create([
        'email' => 'test@test.fr',
    ]);

    Livewire::test(Register::class)
        ->set('first_name', 'John')
        ->set('last_name', 'Doe')
        ->set('email', 'test@test.fr')
        ->set('password', 'password')
        ->set('password_confirmation', 'password')
        ->call('register')
        ->assertHasErrors(['email' => 'unique']);
});

it('requires a password', function () {
    Livewire::test(Register::class)
        ->set('first_name', 'John')
        ->set('last_name', 'Doe')
        ->set('email', 'test@test.fr')
        ->set('password', '')
        ->set('password_confirmation', 'password')
        ->call('register')
        ->assertHasErrors(['password' => 'required']);
});

it('requires a password of 8 chars minimum', function () {
    Livewire::test(Register::class)
        ->set('first_name', 'John')
        ->set('last_name', 'Doe')
        ->set('email', 'test@test.fr')
        ->set('password', 'lorem ipsum dolor sit amet consectetur adipiscing elit dolor sit amet consectetur adipiscing dolor sit amet consectetur adipiscing lorem ipsum dolor sit amet consectetur adipiscing elit dolor sit amet consectetur adipiscing dolor sit amet consectetur adipiscing lorem ipsum dolor sit amet consectetur adipiscing elit dolor sit amet consectetur adipiscing dolor sit amet consectetur adipiscing lorem ipsum dolor sit amet consectetur adipiscing elit dolor sit amet consectetur adipiscing dolor sit amet consectetur adipiscing')
        ->set('password_confirmation', 'password')
        ->call('register')
        ->assertHasErrors(['password' => 'max']);
});

it('requires a password of 250 chars maximum', function () {
    Livewire::test(Register::class)
        ->set('first_name', 'John')
        ->set('last_name', 'Doe')
        ->set('email', 'test@test.fr')
        ->set('password', 'passwor')
        ->set('password_confirmation', 'password')
        ->call('register')
        ->assertHasErrors(['password' => 'min']);
});

it('requires a password confirmation', function () {
    Livewire::test(Register::class)
        ->set('first_name', 'John')
        ->set('last_name', 'Doe')
        ->set('email', 'test@test.fr')
        ->set('password', 'password')
        ->set('password_confirmation', '')
        ->call('register')
        ->assertHasErrors(['password' => 'confirmed']);
});

it('redirects to home after successful register', function () {
    Livewire::test(Register::class)
        ->set('first_name', 'John')
        ->set('last_name', 'Doe')
        ->set('email', 'test@test.fr')
        ->set('password', 'password')
        ->set('password_confirmation', 'password')
        ->call('register')
        ->assertRedirect(route('home'));
});

it('redirects to home if user is logged in', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(Register::class)
        ->call('register')
        ->assertRedirect(route('home'));
});
