{{--
Call-to-action section with pattern overlay.
Reusable across pages for consistent CTAs.
--}}
@props(['title' => 'Ready to Transform Your School or District?', 'subtitle' => 'Learn how CEIQ bridges the gap between engagement activities and measurable outcomes.', 'buttonText' => 'Schedule Your Demo', 'id' => null])

<section class="cta" x-data @if($id) id="{{ $id }}" @endif>
    <div class="container">
        <div class="cta-container">
            <div class="cta-pattern">
                <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern
                            id="cta-pattern"
                            patternUnits="userSpaceOnUse"
                            width="40"
                            height="40"
                            patternTransform="scale(2) rotate(45)"
                        >
                            <circle cx="10" cy="10" r="1" fill="white"></circle>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#cta-pattern)"></rect>
                </svg>
            </div>
            <div class="cta-content">
                <h2>{{ $title }}</h2>
                <p>{{ $subtitle }}</p>
                <button type="button" class="btn" x-on:click="$dispatch('open-demo-modal')">{{ $buttonText }}</button>
            </div>
        </div>
    </div>
</section>
