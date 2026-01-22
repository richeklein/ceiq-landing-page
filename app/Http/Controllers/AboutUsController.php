<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Renders the about us (company overview) page.
 * This is an invokable controller for the detailed company information page.
 */
class AboutUsController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('pages.about-us');
    }
}
