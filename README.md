# Flowbite Auth Kit

A Laravel package that provides authentication, profile management, and dashboard functionality using Flowbite, WireUI, and Livewire.

## Features

- Authentication (Login, Register, Password Reset, Email Verification)
- User Profile Management
- User Dashboard
- Responsive UI with Flowbite and Tailwind CSS
- Livewire Components
- WireUI Integration

## Requirements

- PHP 8.2+
- Laravel 12.0+
- Livewire 3.6+
- WireUI 2.4+
- Flowbite 3.1+

## Installation

### 1. Install the package via Composer

```bash
composer require yourname/flowbite-auth-kit
```

### 2. Publish the assets

```bash
php artisan vendor:publish --tag=flowbite-auth-kit-config
php artisan vendor:publish --tag=flowbite-auth-kit-views
php artisan vendor:publish --tag=flowbite-auth-kit-assets
```

### 3. Install frontend dependencies

```bash
npm install flowbite
```

### 4. Add Flowbite to your CSS and JS

In your `resources/css/app.css`:

```css
@import 'flowbite/src/themes/default.css';
```

In your `resources/js/app.js`:

```js
import 'flowbite';
```

### 5. Configure Tailwind CSS

Add Flowbite to your CSS file:

```css
@import 'tailwindcss';

@import "flowbite/src/themes/default.css";

@plugin "flowbite/plugin";
@source "flowbite";

@theme {
    --font-sans: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji',
        'Segoe UI Symbol', 'Noto Color Emoji';
}
```

## Usage

### Routes

The package provides the following routes:

- `/login` - Login page
- `/register` - Registration page
- `/forget-password` - Password reset request page
- `/reset-password/{token}` - Password reset page
- `/verify-email` - Email verification notice
- `/verify-email/{id}/{hash}` - Email verification handler
- `/user/dashboard/index` - User dashboard
- `/user/settings/profile` - Profile settings
- `/user/settings/password` - Password settings

### Configuration

You can customize the package behavior by modifying the published configuration file:

```php
// config/flowbite-auth-kit.php

return [
    'routes' => [
        'prefix' => '', // Add a prefix to all routes
        'middleware' => ['web'], // Middleware for all routes
    ],
    'views' => [
        'layout' => 'flowbite-auth-kit::components.layouts.app',
        'panel_layout' => 'flowbite-auth-kit::components.layouts.panel',
    ],
    'features' => [
        'registration' => true, // Enable/disable registration
        'email_verification' => true, // Enable/disable email verification
        'password_reset' => true, // Enable/disable password reset
        'profile_management' => true, // Enable/disable profile management
    ],
];
```

## Customization

### Views

You can customize the views by publishing them and modifying the published files:

```bash
php artisan vendor:publish --tag=flowbite-auth-kit-views
```

### Styles

You can customize the styles by modifying the CSS classes in the published views or by extending the provided CSS classes in your own CSS file.

### Translations

The package comes with English and Spanish translations out of the box. You can publish the language files to customize them:

```bash
php artisan vendor:publish --tag=flowbite-auth-kit-lang
```

#### Adding a New Language

To add a new language, create a new directory in `resources/lang/vendor/flowbite-auth-kit/{language-code}` and copy the files from the English language directory.

For example, to add French translations:

```bash
mkdir -p resources/lang/vendor/flowbite-auth-kit/fr
cp -r resources/lang/vendor/flowbite-auth-kit/en/* resources/lang/vendor/flowbite-auth-kit/fr/
```

Then translate the strings in the copied files.

#### Using Translations

The package uses Laravel's translation system. You can use the `__()` helper function to translate strings:

```php
__('flowbite-auth-kit::kit.system_message')
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
