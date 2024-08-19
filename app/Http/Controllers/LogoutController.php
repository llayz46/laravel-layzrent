<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LogoutController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        if (!auth()->user()) {
            return redirect()->route('login');
        }

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('home');
    }
}
