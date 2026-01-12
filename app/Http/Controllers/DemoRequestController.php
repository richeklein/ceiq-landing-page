<?php

namespace App\Http\Controllers;

use App\Actions\StoreDemoRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Handles demo request form submissions via AJAX.
 * Includes honeypot spam protection.
 */
class DemoRequestController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        // Honeypot spam protection - if this field is filled, it's a bot
        if ($request->filled('website')) {
            // Return success to not alert the bot, but don't process
            return response()->json([
                'success' => true,
                'message' => 'Thank you! We\'ll be in touch soon.',
            ]);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'organization' => ['nullable', 'string', 'max:255'],
            'questions' => ['nullable', 'string', 'max:2000'],
        ]);

        $action = new StoreDemoRequest;
        $action->execute($validated);

        return response()->json([
            'success' => true,
            'message' => 'Thank you! We\'ll be in touch within 24 hours to schedule your demo.',
        ]);
    }
}
