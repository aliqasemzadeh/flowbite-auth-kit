<?php

namespace AliQasemzadeh\FlowbiteAuthKit\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use AliQasemzadeh\FlowbiteAuthKit\Livewire\Component;

class Login extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    /**
     * Validation rules.
     */
    protected function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     */
    public function login(): void
    {
        $this->validate();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->addError('email', __('auth.failed'));
            return;
        }

        session()->regenerate();

        $this->redirect(route('user.dashboard.index'), navigate: true);
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
