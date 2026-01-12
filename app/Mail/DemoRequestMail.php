<?php

namespace App\Mail;

use App\Models\DemoRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Email notification sent when a user requests a demo.
 * Sent to the sales team with the requester's information.
 */
class DemoRequestMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(
        public DemoRequest $demoRequest
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Demo Request from '.$this->demoRequest->name,
            replyTo: [$this->demoRequest->email],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.demo-request',
        );
    }
}
