{{--
Main application layout.
Provides consistent structure, styling, and navigation across all pages.
--}}
@props(['title' => 'CEIQ | Community Engagement Intelligence for K-12'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>

    {{-- Favicons --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('images/favicons/safari-pinned-tab.svg') }}" color="#2563eb">
    <link rel="shortcut icon" href="{{ asset('images/favicons/favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#2563eb">
    <meta name="msapplication-config" content="{{ asset('images/favicons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap&font-display=swap" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        /* --- CSS Reset & Base Styles --- */
        :root {
            --color-primary: #2563eb;
            --color-primary-hover: #1d4ed8;
            --color-accent: #f97316;
            --color-deep: #0f172a;
            --color-muted: #e2e8f0;
            --color-light-bg: #f8f9fc;
            --color-text-dark: #1f2937;
            --color-text-medium: #4b5563;
            --color-text-light: #6b7280;
            --font-family-sans: 'Manrope', sans-serif;
            --container-padding: 1rem;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 20px 35px -15px rgba(15, 23, 42, 0.25);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html, body { scroll-behavior: smooth; }
        body {
            font-family: var(--font-family-sans);
            background-color: var(--color-light-bg);
            color: var(--color-text-dark);
            line-height: 1.6;
        }
        h1, h2, h3 { font-weight: 800; color: #111827; letter-spacing: -0.025em; }
        h1 { font-size: 2.25rem; line-height: 1.08; }
        h2 { font-size: 1.75rem; line-height: 1.15; }
        h3 { font-size: 1.125rem; line-height: 1.2; }
        p { color: var(--color-text-medium); }
        a { text-decoration: none; color: inherit; transition: color 0.2s ease-in-out; }
        a:focus-visible, button:focus-visible {
            outline: 2px solid var(--color-primary);
            outline-offset: 2px;
            border-radius: 0.25rem;
        }

        .container {
            width: 100%;
            max-width: 1280px;
            margin-left: auto;
            margin-right: auto;
            padding: 0 var(--container-padding);
        }

        /* --- Buttons --- */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.25rem;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            font-family: inherit;
            font-size: inherit;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }
        .btn-primary {
            background-color: var(--color-primary);
            color: white;
            box-shadow: var(--shadow-md);
        }
        .btn-primary:hover { background-color: var(--color-primary-hover); transform: translateY(-2px); }
        .btn-secondary { border: 1px solid var(--color-primary); color: var(--color-primary); }
        .btn-secondary:hover { background-color: #eff6ff; transform: translateY(-2px); }
        .btn-video {
            border: 1px solid var(--color-primary);
            color: var(--color-primary);
            background-color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
        }
        .btn-video:hover { background-color: #eff6ff; transform: translateY(-2px); }
        .btn-tertiary { color: var(--color-text-medium); }
        .btn-tertiary:hover { color: var(--color-primary); }
        .btn-compact { padding: 0.5rem 0.9rem; border-radius: 0.5rem; font-size: 0.95rem; }
        .btn-link { color: var(--color-primary); font-weight: 700; display: inline-flex; align-items: center; gap: 0.35rem; }

        /* --- Header --- */
        .header {
            background-color: rgba(248, 249, 252, 0.8);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 50;
        }
        .header-container { display: flex; align-items: center; justify-content: space-between; height: 4rem; }
        .logo { display: flex; align-items: center; gap: 0.5rem; }
        .logo img { height: 28px; width: auto; object-fit: contain; }
        .nav-links { display: none; }
        .nav-links a { color: var(--color-text-medium); font-weight: 600; padding: 0.25rem 0.5rem; }
        .nav-links a:hover { color: var(--color-primary); }
        .header-actions { display: none; }
        .mobile-menu-button {
            display: flex;
            background: none;
            border: none;
            padding: 0.5rem;
            cursor: pointer;
            transition: opacity 0.2s ease;
        }
        .mobile-menu-button:hover { opacity: 0.7; }
        .mobile-menu-button img { width: 24px; height: 24px; }

        /* Mobile Menu */
        #mobile-menu {
            max-height: 0;
            overflow: hidden;
            border-top: 1px solid transparent;
            transition: max-height 0.3s ease-in-out, border-color 0.3s ease-in-out;
        }
        #mobile-menu.is-open { max-height: 500px; border-top-color: #e5e7eb; }
        #mobile-menu .nav-links-mobile {
            padding: 0.5rem 0.75rem 1rem;
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 0.3s ease-in-out 0.1s, transform 0.3s ease-in-out 0.1s;
        }
        #mobile-menu.is-open .nav-links-mobile { opacity: 1; transform: translateY(0); }
        #mobile-menu .nav-links-mobile a {
            display: block;
            padding: 0.5rem 0.75rem;
            border-radius: 0.375rem;
            font-weight: 500;
            color: var(--color-text-medium);
            transition: color 0.2s ease, background-color 0.2s ease;
        }
        #mobile-menu .nav-links-mobile a:hover { color: var(--color-primary); background-color: #f3f4f6; }
        #mobile-menu .header-actions-mobile {
            border-top: 1px solid #e5e7eb;
            padding: 1rem 1.25rem;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 0.3s ease-in-out 0.15s, transform 0.3s ease-in-out 0.15s;
        }
        #mobile-menu.is-open .header-actions-mobile { opacity: 1; transform: translateY(0); }

        /* --- Hero Section --- */
        .hero {
            padding: 6rem 0;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #eef2ff 0%, #f5f3ff 45%, #eff6ff 100%);
        }
        .hero .container { position: relative; z-index: 2; }
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .blob {
            position: absolute;
            z-index: 1;
            border-radius: 9999px;
            mix-blend-mode: multiply;
            filter: blur(3rem);
            animation: blob 8s infinite;
            will-change: transform;
        }
        .blob1 { top: -5rem; left: -10rem; width: 30rem; height: 30rem; background-color: rgba(147, 197, 253, 0.5); }
        .blob2 { bottom: -5rem; right: -10rem; width: 30rem; height: 30rem; background-color: rgba(165, 180, 252, 0.5); animation-delay: 3s; }
        .hero-grid { display: grid; grid-template-columns: 1fr; gap: 2.5rem; align-items: center; }
        .hero-content { text-align: center; }
        .hero-content h1 { color: #111827; max-width: 520px; margin-left: auto; margin-right: auto; }
        .hero-content .highlight { color: var(--color-primary); }
        .hero-content p { margin: 1.5rem auto 0; font-size: 1.125rem; max-width: 36rem; }
        .hero-actions { margin-top: 2rem; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 1rem; }
        .hero-actions .btn { width: 100%; }
        .hero-visual {
            position: relative;
            width: 100%;
            max-width: 680px;
            margin: 0 auto;
            border-radius: 1.25rem;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 28px 60px -38px rgba(15, 23, 42, 0.55);
            isolation: isolate;
        }
        .hero-visual::after {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 90% 20%, rgba(255, 255, 255, 0.14), transparent 55%);
            z-index: 2;
            pointer-events: none;
        }
        .hero-visual img { position: relative; z-index: 1; width: 100%; height: auto; display: block; border-radius: inherit; object-position: center top; }

        /* --- Video Modal --- */
        .video-modal {
            position: fixed;
            inset: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.85);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
        .video-modal.is-open { opacity: 1; visibility: visible; }
        .video-modal-content {
            position: relative;
            width: 90%;
            max-width: 900px;
            aspect-ratio: 16 / 9;
            background: #000;
            border-radius: 0.5rem;
            overflow: hidden;
            transform: scale(0.95);
            transition: transform 0.3s ease;
        }
        .video-modal.is-open .video-modal-content { transform: scale(1); }
        .video-modal iframe { width: 100%; height: 100%; border: none; }
        .video-modal-close {
            position: absolute;
            top: -2.5rem;
            right: 0;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0.5rem;
            transition: opacity 0.2s ease;
        }
        .video-modal-close:hover { opacity: 0.7; }

        /* --- Demo Request Modal --- */
        .demo-modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(4px);
            padding: 1rem;
        }
        .demo-modal {
            position: relative;
            width: 100%;
            max-width: 480px;
            max-height: 90vh;
            overflow-y: auto;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            padding: 2rem;
        }
        .demo-modal-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: none;
            border: none;
            color: var(--color-text-light);
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .demo-modal-close:hover {
            background-color: var(--color-muted);
            color: var(--color-text-dark);
        }
        .demo-modal-header {
            margin-bottom: 1.5rem;
            padding-right: 2rem;
        }
        .demo-modal-header h2 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        .demo-modal-header p {
            font-size: 0.9375rem;
            color: var(--color-text-medium);
        }
        .demo-modal-form {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }
        .demo-modal-field {
            display: flex;
            flex-direction: column;
            gap: 0.375rem;
        }
        .demo-modal-field label {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--color-text-dark);
        }
        .demo-modal-field .required {
            color: #dc2626;
        }
        .demo-modal-field input,
        .demo-modal-field textarea {
            padding: 0.75rem 1rem;
            border: 1px solid var(--color-muted);
            border-radius: 0.5rem;
            font-size: 1rem;
            font-family: inherit;
            color: var(--color-text-dark);
            transition: all 0.2s ease;
            background-color: white;
        }
        .demo-modal-field input:focus,
        .demo-modal-field textarea:focus {
            outline: none;
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
        .demo-modal-field input.has-error,
        .demo-modal-field textarea.has-error {
            border-color: #dc2626;
        }
        .demo-modal-field input::placeholder,
        .demo-modal-field textarea::placeholder {
            color: #9ca3af;
        }
        .demo-modal-field textarea {
            resize: vertical;
            min-height: 80px;
        }
        .demo-modal-field .field-error {
            font-size: 0.8125rem;
            color: #dc2626;
        }
        .demo-modal-error {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1rem;
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 0.5rem;
            color: #dc2626;
            font-size: 0.875rem;
        }
        .demo-modal-submit {
            width: 100%;
            padding: 0.875rem 1.5rem;
            font-size: 1rem;
            margin-top: 0.5rem;
        }
        .demo-modal-submit:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }
        .demo-modal-spinner {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        .demo-modal-spinner svg {
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .demo-modal-privacy {
            font-size: 0.8125rem;
            color: var(--color-text-light);
            text-align: center;
        }
        .demo-modal-privacy a {
            color: var(--color-primary);
            text-decoration: underline;
        }
        .demo-modal-success {
            text-align: center;
            padding: 2rem 0;
        }
        .demo-modal-success-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background-color: #ecfdf5;
            border-radius: 50%;
            color: #059669;
        }
        .demo-modal-success h3 {
            font-size: 1.5rem;
            margin-bottom: 0.75rem;
        }
        .demo-modal-success p {
            font-size: 1rem;
            color: var(--color-text-medium);
            margin-bottom: 1.5rem;
            max-width: 320px;
            margin-left: auto;
            margin-right: auto;
        }
        .demo-modal-success .btn {
            min-width: 120px;
        }
        [x-cloak] { display: none !important; }

        /* --- Storyline Section --- */
        .storyline { padding: 6rem 0; background: #ffffff; color: var(--color-text-dark); }
        .storyline header { text-align: center; margin-bottom: 2.5rem; }
        .storyline header h2 { color: var(--color-text-dark); }
        .storyline header p { color: var(--color-text-medium); margin-top: 1rem; max-width: 48rem; margin-left: auto; margin-right: auto; }
        .storyline header .subtitle {
            font-size: 0.875rem;
            font-weight: 700;
            color: var(--color-accent);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 0.5rem;
        }
        .storyline-grid { display: grid; grid-template-columns: 1fr; gap: 2rem; }
        .storyline-carousel-wrapper { border-radius: 1rem; overflow: visible; background: #ffffff; }
        .storyline-carousel-wrapper .carousel { background: #ffffff; }
        .storyline-carousel-wrapper .carousel-track { border-radius: 1rem; box-shadow: var(--shadow-lg); background: #ffffff; }
        .storyline-carousel-wrapper .carousel-slide img { border-radius: 1rem; }
        .storyline-carousel-wrapper .carousel-dots { padding-top: 1rem; padding-bottom: 0; background: #ffffff; }
        .storyline-image {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }
        .storyline-image img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 1rem;
        }
        .storyline-insights {
            background: white;
            color: var(--color-text-dark);
            border-radius: 1.25rem;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
            box-shadow: 0 20px 35px -15px rgba(15, 23, 42, 0.18);
            border: 1px solid rgba(226, 232, 240, 0.6);
        }
        .insights-eyebrow { text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.85rem; font-weight: 700; color: var(--color-accent); }
        .storyline-insights h3 { font-size: 1.75rem; color: var(--color-text-dark); }
        .insights-list { list-style: none; display: flex; flex-direction: column; gap: 0.75rem; }
        .insights-list li { display: flex; gap: 0.75rem; align-items: flex-start; color: var(--color-text-medium); font-weight: 600; }
        .insights-list strong { display: block; color: var(--color-text-dark); font-size: 1rem; }
        .insights-list p { margin-top: 0.25rem; font-weight: 400; color: var(--color-text-medium); }
        .insights-icon { width: 1rem; margin-top: 0.35rem; color: var(--color-primary); }
        .storyline-card-wrapper {
            max-width: 900px;
            margin: 0 auto;
        }
        .insights-chart {
            margin-bottom: 1.5rem;
        }
        .insights-chart img {
            width: 100%;
            height: auto;
            border-radius: 0.75rem;
        }
        .insights-content {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        /* --- Feature Slider --- */
        .feature-slider-wrapper {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
        }
        .feature-slider {
            position: relative;
            min-height: 400px;
            overflow: hidden;
        }
        .feature-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            transform: scale(0.985);
            transition: opacity 400ms ease, transform 400ms ease;
            background: white;
            border-radius: 1.25rem;
            padding: 2rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid rgba(226, 232, 240, 0.6);
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
        }
        .feature-slide.is-active {
            position: relative;
            opacity: 1;
            transform: scale(1);
        }
        .feature-slide-content {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        .slide-header {
            font-size: 1rem;
            font-weight: 600;
            color: var(--color-text-medium);
            margin: 0;
        }
        .feature-slide-content > p {
            color: var(--color-text-medium);
            line-height: 1.6;
        }
        .feature-checklist {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }
        .feature-checklist li {
            display: flex;
            gap: 0.75rem;
            align-items: flex-start;
        }
        .feature-checklist .check-icon {
            width: 1.25rem;
            height: 1.25rem;
            flex-shrink: 0;
            margin-top: 0.2rem;
            color: var(--color-primary);
        }
        .feature-checklist strong {
            display: block;
            color: var(--color-text-dark);
            font-size: 1rem;
            font-weight: 600;
        }
        .feature-checklist p {
            margin-top: 0.25rem;
            font-size: 0.9rem;
            color: var(--color-text-medium);
        }
        .feature-slide-image {
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: var(--shadow-md);
        }
        .feature-slide-image img {
            width: 100%;
            height: auto;
            display: block;
        }
        .feature-slider-dots {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            padding: 1.5rem 0 0;
        }
        .feature-slider-dots .dot {
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 9999px;
            border: none;
            background-color: var(--color-muted);
            cursor: pointer;
            transition: background-color 0.2s ease, width 0.2s ease;
        }
        .feature-slider-dots .dot:hover {
            background-color: var(--color-primary);
        }
        .feature-slider-dots .dot.is-active {
            background-color: var(--color-primary);
            width: 1.25rem;
        }

        /* --- Carousel --- */
        .carousel { width: 100%; }
        .carousel-track { position: relative; overflow: hidden; }
        .carousel-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            transform: scale(0.985);
            transition: opacity 400ms ease, transform 400ms ease;
        }
        .carousel-slide.is-active { position: relative; opacity: 1; transform: scale(1); }
        .carousel-slide img { width: 100%; height: auto; display: block; }
        .carousel-dots { display: flex; justify-content: center; gap: 0.5rem; padding: 1rem 0; }
        .carousel-dots .dot {
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 9999px;
            border: none;
            background-color: var(--color-muted);
            cursor: pointer;
            transition: background-color 0.2s ease, width 0.2s ease;
        }
        .carousel-dots .dot:hover { background-color: var(--color-primary); }
        .carousel-dots .dot.is-active { background-color: var(--color-primary); width: 1.25rem; }

        /* --- Features Section --- */
        .features { padding: 6rem 0; background: #ffffff; }
        .features .section-header { text-align: center; max-width: 52rem; margin: 0 auto 3rem; }
        .features .section-header .subtitle {
            font-size: 0.875rem;
            font-weight: 700;
            color: var(--color-accent);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 0.5rem;
        }
        .features .section-header p { margin-top: 1rem; color: var(--color-text-medium); }
        .feature-grid { display: grid; grid-template-columns: 1fr; gap: 1.5rem; }
        .feature-card {
            background: white;
            padding: 1.75rem;
            border-radius: 1rem;
            box-shadow: var(--shadow-sm);
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }
        .feature-card:hover { box-shadow: var(--shadow-md); transform: translateY(-2px); }
        .feature-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 4rem;
            height: 4rem;
            border-radius: 0.75rem;
            margin-bottom: 1.25rem;
        }
        .feature-icon svg { width: 28px; height: 28px; color: white; }
        .feature-card h3 { margin-bottom: 0.5rem; }

        /* --- Platform Demo --- */
        .platform-demo {
            margin-top: 4rem;
            text-align: center;
        }
        .platform-demo-header {
            margin-bottom: 2rem;
        }
        .platform-demo-header h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        .platform-demo-header p {
            color: var(--color-text-medium);
            max-width: 32rem;
            margin: 0 auto;
        }
        .platform-carousel-wrapper {
            max-width: 900px;
            margin: 0 auto;
            border-radius: 1rem;
            overflow: visible;
            background: #ffffff;
        }
        .platform-carousel-wrapper .carousel-track {
            border-radius: 1rem;
            box-shadow: var(--shadow-lg);
            background: #ffffff;
        }
        .platform-carousel-wrapper .carousel-slide img {
            border-radius: 1rem;
        }
        .platform-carousel-wrapper .carousel-dots {
            padding-top: 1.5rem;
            padding-bottom: 0;
        }

        /* --- Solutions Section --- */
        .solutions-content {
            max-width: 52rem;
            margin: 0 auto;
        }
        .solutions-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        .solution-item {
            display: flex;
            gap: 1rem;
            align-items: flex-start;
            padding: 1.5rem;
            background: white;
            border-radius: 1rem;
            box-shadow: var(--shadow-sm);
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }
        .solution-item:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }
        .solution-icon {
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 0.5rem;
            background: linear-gradient(135deg, var(--color-primary), #8b5cf6);
        }
        .solution-icon svg {
            width: 1.25rem;
            height: 1.25rem;
            color: white;
        }
        .solution-item strong {
            display: block;
            color: var(--color-text-dark);
            font-size: 1.125rem;
            margin-bottom: 0.25rem;
        }
        .solution-item p {
            margin: 0;
            color: var(--color-text-medium);
        }

        /* --- Resources Section --- */
        .resources { padding: 6rem 0; background: #fff; }
        .resources .section-header { text-align: center; max-width: 52rem; margin: 0 auto 3rem; }
        .resources .section-header .subtitle {
            font-size: 0.875rem;
            font-weight: 700;
            color: var(--color-accent);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 0.5rem;
        }
        .resources .section-header p { margin-top: 1rem; color: var(--color-text-medium); }
        .resources-grid { display: grid; grid-template-columns: 1fr; gap: 2rem; }
        .resource-highlight {
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.08), rgba(15, 23, 42, 0.08));
            border: 1px solid rgba(37, 99, 235, 0.15);
            border-radius: 1.25rem;
            padding: 2rem;
        }
        .resource-highlight h3 { font-size: 1.5rem; }
        .resource-form { margin-top: 1.5rem; display: grid; gap: 1rem; }
        .resource-form .form-row { display: grid; gap: 1rem; }
        .resource-form input, .resource-form select {
            width: 100%;
            padding: 0.85rem 1rem;
            border-radius: 0.75rem;
            border: 1px solid rgba(15, 23, 42, 0.1);
            font-size: 1rem;
            font-family: inherit;
            background: white;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }
        .resource-form select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%234b5563' d='M2 4l4 4 4-4'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            padding-right: 2.5rem;
            cursor: pointer;
        }
        .resource-form button { margin-top: 0.5rem; width: 100%; border: 0; }
        .resource-form input:focus-visible, .resource-form select:focus-visible {
            outline: none;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.25);
            border-color: rgba(37, 99, 235, 0.6);
        }
        .resource-preview {
            margin-top: 1.5rem;
            border: 1px dashed rgba(37, 99, 235, 0.4);
            border-radius: 1rem;
            padding: 1.5rem;
            background: white;
        }
        .resource-preview h4 { color: var(--color-primary); margin-bottom: 0.6rem; }
        .resource-preview p { color: var(--color-text-medium); }
        .resource-preview .btn-secondary { margin-top: 1rem; width: 100%; background: #eff6ff; border-color: transparent; }
        .resource-preview small { display: inline-block; margin-top: 0.75rem; color: var(--color-text-light); }
        .resource-checkbox {
            display: grid;
            grid-template-columns: 1.15rem 1fr;
            column-gap: 0.6rem;
            align-items: center;
            font-size: 0.95rem;
            color: var(--color-text-medium);
        }
        .resource-checkbox input { margin-top: 0; width: 1.15rem; height: 1.15rem; accent-color: var(--color-primary); }
        .resource-checkbox span { line-height: 1.4; }
        .blog-showcase {
            background: #ffffff;
            color: var(--color-text-dark);
            border-radius: 1.25rem;
            padding: 2rem;
            border: 1px solid rgba(226, 232, 240, 0.6);
            box-shadow: 0 20px 35px -15px rgba(15, 23, 42, 0.18);
        }
        .blog-showcase h3 { color: var(--color-text-dark); }
        .blog-cards { margin-top: 1.5rem; display: grid; gap: 1rem; }
        .blog-card {
            background: #ffffff;
            border-radius: 1rem;
            padding: 1.25rem 1.5rem;
            border: 1px solid rgba(226, 232, 240, 0.8);
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            transition: box-shadow 0.2s ease, transform 0.2s ease;
        }
        .blog-card:hover { box-shadow: 0 12px 24px -12px rgba(15, 23, 42, 0.16); transform: translateY(-1px); }
        .blog-card h4 { color: #111827; font-size: 1.1rem; }
        .blog-card h4 a { color: inherit; text-decoration: none; transition: color 0.2s ease; }
        .blog-card h4 a:hover { color: var(--color-primary); }
        .blog-tag { font-size: 0.7rem; letter-spacing: 0.08em; text-transform: uppercase; color: var(--color-accent); }

        /* --- CTA Section --- */
        .cta { background-color: white; padding: 6rem 0; }
        .cta-container {
            background-color: var(--color-primary);
            border-radius: 1rem;
            padding: 3rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .cta-pattern { position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0.15; }
        .cta-content { position: relative; }
        .cta-content h2 { color: white; font-size: 1.875rem; }
        .cta-content p { color: #dbeafe; max-width: 42rem; margin: 1rem auto 0; }
        .cta-content .btn { margin-top: 2rem; background-color: white; color: var(--color-primary); }
        .cta-content .btn:hover { background-color: #f3f4f6; }

        /* --- Footer Section --- */
        .footer { background-color: #f9fafb; padding: 4rem 0 2rem; }
        .footer-grid { display: grid; grid-template-columns: 1fr; gap: 2rem; align-items: end; }
        .footer-about .logo { margin-bottom: 1rem; }
        .footer-about p { color: var(--color-text-light); }
        .footer-links-row { display: flex; gap: 2rem; flex-wrap: wrap; }
        .footer-links-row a { color: var(--color-text-light); padding: 0.25rem 0; }
        .footer-links-row a:hover { color: #111827; }
        .footer-bottom { margin-top: 3rem; border-top: 1px solid #e5e7eb; padding-top: 2rem; text-align: center; }
        .footer-bottom p { color: #9ca3af; }

        /* --- About Page Specific --- */
        .about-section { padding: 5rem 0; background: #ffffff; }
        .about-section.alt-bg { background: var(--color-light-bg); }
        .section-header { text-align: center; margin-bottom: 3rem; }
        .section-header .subtitle {
            font-size: 0.875rem;
            font-weight: 700;
            color: var(--color-accent);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 0.5rem;
        }
        .section-header h2 { margin-bottom: 1rem; }
        .section-header p { max-width: 42rem; margin: 0 auto; font-size: 1.125rem; }
        .story-content { max-width: 48rem; margin: 0 auto; }
        .story-content p { margin-bottom: 1.5rem; font-size: 1.125rem; line-height: 1.8; }
        .story-content p:last-child { margin-bottom: 0; }
        .values-grid { display: grid; grid-template-columns: 1fr; gap: 1.5rem; }
        .value-card {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: var(--shadow-sm);
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }
        .value-card:hover { box-shadow: var(--shadow-md); transform: translateY(-2px); }
        .value-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 3.5rem;
            height: 3.5rem;
            border-radius: 0.75rem;
            margin-bottom: 1.25rem;
        }
        .value-icon-1 { background-color: #3b82f6; }
        .value-icon-2 { background-color: #10b981; }
        .value-icon-3 { background-color: #8b5cf6; }
        .value-icon-4 { background-color: #f59e0b; }
        .value-card h3 { margin-bottom: 0.5rem; font-size: 1.25rem; }
        .approach-grid { display: grid; grid-template-columns: 1fr; gap: 2rem; align-items: center; }
        .approach-content h3 { font-size: 1.5rem; margin-bottom: 1rem; }
        .approach-content p { margin-bottom: 1.5rem; font-size: 1.1rem; line-height: 1.75; }
        .approach-list { list-style: none; display: flex; flex-direction: column; gap: 1rem; }
        .approach-list li { display: flex; align-items: flex-start; gap: 0.75rem; }
        .approach-list svg { flex-shrink: 0; width: 1.25rem; height: 1.25rem; color: var(--color-primary); margin-top: 0.2rem; }
        .approach-list span { color: var(--color-text-dark); font-weight: 500; }
        .approach-visual {
            background: linear-gradient(135deg, #dbeafe, #ede9fe);
            border-radius: 1.25rem;
            padding: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .approach-visual svg { width: 200px; height: auto; color: var(--color-primary); }

        /* --- Legal Pages --- */
        .legal-hero { padding: 4rem 0 2rem; background: #ffffff; border-bottom: 1px solid #e5e7eb; }
        .legal-hero h1 { margin-bottom: 0.5rem; }
        .legal-meta { color: var(--color-text-light); font-size: 0.95rem; }
        .legal-content { display: grid; grid-template-columns: 1fr; gap: 2rem; padding: 3rem 0 5rem; background: #ffffff; }
        .legal-nav { display: none; padding-left: 1.5rem; }
        .legal-nav-inner { position: sticky; top: 5rem; }
        .legal-nav h4 {
            font-size: 0.875rem;
            font-weight: 700;
            color: var(--color-text-dark);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 1rem;
        }
        .legal-nav ul { list-style: none; display: flex; flex-direction: column; gap: 0.5rem; }
        .legal-nav a {
            display: block;
            padding: 0.5rem 0;
            font-size: 0.95rem;
            color: var(--color-text-medium);
            border-left: 2px solid transparent;
            padding-left: 1rem;
            transition: all 0.2s ease;
        }
        .legal-nav a:hover { color: var(--color-primary); border-left-color: var(--color-primary); }
        .legal-body { max-width: 48rem; }
        .legal-body p { line-height: 1.8; margin-bottom: 1rem; }
        .legal-body h2 { font-size: 1.5rem; line-height: 1.2; margin-top: 2.5rem; margin-bottom: 1rem; }
        .legal-body h3 { font-size: 1.125rem; line-height: 1.3; margin-top: 1.5rem; margin-bottom: 0.75rem; }
        .legal-body ul, .legal-body ol { margin-bottom: 1rem; padding-left: 1.5rem; color: var(--color-text-medium); }
        .legal-body li { margin-bottom: 0.5rem; line-height: 1.7; }
        .legal-body a { color: var(--color-primary); text-decoration: underline; }
        .legal-body a:hover { color: var(--color-primary-hover); }
        .legal-section { padding-top: 1rem; border-top: 1px solid #f3f4f6; }
        .legal-section:first-child { border-top: none; padding-top: 0; }
        .highlight-box {
            background: linear-gradient(135deg, #ecfdf5 0%, #f0fdf4 100%);
            border: 1px solid #86efac;
            border-radius: 0.75rem;
            padding: 1.5rem;
            margin: 1.5rem 0;
        }
        .highlight-box h3 { color: #166534; margin-top: 0; margin-bottom: 0.75rem; font-size: 1.1rem; }
        .highlight-box p { color: #166534; margin-bottom: 0; }
        .highlight-box ul { color: #166534; margin-bottom: 0; }

        /* --- Flash Messages --- */
        .flash-message {
            padding: 1rem 1.5rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }
        .flash-message.success { background: #ecfdf5; border: 1px solid #86efac; color: #166534; }
        .flash-message.error { background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; }

        /* --- Form Validation Errors --- */
        .input-error { border-color: #f87171 !important; }
        .error-message { color: #dc2626; font-size: 0.875rem; margin-top: 0.25rem; }

        /* --- Media Queries --- */
        @media (min-width: 640px) {
            h1 { font-size: 2.75rem; }
            h2 { font-size: 2.25rem; }
            .cta-content h2 { font-size: 2rem; }
            .hero-actions { flex-direction: row; }
            .hero-actions .btn { width: auto; }
            .feature-grid { grid-template-columns: repeat(2, 1fr); }
            .values-grid { grid-template-columns: repeat(2, 1fr); }
            .resource-form .form-row { grid-template-columns: 1fr 1fr; }
            .solutions-grid { grid-template-columns: repeat(3, 1fr); }
        }

        @media (min-width: 768px) {
            :root { --container-padding: 1.5rem; }
            .nav-links { display: flex; align-items: baseline; gap: 0.5rem; }
            .header-actions { display: flex; align-items: center; gap: 0.5rem; }
            .mobile-menu-button { display: none; }
            .hero-grid { grid-template-columns: 1fr 1fr; }
            .hero-content { text-align: left; }
            .hero-content h1 { margin-left: 0; margin-right: 0; }
            .hero-content p { margin-left: 0; margin-right: 0; }
            .hero-actions { justify-content: flex-start; }
            .storyline-grid { grid-template-columns: 1fr 1fr; }
            .storyline-insights {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
                align-items: start;
            }
            .insights-chart { margin-bottom: 0; }
            .feature-slide {
                grid-template-columns: 1fr 2fr;
                align-items: start;
            }
            .feature-slider { min-height: 350px; }
            .resources-grid { grid-template-columns: 1fr 1fr; }
            .footer-grid { grid-template-columns: 1fr auto; gap: 3rem; }
            .approach-grid { grid-template-columns: 1fr 1fr; gap: 3rem; }
            .legal-content { grid-template-columns: 220px 1fr; gap: 3rem; }
            .legal-nav { display: block; }
        }

        @media (min-width: 1024px) {
            :root { --container-padding: 2rem; }
            h1 { font-size: 3.25rem; }
            h2 { font-size: 2.5rem; }
            .feature-grid { grid-template-columns: repeat(4, 1fr); }
            .legal-content { grid-template-columns: 250px 1fr; gap: 4rem; }
        }

        {{ $styles ?? '' }}
    </style>
</head>
<body>
    <x-header />

    <main>
        {{ $slot }}
    </main>

    <x-footer />

    {{-- Demo Request Modal (global) --}}
    <x-demo-request-modal />

    {{ $scripts ?? '' }}
</body>
</html>
