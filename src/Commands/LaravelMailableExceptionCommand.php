<?php

namespace Lobotomised\LaravelMailableException\Commands;

use Illuminate\Console\Command;

class LaravelMailableExceptionCommand extends Command
{
    public $signature = 'laravel-mailable-exception';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
