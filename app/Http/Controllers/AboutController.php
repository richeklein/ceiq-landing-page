<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Renders the about us page.
 * This is an invokable controller for the company information page.
 */
class AboutController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('pages.about');
    }
}
