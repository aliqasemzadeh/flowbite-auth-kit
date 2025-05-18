<div>
    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
        {{ __('flowbite-auth-kit::kit.login_to_your_account') }}
    </h1>
    <form class="space-y-4 md:space-y-6" wire:submit="login" >
        <x-input
            required
            type="email"
            wire:model="email"
            label="{{ __('flowbite-auth-kit::kit.email_address') }}"
            placeholder="{{ __('flowbite-auth-kit::kit.email') }}"
        />
        <x-password
            required
            wire:model="password"
            label="{{ __('flowbite-auth-kit::kit.password') }}"
            placeholder="{{ __('flowbite-auth-kit::kit.password') }}"
        />

        <div class="flex items-center justify-between">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input wire:model="remember" id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                </div>
                <div class="ml-3 text-sm">
                    <label for="remember" class="text-gray-500 dark:text-gray-300">{{ __('flowbite-auth-kit::kit.remember_me') }}</label>
                </div>
            </div>
            <a href="{{ route('forget-password') }}" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">{{ __('flowbite-auth-kit::kit.forget_password') }}</a>
        </div>
        <x-button full primary type="submit" label="{{ __('flowbite-auth-kit::kit.login') }}" />
        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            {{ __('flowbite-auth-kit::kit.login_register_message') }} <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">{{ __('flowbite-auth-kit::kit.register') }}</a>
        </p>
    </form>
</div>
