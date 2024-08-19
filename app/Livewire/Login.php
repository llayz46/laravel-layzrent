<?php

namespace App\Livewire;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required|email')]
    public string $email;

    #[Validate(['required'])]
    public string $password;

    public function login()
    {
        if (auth()->user()) {
            return redirect()->route('home');
        }

        return $this->doLogin();
    }

    protected function doLogin()
    {
        $credentials = $this->validate();

        if (auth()->attempt($credentials)) {
            session()->regenerate();
            return redirect()->intended(route('home'));
        }

        $this->addError('email', 'These credentials do not match our records.');
    }

    public function render(): View
    {
        return view('livewire.login');
    }
}
