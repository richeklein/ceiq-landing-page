{{--
Site header with navigation and mobile menu.
Includes sticky positioning and backdrop blur.
--}}
<header class="header"
    x-data="{
        mobileMenuOpen: false,
        activeSection: '{{ request()->routeIs('about-us') ? 'about-us' : '' }}',
        sections: ['platform', 'difference', 'values', 'weekly-resources'],
        init() {
            if (!this.activeSection) {
                this.updateActiveSection();
                window.addEventListener('scroll', () => this.updateActiveSection(), { passive: true });
            }
        },
        updateActiveSection() {
            const scrollPos = window.scrollY + 120;
            let current = '';
            for (const id of this.sections) {
                const section = document.getElementById(id);
                if (section && section.offsetTop <= scrollPos) {
                    current = id;
                }
            }
            this.activeSection = current;
        }
    }">
    <div class="header-container container">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="CEIQ Logo" />
        </a>
        <nav class="nav-links">
            <a href="{{ route('home') }}#platform"
               :class="{ 'is-active': activeSection === 'platform' }">Platform</a>
            <a href="{{ route('home') }}#difference"
               :class="{ 'is-active': activeSection === 'difference' }">CEIQ Difference</a>
            <a href="{{ route('home') }}#values"
               :class="{ 'is-active': activeSection === 'values' }">Values</a>
            <a href="{{ route('home') }}#weekly-resources"
               :class="{ 'is-active': activeSection === 'weekly-resources' }">Newsletter</a>
            <a href="{{ route('about-us') }}"
               :class="{ 'is-active': activeSection === 'about-us' }">About Us</a>
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
            <a href="{{ route('home') }}#platform"
               :class="{ 'is-active': activeSection === 'platform' }"
               @click="mobileMenuOpen = false">Platform</a>
            <a href="{{ route('home') }}#difference"
               :class="{ 'is-active': activeSection === 'difference' }"
               @click="mobileMenuOpen = false">CEIQ Difference</a>
            <a href="{{ route('home') }}#values"
               :class="{ 'is-active': activeSection === 'values' }"
               @click="mobileMenuOpen = false">Values</a>
            <a href="{{ route('home') }}#weekly-resources"
               :class="{ 'is-active': activeSection === 'weekly-resources' }"
               @click="mobileMenuOpen = false">Newsletter</a>
            <a href="{{ route('about-us') }}"
               :class="{ 'is-active': activeSection === 'about-us' }"
               @click="mobileMenuOpen = false">About Us</a>
        </nav>
        <div class="header-actions-mobile">
            {{-- <a href="#" class="btn btn-tertiary btn-compact">Log in</a> --}}
            <button type="button" class="btn btn-secondary btn-compact"
                    @click="$dispatch('open-demo-modal'); mobileMenuOpen = false">Request a Demo</button>
        </div>
    </div>
</header>
