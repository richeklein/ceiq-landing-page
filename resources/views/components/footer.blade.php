{{--
Site footer with links and copyright.
Consistent across all pages.
--}}
<footer class="footer" x-data>
    <div class="container">
        <div class="footer-grid">
            <div class="footer-about">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="CEIQ Logo" />
                </a>
                <p>The data-driven platform for comprehensive community empowerment.</p>
            </div>
            <nav class="footer-links-row">
                <a href="#" @click.prevent="$dispatch('open-demo-modal')">Contact Us</a>
                <a href="{{ route('terms') }}">Terms</a>
                <a href="{{ route('privacy') }}">Privacy</a>
            </nav>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} CEIQ, Inc. All rights reserved.</p>
        </div>
    </div>
</footer>
