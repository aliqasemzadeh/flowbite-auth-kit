<?php

namespace AliQasemzadeh\FlowbiteAuthKit\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use AliQasemzadeh\FlowbiteAuthKit\Livewire\Component;

class ConfirmPassword extends Component
{
    public string $password = '';

    /**
     * Validation rules.
     */
    protected function rules(): array
    {
        return [
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Confirm the user's password.
     */
    public function confirmPassword(): void
    {
        $this->validate();

        if (! Hash::check($this->password, Auth::user()->password)) {
            throw ValidationException::withMessages([
                'password' => [__('auth.password')],
            ]);
        }

        session(['auth.password_confirmed_at' => time()]);

        $this->redirect(
            session('auth.password_confirmation_return_to', route('user.dashboard.index')),
            navigate: true
        );
    }

    /**
     * Render the component.
     */
    #[Layout('flowbite-auth-kit::components.layouts.auth')]
    public function render()
    {
        return parent::render();
    }
}
