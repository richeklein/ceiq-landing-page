<?php

use App\Mail\DemoRequestMail;
use App\Models\DemoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

use function Pest\Laravel\postJson;

uses(RefreshDatabase::class);

beforeEach(function () {
    Mail::fake();
});

test('demo request form requires name', function () {
    postJson(route('demo-request.store'), [
        'email' => 'test@example.com',
    ])->assertStatus(422)
        ->assertJsonValidationErrors('name');
});

test('demo request form requires email', function () {
    postJson(route('demo-request.store'), [
        'name' => 'John Doe',
    ])->assertStatus(422)
        ->assertJsonValidationErrors('email');
});

test('demo request form requires valid email', function () {
    postJson(route('demo-request.store'), [
        'name' => 'John Doe',
        'email' => 'invalid-email',
    ])->assertStatus(422)
        ->assertJsonValidationErrors('email');
});

test('demo request creates database record', function () {
    postJson(route('demo-request.store'), [
        'name' => 'Jane Smith',
        'email' => 'jane@schooldistrict.edu',
        'organization' => 'Lincoln School District',
        'questions' => 'How does the platform integrate with our SIS?',
    ])->assertOk()
        ->assertJson(['success' => true]);

    expect(DemoRequest::where('email', 'jane@schooldistrict.edu')->exists())->toBeTrue();

    $request = DemoRequest::where('email', 'jane@schooldistrict.edu')->first();
    expect($request->name)->toBe('Jane Smith');
    expect($request->organization)->toBe('Lincoln School District');
    expect($request->questions)->toBe('How does the platform integrate with our SIS?');
});

test('demo request sends notification email', function () {
    postJson(route('demo-request.store'), [
        'name' => 'Bob Wilson',
        'email' => 'bob@school.edu',
    ])->assertOk();

    Mail::assertSent(DemoRequestMail::class, function ($mail) {
        return $mail->hasTo('rich@ceiqinc.com');
    });
});

test('demo request returns success message', function () {
    postJson(route('demo-request.store'), [
        'name' => 'Test User',
        'email' => 'test@school.edu',
    ])->assertOk()
        ->assertJson([
            'success' => true,
            'message' => "Thank you! We'll be in touch within 24 hours to schedule your demo.",
        ]);
});

test('demo request updates email_sent_at timestamp', function () {
    postJson(route('demo-request.store'), [
        'name' => 'Timestamp Test',
        'email' => 'timestamp@school.edu',
    ])->assertOk();

    $request = DemoRequest::where('email', 'timestamp@school.edu')->first();
    expect($request->email_sent_at)->not->toBeNull();
});

test('honeypot field prevents spam submissions but returns success', function () {
    postJson(route('demo-request.store'), [
        'name' => 'Spam Bot',
        'email' => 'spam@bot.com',
        'website' => 'http://spam.com', // honeypot field filled
    ])->assertOk()
        ->assertJson(['success' => true]);

    // Record should NOT be created
    expect(DemoRequest::where('email', 'spam@bot.com')->exists())->toBeFalse();

    // Email should NOT be sent
    Mail::assertNothingSent();
});

test('demo request handles optional fields', function () {
    postJson(route('demo-request.store'), [
        'name' => 'Minimal User',
        'email' => 'minimal@school.edu',
    ])->assertOk();

    $request = DemoRequest::where('email', 'minimal@school.edu')->first();
    expect($request->organization)->toBeNull();
    expect($request->questions)->toBeNull();
});
