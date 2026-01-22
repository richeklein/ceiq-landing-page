{{--
Site header with navigation and mobile menu.
Includes sticky positioning and backdrop blur.
--}}
<header class="header" x-data="{ mobileMenuOpen: false }">
    <div class="header-container container">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="CEIQ Logo" />
        </a>
        <nav class="nav-links">
            <a href="{{ route('home') }}#platform">Platform</a>
            <a href="{{ route('home') }}#difference">CEIQ Difference</a>
            <a href="{{ route('home') }}#values">Values</a>
            <a href="{{ route('home') }}#weekly-resources">Newsletter</a>
            <a href="{{ route('about-us') }}">About Us</a>
        </nav>
        <div class="header-actions">
            {{-- <a href="#" class="btn btn-tertiary btn-compact">Log in</a> --}}
            <button type="button" class="btn btn-primary btn-compact" @click="$dispatch('open-demo-modal')">Request a
                Demo</button>
        </div>
        <button
                class="mobile-menu-button"
                aria-label="Toggle menu"
                :aria-expanded="mobileMenuOpen"
                @click="mobileMenuOpen = !mobileMenuOpen">
            <img src="{{ asset('images/menu.svg') }}" alt="Menu" />
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div
         id="mobile-menu"
         :class="{ 'is-open': mobileMenuOpen }"
         @keydown.escape.window="mobileMenuOpen = false">
        <nav class="nav-links-mobile">
            <a href="{{ route('home') }}#platform" @click="mobileMenuOpen = false">Platform</a>
            <a href="{{ route('home') }}#difference" @click="mobileMenuOpen = false">CEIQ Difference</a>
            <a href="{{ route('home') }}#values" @click="mobileMenuOpen = false">Values</a>
            <a href="{{ route('home') }}#weekly-resources" @click="mobileMenuOpen = false">Newsletter</a>
            <a href="{{ route('about-us') }}" @click="mobileMenuOpen = false">About Us</a>
        </nav>
        <div class="header-actions-mobile">
            {{-- <a href="#" class="btn btn-tertiary btn-compact">Log in</a> --}}
            <button type="button" class="btn btn-secondary btn-compact"
                    @click="$dispatch('open-demo-modal'); mobileMenuOpen = false">Request a Demo</button>
        </div>
    </div>
</header>
