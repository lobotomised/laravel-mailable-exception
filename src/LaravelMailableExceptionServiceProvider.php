<?php

namespace Lobotomised\LaravelMailableException;

use Illuminate\Support\ServiceProvider;

class LaravelMailableExceptionServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $configPath = __DIR__.'/../config/mailable-exception.php';

        $configKey = 'laravel-mailable-exception-config';

        $this->publishes([$configPath => config_path('mailable-exception.php')], $configKey);
        $this->mergeConfigFrom($configPath, $configKey);

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'mailable-exception');
    }
}
