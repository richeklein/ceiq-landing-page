<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\DemoRequestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\ResourceRequestController;
use App\Http\Controllers\TermsController;
use Illuminate\Support\Facades\Route;

// Static pages
Route::get('/', HomeController::class)->name('home');
Route::redirect('/about', '/about-us', 301);
Route::get('/about-us', AboutUsController::class)->name('about-us');
Route::get('/terms', TermsController::class)->name('terms');
Route::get('/privacy', PrivacyController::class)->name('privacy');

// Form submissions
Route::post('/resource-request', ResourceRequestController::class)->name('resource-request.store');
Route::post('/demo-request', DemoRequestController::class)->name('demo-request.store');
