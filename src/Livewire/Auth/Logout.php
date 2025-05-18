<?php

namespace AliQasemzadeh\FlowbiteAuthKit\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    /**
     * Log the user out of the application.
     */
    public function logout(): void
    {
        Auth::logout();

        if (session()->has('auth.password_confirmed_at')) {
            session()->forget('auth.password_confirmed_at');
        }

        session()->invalidate();
        session()->regenerateToken();

        $this->redirect('/', navigate: true);
    }

    /**
     * Handle the component being invoked.
     */
    public function __invoke()
    {
        return function ($user = null) {
            Auth::logout();

            if (session()->has('auth.password_confirmed_at')) {
                session()->forget('auth.password_confirmed_at');
            }

            session()->invalidate();
            session()->regenerateToken();

            return $user;
        };
    }
}
