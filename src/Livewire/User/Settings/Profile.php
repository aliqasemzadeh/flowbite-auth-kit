<?php

namespace AliQasemzadeh\FlowbiteAuthKit\Livewire\User\Settings;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use AliQasemzadeh\FlowbiteAuthKit\Livewire\Auth\Logout;
use AliQasemzadeh\FlowbiteAuthKit\Livewire\Component;

class Profile extends Component
{
    public string $first_name = '';
    public string $last_name = '';
    public string $email = '';
    public string $password = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->first_name = Auth::user()->first_name;
        $this->last_name = Auth::user()->last_name;
        $this->email = Auth::user()->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id)
            ],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->notification()->send([
            'icon' => 'info',
            'title' => __('flowbite-auth-kit::kit.system_message'),
            'description' => __('flowbite-auth-kit::kit.saved'),
        ]);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('user.dashboard.index', absolute: false));
            return;
        }

        $user->sendEmailVerificationNotification();

        $this->notification()->send([
            'icon' => 'info',
            'title' => __('flowbite-auth-kit::kit.verification_email_sent'),
            'description' => __('flowbite-auth-kit::kit.verification_link_sent'),
        ]);
    }

    public function closeDialog(): void
    {
        $this->reset('password');
        $this->dialog()->close();
    }

    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: false);
    }

    /**
     * Render the component.
     */
    #[Layout('flowbite-auth-kit::components.layouts.panel')]
    public function render()
    {
        return parent::render();
    }
}
