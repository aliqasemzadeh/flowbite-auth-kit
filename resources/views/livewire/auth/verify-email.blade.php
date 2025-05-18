<div>
    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
        {{ __('flowbite-auth-kit::kit.verify_email') }}
    </h1>
    <div class="mt-4 space-y-4 md:space-y-6">
        <p class="text-center text-gray-500 dark:text-gray-400">
            {{ __('flowbite-auth-kit::kit.verify_email_message') }}
        </p>

        <div class="flex flex-col items-center justify-between space-y-3">
            <x-button wire:click="sendVerification" full primary>
                {{ __('flowbite-auth-kit::kit.resend_verification_email') }}
            </x-button>

            <a class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500 cursor-pointer" wire:click="logout">
                {{ __('flowbite-auth-kit::kit.logout') }}
            </a>
        </div>
    </div>
</div>
