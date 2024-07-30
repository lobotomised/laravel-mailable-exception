<?php

namespace Lobotomised\LaravelMailableException\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Lobotomised\LaravelMailableException\LaravelMailableException
 */
class LaravelMailableException extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Lobotomised\LaravelMailableException\LaravelMailableException::class;
    }
}
