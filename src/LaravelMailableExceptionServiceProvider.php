<?php

namespace Lobotomised\LaravelMailableException;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Lobotomised\LaravelMailableException\Commands\LaravelMailableExceptionCommand;

class LaravelMailableExceptionServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-mailable-exception')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_mailable_exception_table')
            ->hasCommand(LaravelMailableExceptionCommand::class);
    }
}
