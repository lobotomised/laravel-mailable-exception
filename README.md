# Send any exception to an email

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lobotomised/laravel-mailable-exception.svg?style=flat-square)](https://packagist.org/packages/lobotomised/laravel-mailable-exception)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/lobotomised/laravel-mailable-exception/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/lobotomised/laravel-mailable-exception/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/lobotomised/laravel-mailable-exception/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/lobotomised/laravel-mailable-exception/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/lobotomised/laravel-mailable-exception.svg?style=flat-square)](https://packagist.org/packages/lobotomised/laravel-mailable-exception)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require lobotomised/laravel-mailable-exception
```

Modifier App\Exceptions\Handler;
```php
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            (new LaravelMailableException)->toMail($e);
        });
    }
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-mailable-exception-config"
```

This is the contents of the published config file:

```php
return [
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],
    'to' => [
        'address' => 'your@example.com',
    ],
    'subject' => 'An exception has occurred',
    'allowed_environments' => ['production'],
];

```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-mailable-exception-views"
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
