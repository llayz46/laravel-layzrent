<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[Validate('required|min:2|max:50')]
    public string $last_name = '';

    #[Validate('required|min:2|max:50')]
    public string $first_name = '';

    #[Validate('required|email|unique:users,email')]
    public string $email = '';

    #[Validate('required|min:8|max:250|confirmed')]
    public string $password = '';
    public string $password_confirmation = '';

    public function register()
    {
        if (auth()->user()) {
            return redirect()->route('home');
        }

        return $this->store();
    }

    protected function store()
    {
        $data = $this->validate();

        $user = User::create($data);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
