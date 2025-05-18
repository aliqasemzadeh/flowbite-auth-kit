<?php

namespace AliQasemzadeh\FlowbiteAuthKit\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use AliQasemzadeh\FlowbiteAuthKit\Livewire\Component;

class ForgetPassword extends Component
{
    public string $email = '';
    public bool $emailSentMessage = false;

    /**
     * Validation rules.
     */
    protected function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
        ];
    }

    /**
     * Send a password reset link to the given user.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate();

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));
            return;
        }

        $this->emailSentMessage = true;
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
