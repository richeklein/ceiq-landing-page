<?php

use App\Actions\StoreDemoRequest;
use App\Mail\DemoRequestMail;
use App\Models\DemoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

uses(RefreshDatabase::class);

beforeEach(function () {
    Mail::fake();
});

test('action creates demo request record', function () {
    $action = new StoreDemoRequest;

    $result = $action->execute([
        'name' => 'Test User',
        'email' => 'action-test@school.edu',
        'organization' => 'Test District',
        'questions' => 'What integrations are available?',
    ]);

    expect($result)->toBeInstanceOf(DemoRequest::class);
    expect($result->name)->toBe('Test User');
    expect($result->email)->toBe('action-test@school.edu');
    expect($result->organization)->toBe('Test District');
    expect($result->questions)->toBe('What integrations are available?');
});

test('action sends notification email to sales', function () {
    $action = new StoreDemoRequest;

    $action->execute([
        'name' => 'Email Test',
        'email' => 'email-action@school.edu',
    ]);

    Mail::assertSent(DemoRequestMail::class, function ($mail) {
        return $mail->hasTo('rich@ceiqinc.com');
    });
});

test('action sets email_sent_at after sending', function () {
    $action = new StoreDemoRequest;

    $result = $action->execute([
        'name' => 'Sent At Test',
        'email' => 'sentat@school.edu',
    ]);

    expect($result->email_sent_at)->not->toBeNull();
});

test('action handles null organization', function () {
    $action = new StoreDemoRequest;

    $result = $action->execute([
        'name' => 'No Org User',
        'email' => 'noorg@school.edu',
    ]);

    expect($result->organization)->toBeNull();
});

test('action handles null questions', function () {
    $action = new StoreDemoRequest;

    $result = $action->execute([
        'name' => 'No Questions User',
        'email' => 'noquestions@school.edu',
    ]);

    expect($result->questions)->toBeNull();
});

test('email includes reply-to header with requester email', function () {
    $action = new StoreDemoRequest;

    $action->execute([
        'name' => 'Reply Test',
        'email' => 'reply@school.edu',
    ]);

    Mail::assertSent(DemoRequestMail::class, function ($mail) {
        $envelope = $mail->envelope();

        return collect($envelope->replyTo)->contains(fn ($address) => $address->address === 'reply@school.edu');
    });
});
