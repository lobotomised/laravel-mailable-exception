<?php

declare(strict_types=1);

namespace Lobotomised\LaravelMailableException;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ExceptionOccurred extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $content) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(
                config('mailable-exception.from.address'),
                config('mailable-exception.from.name')
            ),
            subject: config('mailable-exception.subject'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mailable-exception::mail',
        );
    }

    /**
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
