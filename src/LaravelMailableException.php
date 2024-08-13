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
        $to = config('mailable-exception.to.address');

        if (! app()->environment($allowedEnvironments)) {
            return;
        }

        if($to === 'your@example.com') {
            Log::notice('The destination email address is not configured in the config file The destination email address is not configured');

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

            Mail::to($to)->send(new ExceptionOccurred($content));
        } catch (Throwable $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());
        }
    }
}
