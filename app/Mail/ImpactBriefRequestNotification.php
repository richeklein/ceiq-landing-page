<?php

namespace App\Mail;

use App\Models\ResourceRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Email notification sent to the CEIQ team when someone requests the Impact Brief.
 * Contains the requester's details for follow-up.
 */
class ImpactBriefRequestNotification extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(
        public ResourceRequest $resourceRequest
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Impact Brief Request from '.$this->resourceRequest->name,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.impact-brief-request-notification',
        );
    }
}
