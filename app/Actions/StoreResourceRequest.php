<?php

namespace App\Actions;

use App\Mail\ImpactBriefRequestNotification;
use App\Mail\ResourceRequestMail;
use App\Models\ResourceRequest;
use Illuminate\Support\Facades\Mail;

/**
 * Handles the business logic for storing a resource request.
 * Creates the database record and sends the confirmation email.
 */
class StoreResourceRequest
{
    public function execute(array $data): ResourceRequest
    {
        $resourceRequest = ResourceRequest::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'organization' => $data['organization'] ?? null,
            'wants_preview' => $data['preview'] ?? false,
        ]);

        Mail::to($resourceRequest->email)
            ->send(new ResourceRequestMail($resourceRequest));

        Mail::to('info@ceiqinc.com')
            ->send(new ImpactBriefRequestNotification($resourceRequest));

        $resourceRequest->update(['email_sent_at' => now()]);

        return $resourceRequest;
    }
}
