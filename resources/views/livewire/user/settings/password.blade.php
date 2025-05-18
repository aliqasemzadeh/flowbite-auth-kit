<div>
    <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <h5 class="text-xl font-medium text-gray-900 dark:text-white">{{ __('flowbite-auth-kit::kit.change_password') }}</h5>

        <form class="space-y-4 md:space-y-6" wire:submit="updatePassword">
            <x-password
                wire:model="current_password"
                label="{{ __('flowbite-auth-kit::kit.current_password') }}"
                type="password"
                required
                autocomplete="current-password"
            />
            <x-password
                wire:model="password"
                label="{{ __('flowbite-auth-kit::kit.new_password') }}"
                type="password"
                required
                autocomplete="new-password"
            />
            <x-password
                wire:model="password_confirmation"
                label="{{ __('flowbite-auth-kit::kit.confirm_password') }}"
                type="password"
                required
                autocomplete="new-password"
            />

            <x-button primary type="submit" label="{{ __('flowbite-auth-kit::kit.change_password') }}"/>
        </form>
    </div>
</div>
