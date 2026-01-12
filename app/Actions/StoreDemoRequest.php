<?php

namespace App\Actions;

use App\Mail\DemoRequestMail;
use App\Models\DemoRequest;
use Illuminate\Support\Facades\Mail;

/**
 * Handles the business logic for storing a demo request.
 * Creates the database record and sends the notification email.
 */
class StoreDemoRequest
{
    public function execute(array $data): DemoRequest
    {
        $demoRequest = DemoRequest::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'organization' => $data['organization'] ?? null,
            'questions' => $data['questions'] ?? null,
        ]);

        Mail::to('rich@ceiqinc.com')
            ->send(new DemoRequestMail($demoRequest));

        $demoRequest->update(['email_sent_at' => now()]);

        return $demoRequest;
    }
}
