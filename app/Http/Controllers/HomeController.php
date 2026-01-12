<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Renders the home/landing page.
 * This is an invokable controller for the main marketing page.
 */
class HomeController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('pages.home');
    }
}
