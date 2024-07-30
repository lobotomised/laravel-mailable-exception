<?php

namespace Lobotomised\LaravelMailableException;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class LaravelMailableException
{
    public function toMail(Throwable $exception): void
    {
        $allowedEnvironments = config('mailable-exception.allowed_environments');

        if (! app()->environment($allowedEnvironments)) {
            return;
        }

        try {
            $content = [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'trace' => $exception->getTrace(),

                'url' => request()->fullUrl(),
                'body' => request()->all(),
                'ip' => request()->ip(),
            ];

            Mail::to(config('mailable-exception.to.address'))->send(new ExceptionOccurred($content));
        } catch (Throwable $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());
        }
    }
}
