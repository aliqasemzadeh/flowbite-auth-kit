<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => config('flowbite-auth-kit.routes.middleware', ['web']), 'prefix' => config('flowbite-auth-kit.routes.prefix', '')], function () {
    // Auth Routes
    Route::get('/login', \YourName\FlowbiteAuthKit\Livewire\Auth\Login::class)->name('login');
    Route::get('/register', \YourName\FlowbiteAuthKit\Livewire\Auth\Register::class)->name('register');
    Route::get('/forget-password', \YourName\FlowbiteAuthKit\Livewire\Auth\ForgetPassword::class)->name('forget-password');
    Route::get('/reset-password/{token}', \YourName\FlowbiteAuthKit\Livewire\Auth\ResetPassword::class)->name('password.reset');
    Route::any('/logout', \YourName\FlowbiteAuthKit\Livewire\Auth\Logout::class)->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('verify-email', \YourName\FlowbiteAuthKit\Livewire\Auth\VerifyEmail::class)
            ->name('verification.notice');

        Route::get('verify-email/{id}/{hash}', \YourName\FlowbiteAuthKit\Http\Controllers\Auth\VerifyEmailController::class)
            ->middleware(['signed', 'throttle:6,1'])
            ->name('verification.verify');

        Route::get('confirm-password', \YourName\FlowbiteAuthKit\Livewire\Auth\ConfirmPassword::class)
            ->name('password.confirm');
    });
});
