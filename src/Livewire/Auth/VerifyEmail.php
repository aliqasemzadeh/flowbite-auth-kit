<?php

namespace AliQasemzadeh\FlowbiteAuthKit\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use AliQasemzadeh\FlowbiteAuthKit\Livewire\Component;

class VerifyEmail extends Component
{
    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirect(route('user.dashboard.index'), navigate: true);
            return;
        }

        $user->sendEmailVerificationNotification();

        $this->notification()->send([
            'icon' => 'info',
            'title' => __('flowbite-auth-kit::kit.verification_email_sent'),
            'description' => __('flowbite-auth-kit::kit.verification_link_sent'),
        ]);
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
