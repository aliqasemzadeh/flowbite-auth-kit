<?php

namespace AliQasemzadeh\FlowbiteAuthKit\Livewire\User\Settings;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Password extends Component
{
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        $validated = $this->validate([
            'current_password' => ['required', 'string', 'current_password'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->notification()->send([
            'icon' => 'info',
            'title' => __('flowbite-auth-kit::kit.system_message'),
            'description' => __('flowbite-auth-kit::kit.password_updated'),
        ]);
    }

    /**
     * Render the component.
     */
    #[Layout('flowbite-auth-kit::components.layouts.panel')]
    public function render()
    {
        return view('flowbite-auth-kit::livewire.user.settings.password');
    }
}
