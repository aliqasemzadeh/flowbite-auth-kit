<?php

namespace AliQasemzadeh\FlowbiteAuthKit\Livewire;

use Livewire\Component as LivewireComponent;
use WireUi\Traits\WireUiActions;

abstract class Component extends LivewireComponent
{
    use WireUiActions;

    /**
     * Get the views / contents that represent the component.
     */
    public function render()
    {
        return view($this->getViewName());
    }

    /**
     * Get the view name for the component.
     */
    protected function getViewName(): string
    {
        $name = class_basename(static::class);
        $path = str_replace('\\', '.', substr(static::class, strlen(__NAMESPACE__) + 1));
        $path = strtolower(str_replace($name, '', $path));
        $name = strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $name));

        return 'flowbite-auth-kit::livewire.' . trim($path, '.') . '.' . $name;
    }
}
