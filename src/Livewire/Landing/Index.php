<?php

namespace AliQasemzadeh\FlowbiteAuthKit\Livewire\Landing;

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

    #[Layout('flowbite-auth-kit::components.layouts.app')]
    public function render()
    {
        return view('flowbite-auth-kit::livewire.landing.index');
    }
}
