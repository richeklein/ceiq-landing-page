<?php

namespace App\Http\Controllers;

use App\Actions\StoreResourceRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Handles resource/newsletter form submissions.
 * Delegates to StoreResourceRequest action for business logic.
 */
class ResourceRequestController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'role' => ['required', 'string', 'in:Parent,Teacher,Principal,Family & Community Engagement Lead,District Leader,Other'],
            'organization' => ['nullable', 'string', 'max:255'],
            'preview' => ['nullable'],
        ]);

        $validated['preview'] = $request->has('preview');

        $action = new StoreResourceRequest;
        $action->execute($validated);

        return redirect()
            ->route('home')
            ->withFragment('weekly-resources')
            ->with('success', 'Thank you! Check your inbox for the Impact Brief.');
    }
}
