{{--
Site header with navigation and mobile menu.
Includes sticky positioning and backdrop blur.
--}}
<header class="header" x-data="{ mobileMenuOpen: false }">
    <div class="container header-container">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="CEIQ Logo" />
        </a>
        <nav class="nav-links">
            <a href="{{ route('home') }}#storyline">Story</a>
            <a href="{{ route('home') }}#features">Platform</a>
            <a href="{{ route('home') }}#weekly-resources">Resources</a>
            <a href="/blog">Blog</a>
        </nav>
        <div class="header-actions">
            <a href="#" class="btn btn-tertiary btn-compact">Log in</a>
            <button type="button" class="btn btn-primary btn-compact" @click="$dispatch('open-demo-modal')">Request a Demo</button>
        </div>
        <button
            class="mobile-menu-button"
            aria-label="Toggle menu"
            :aria-expanded="mobileMenuOpen"
            @click="mobileMenuOpen = !mobileMenuOpen"
        >
            <img src="{{ asset('images/menu.svg') }}" alt="Menu" />
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div
        id="mobile-menu"
        :class="{ 'is-open': mobileMenuOpen }"
        @keydown.escape.window="mobileMenuOpen = false"
    >
        <nav class="nav-links-mobile">
            <a href="{{ route('home') }}#storyline" @click="mobileMenuOpen = false">Story</a>
            <a href="{{ route('home') }}#features" @click="mobileMenuOpen = false">Platform</a>
            <a href="{{ route('home') }}#weekly-resources" @click="mobileMenuOpen = false">Resources</a>
            <a href="/blog" @click="mobileMenuOpen = false">Blog</a>
        </nav>
        <div class="header-actions-mobile">
            <a href="#" class="btn btn-tertiary btn-compact">Log in</a>
            <button type="button" class="btn btn-secondary btn-compact" @click="$dispatch('open-demo-modal'); mobileMenuOpen = false">Request a Demo</button>
        </div>
    </div>
</header>
