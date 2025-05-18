<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => config('flowbite-auth-kit.routes.middleware', ['web']), 'prefix' => config('flowbite-auth-kit.routes.prefix', '')], function () {
    // Auth Routes
    Route::get('/login', \AliQasemzadeh\FlowbiteAuthKit\Livewire\Auth\Login::class)->name('login');
    Route::get('/register', \AliQasemzadeh\FlowbiteAuthKit\Livewire\Auth\Register::class)->name('register');
    Route::get('/forget-password', \AliQasemzadeh\FlowbiteAuthKit\Livewire\Auth\ForgetPassword::class)->name('forget-password');
    Route::get('/reset-password/{token}', \AliQasemzadeh\FlowbiteAuthKit\Livewire\Auth\ResetPassword::class)->name('password.reset');
    Route::any('/logout', \AliQasemzadeh\FlowbiteAuthKit\Livewire\Auth\Logout::class)->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('verify-email', \AliQasemzadeh\FlowbiteAuthKit\Livewire\Auth\VerifyEmail::class)
            ->name('verification.notice');

        Route::get('verify-email/{id}/{hash}', \AliQasemzadeh\FlowbiteAuthKit\Http\Controllers\Auth\VerifyEmailController::class)
            ->middleware(['signed', 'throttle:6,1'])
            ->name('verification.verify');

        Route::get('confirm-password', \AliQasemzadeh\FlowbiteAuthKit\Livewire\Auth\ConfirmPassword::class)
            ->name('password.confirm');
    });
});
