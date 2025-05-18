<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => config('flowbite-auth-kit.routes.middleware', ['web']), 'prefix' => config('flowbite-auth-kit.routes.prefix', '')], function () {
    Route::get('/', \AliQasemzadeh\FlowbiteAuthKit\Livewire\Landing\Index::class)->name('home');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/user/dashboard/index', \AliQasemzadeh\FlowbiteAuthKit\Livewire\User\Dashboard\Index::class)->name('user.dashboard.index');

        Route::get('/user/settings/profile', \AliQasemzadeh\FlowbiteAuthKit\Livewire\User\Settings\Profile::class)->name('user.settings.profile');
        Route::get('/user/settings/password', \AliQasemzadeh\FlowbiteAuthKit\Livewire\User\Settings\Password::class)->name('user.settings.password');
    });
});
