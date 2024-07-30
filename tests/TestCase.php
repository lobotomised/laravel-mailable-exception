<?php

namespace Lobotomised\LaravelMailableException\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Lobotomised\LaravelMailableException\LaravelMailableExceptionServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Lobotomised\\LaravelMailableException\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelMailableExceptionServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-mailable-exception_table.php.stub';
        $migration->up();
        */
    }
}
