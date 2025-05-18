<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Routes Configuration
    |--------------------------------------------------------------------------
    |
    | Here you can configure the routes used by the package.
    |
    */
    'routes' => [
        'prefix' => '',
        'middleware' => ['web'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Views Configuration
    |--------------------------------------------------------------------------
    |
    | Here you can configure the views used by the package.
    |
    */
    'views' => [
        'layout' => 'flowbite-auth-kit::components.layouts.app',
        'panel_layout' => 'flowbite-auth-kit::components.layouts.panel',
        'auth_layout' => 'flowbite-auth-kit::components.layouts.auth',
    ],

    /*
    |--------------------------------------------------------------------------
    | Features Configuration
    |--------------------------------------------------------------------------
    |
    | Here you can enable or disable features provided by the package.
    |
    */
    'features' => [
        'registration' => true,
        'email_verification' => true,
        'password_reset' => true,
        'profile_management' => true,
    ],
];
