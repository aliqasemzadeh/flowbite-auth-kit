<?php

namespace AliQasemzadeh\FlowbiteAuthKit;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class FlowbiteAuthKitServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/flowbite-auth-kit.php', 'flowbite-auth-kit'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/auth.php');

        // Load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'flowbite-auth-kit');

        // Load translations
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'flowbite-auth-kit');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // Register Livewire components
        $this->registerLivewireComponents();

        // Publish assets
        $this->publishAssets();
    }

    /**
     * Register Livewire components.
     */
    protected function registerLivewireComponents(): void
    {
        // Auth components
        Livewire::component('flowbite-auth-kit::auth.login', \AliQasemzadeh\FlowbiteAuthKit\Livewire\Auth\Login::class);
        Livewire::component('flowbite-auth-kit::auth.register', \AliQasemzadeh\FlowbiteAuthKit\Livewire\Auth\Register::class);
        Livewire::component('flowbite-auth-kit::auth.forget-password', \AliQasemzadeh\FlowbiteAuthKit\Livewire\Auth\ForgetPassword::class);
        Livewire::component('flowbite-auth-kit::auth.reset-password', \AliQasemzadeh\FlowbiteAuthKit\Livewire\Auth\ResetPassword::class);
        Livewire::component('flowbite-auth-kit::auth.verify-email', \AliQasemzadeh\FlowbiteAuthKit\Livewire\Auth\VerifyEmail::class);
        Livewire::component('flowbite-auth-kit::auth.confirm-password', \AliQasemzadeh\FlowbiteAuthKit\Livewire\Auth\ConfirmPassword::class);
        Livewire::component('flowbite-auth-kit::auth.logout', \AliQasemzadeh\FlowbiteAuthKit\Livewire\Auth\Logout::class);

        // User components
        Livewire::component('flowbite-auth-kit::user.dashboard.index', \AliQasemzadeh\FlowbiteAuthKit\Livewire\User\Dashboard\Index::class);
        Livewire::component('flowbite-auth-kit::user.settings.profile', \AliQasemzadeh\FlowbiteAuthKit\Livewire\User\Settings\Profile::class);
        Livewire::component('flowbite-auth-kit::user.settings.password', \AliQasemzadeh\FlowbiteAuthKit\Livewire\User\Settings\Password::class);
    }

    /**
     * Publish assets.
     */
    protected function publishAssets(): void
    {
        // Publish config
        $this->publishes([
            __DIR__.'/../config/flowbite-auth-kit.php' => config_path('flowbite-auth-kit.php'),
        ], 'flowbite-auth-kit-config');

        // Publish views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/flowbite-auth-kit'),
        ], 'flowbite-auth-kit-views');

        // Publish assets
        $this->publishes([
            __DIR__.'/../resources/css' => resource_path('css/vendor/flowbite-auth-kit'),
            __DIR__.'/../resources/js' => resource_path('js/vendor/flowbite-auth-kit'),
        ], 'flowbite-auth-kit-assets');

        // Publish migrations
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'flowbite-auth-kit-migrations');

        // Publish language files
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/flowbite-auth-kit'),
        ], 'flowbite-auth-kit-lang');
    }
}
