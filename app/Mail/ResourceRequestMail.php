<?php

namespace App\Mail;

use App\Models\ResourceRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Email sent when a user requests the CEIQ Impact Brief.
 * Contains the resource download link and welcome message.
 */
class ResourceRequestMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(
        public ResourceRequest $resourceRequest
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your CEIQ Impact Brief is Ready',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.resource-request',
        );
    }
}
