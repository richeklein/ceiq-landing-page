<?php

use App\Actions\StoreResourceRequest;
use App\Mail\ResourceRequestMail;
use App\Models\ResourceRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

uses(RefreshDatabase::class);

beforeEach(function () {
    Mail::fake();
});

test('action creates resource request record', function () {
    $action = new StoreResourceRequest;

    $result = $action->execute([
        'name' => 'Test User',
        'email' => 'action-test@example.com',
        'role' => 'Teacher',
        'organization' => 'Test District',
        'preview' => true,
    ]);

    expect($result)->toBeInstanceOf(ResourceRequest::class);
    expect($result->name)->toBe('Test User');
    expect($result->email)->toBe('action-test@example.com');
    expect($result->role)->toBe('Teacher');
    expect($result->organization)->toBe('Test District');
    expect($result->wants_preview)->toBeTrue();
});

test('action sends email to requester', function () {
    $action = new StoreResourceRequest;

    $action->execute([
        'name' => 'Email Test',
        'email' => 'email-action@example.com',
        'role' => 'Principal',
        'preview' => false,
    ]);

    Mail::assertSent(ResourceRequestMail::class, function ($mail) {
        return $mail->hasTo('email-action@example.com');
    });
});

test('action sets email_sent_at after sending', function () {
    $action = new StoreResourceRequest;

    $result = $action->execute([
        'name' => 'Sent At Test',
        'email' => 'sentat@example.com',
        'role' => 'Principal',
        'preview' => false,
    ]);

    expect($result->email_sent_at)->not->toBeNull();
});

test('action handles null organization', function () {
    $action = new StoreResourceRequest;

    $result = $action->execute([
        'name' => 'No Org User',
        'email' => 'noorg@example.com',
        'role' => 'Principal',
    ]);

    expect($result->organization)->toBeNull();
});

test('action handles null preview preference', function () {
    $action = new StoreResourceRequest;

    $result = $action->execute([
        'name' => 'No Preview User',
        'email' => 'nopreview@example.com',
        'role' => 'Principal',
    ]);

    expect($result->wants_preview)->toBeFalse();
});
