<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Renders the privacy policy page.
 * This is an invokable controller for the privacy policy page.
 */
class PrivacyController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('pages.privacy');
    }
}
