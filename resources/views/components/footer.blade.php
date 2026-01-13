{{--
Site footer with links and copyright.
Consistent across all pages.
--}}
<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-about">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="CEIQ Logo" />
                </a>
                <p>The data-driven platform for comprehensive community empowerment.</p>
            </div>
            <div class="footer-links-container">
                <div class="footer-links-grid">
                    <div class="footer-links-col">
                        <h3>Platform</h3>
                        <ul>
                            <li><a href="{{ route('home') }}#platform">Features</a></li>
                            <li><a href="{{ route('home') }}#solutions">Solutions</a></li>
                            <li><a href="{{ route('home') }}#values">Values</a></li>
                        </ul>
                    </div>
                    <div class="footer-links-col">
                        <h3>Connect</h3>
                        <ul>
                            <li><a href="{{ route('home') }}#contact">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="footer-links-col">
                        <h3>Legal</h3>
                        <ul>
                            <li><a href="{{ route('terms') }}">Terms</a></li>
                            <li><a href="{{ route('privacy') }}">Privacy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} CEIQ, Inc. All rights reserved.</p>
        </div>
    </div>
</footer>
