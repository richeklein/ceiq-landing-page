<?php

use App\Mail\ResourceRequestMail;
use App\Models\ResourceRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

use function Pest\Laravel\post;

uses(RefreshDatabase::class);

beforeEach(function () {
    Mail::fake();
});

test('resource request form requires name', function () {
    post(route('resource-request.store'), [
        'email' => 'test@example.com',
        'role' => 'Principal',
    ])->assertSessionHasErrors('name');
});

test('resource request form requires email', function () {
    post(route('resource-request.store'), [
        'name' => 'John Doe',
        'role' => 'Principal',
    ])->assertSessionHasErrors('email');
});

test('resource request form requires valid email', function () {
    post(route('resource-request.store'), [
        'name' => 'John Doe',
        'email' => 'invalid-email',
        'role' => 'Principal',
    ])->assertSessionHasErrors('email');
});

test('resource request form requires valid role', function () {
    post(route('resource-request.store'), [
        'name' => 'John Doe',
        'email' => 'test@example.com',
        'role' => 'Invalid Role',
    ])->assertSessionHasErrors('role');
});

test('resource request form accepts valid role options', function () {
    $validRoles = [
        'Superintendent',
        'Principal',
        'Family & Community Engagement Lead',
        'Grant / Fund Development',
        'Other District Leader',
    ];

    foreach ($validRoles as $role) {
        post(route('resource-request.store'), [
            'name' => 'John Doe',
            'email' => fake()->unique()->safeEmail(),
            'role' => $role,
        ])->assertSessionDoesntHaveErrors('role');
    }
});

test('resource request creates database record', function () {
    post(route('resource-request.store'), [
        'name' => 'Jane Smith',
        'email' => 'jane@example.com',
        'role' => 'Superintendent',
        'organization' => 'Test School District',
        'preview' => 'on',
    ])->assertRedirect();

    expect(ResourceRequest::where('email', 'jane@example.com')->exists())->toBeTrue();

    $request = ResourceRequest::where('email', 'jane@example.com')->first();
    expect($request->name)->toBe('Jane Smith');
    expect($request->role)->toBe('Superintendent');
    expect($request->organization)->toBe('Test School District');
    expect($request->wants_preview)->toBeTrue();
});

test('resource request sends confirmation email', function () {
    post(route('resource-request.store'), [
        'name' => 'Bob Wilson',
        'email' => 'bob@example.com',
        'role' => 'Principal',
    ])->assertRedirect();

    Mail::assertSent(ResourceRequestMail::class, function ($mail) {
        return $mail->hasTo('bob@example.com');
    });
});

test('resource request redirects with success message', function () {
    post(route('resource-request.store'), [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'role' => 'Principal',
    ])
        ->assertRedirect(route('home').'#weekly-resources')
        ->assertSessionHas('success');
});

test('resource request updates email_sent_at timestamp', function () {
    post(route('resource-request.store'), [
        'name' => 'Timestamp Test',
        'email' => 'timestamp@example.com',
        'role' => 'Principal',
    ])->assertRedirect();

    $request = ResourceRequest::where('email', 'timestamp@example.com')->first();
    expect($request->email_sent_at)->not->toBeNull();
});
