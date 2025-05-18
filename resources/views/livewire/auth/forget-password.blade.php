<div>
    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
        {{ __('flowbite-auth-kit::kit.forget_password') }}
    </h1>
    <form class="space-y-4 md:space-y-6" wire:submit="sendPasswordResetLink" >
        <x-input
            required
            type="email"
            wire:model="email"
            autofocus
            label="{{ __('flowbite-auth-kit::kit.email_address') }}"
            placeholder="{{ __('flowbite-auth-kit::kit.email') }}"
        />

        <x-button full primary type="submit" label="{{ __('flowbite-auth-kit::kit.email_password_reset_link') }}" />
        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            {{ __('flowbite-auth-kit::kit.login_register_message') }} <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">{{ __('flowbite-auth-kit::kit.register') }}</a>
        </p>
        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            {{ __('flowbite-auth-kit::kit.register_already_registered') }} <a href="{{ route('login') }}"
                                                           class="font-medium text-primary-600 hover:underline dark:text-primary-500">{{ __('flowbite-auth-kit::kit.login') }}</a>
        </p>
    </form>
</div>
