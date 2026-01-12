<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Renders the terms of use page.
 * This is an invokable controller for the legal terms page.
 */
class TermsController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('pages.terms');
    }
}
