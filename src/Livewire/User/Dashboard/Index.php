<?php

namespace AliQasemzadeh\FlowbiteAuthKit\Livewire\User\Dashboard;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    /**
     * Mount the component.
     */
    public function mount(): void
    {
        // You can add initialization logic here
    }

    /**
     * Render the component.
     */
    #[Layout('flowbite-auth-kit::components.layouts.panel')]
    public function render()
    {
        return view('flowbite-auth-kit::livewire.user.dashboard.index', [
            'user' => Auth::user(),
        ]);
    }
}
