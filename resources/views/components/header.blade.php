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
            <a href="#platform" @click.prevent="document.getElementById('platform').scrollIntoView({ behavior: 'smooth' })">Platform</a>
            <a href="#difference" @click.prevent="document.getElementById('solutions').scrollIntoView({ behavior: 'smooth' })">CEIQ Difference</a>
            <a href="#values" @click.prevent="document.getElementById('values').scrollIntoView({ behavior: 'smooth' })">Values</a>
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
            <a href="#platform" @click.prevent="mobileMenuOpen = false; document.getElementById('platform').scrollIntoView({ behavior: 'smooth' })">Platform</a>
            <a href="#solutions" @click.prevent="mobileMenuOpen = false; document.getElementById('solutions').scrollIntoView({ behavior: 'smooth' })">CEIQ Difference</a>
            <a href="#values" @click.prevent="mobileMenuOpen = false; document.getElementById('values').scrollIntoView({ behavior: 'smooth' })">Values</a>
        </nav>
        <div class="header-actions-mobile">
            {{-- <a href="#" class="btn btn-tertiary btn-compact">Log in</a> --}}
            <button type="button" class="btn btn-secondary btn-compact"
                    @click="$dispatch('open-demo-modal'); mobileMenuOpen = false">Request a Demo</button>
        </div>
    </div>
</header>
