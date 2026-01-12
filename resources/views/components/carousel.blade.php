{{--
Image carousel with auto-advance and dot navigation.
Uses Alpine.js for interactivity.
--}}
@props(['id', 'images' => [], 'interval' => 5000])

<div
    class="carousel"
    id="{{ $id }}"
    x-data="{
        currentIndex: 0,
        images: {{ Js::from($images) }},
        interval: {{ $interval }},
        timer: null,
        start() {
            this.timer = setInterval(() => this.next(), this.interval);
        },
        stop() {
            clearInterval(this.timer);
        },
        next() {
            this.currentIndex = (this.currentIndex + 1) % this.images.length;
        },
        goTo(index) {
            this.currentIndex = index;
        }
    }"
    x-init="start()"
    @mouseenter="stop()"
    @mouseleave="start()"
    aria-label="Product screenshots"
>
    <div class="carousel-track">
        @foreach($images as $index => $image)
            <div
                class="carousel-slide"
                :class="{ 'is-active': currentIndex === {{ $index }} }"
                id="{{ $id }}-slide-{{ $index + 1 }}"
            >
                <img
                    src="{{ asset($image['src']) }}"
                    alt="{{ $image['alt'] }}"
                    loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                />
            </div>
        @endforeach
    </div>
    <div class="carousel-dots" role="tablist" aria-label="Screenshot navigation">
        @foreach($images as $index => $image)
            <button
                class="dot"
                :class="{ 'is-active': currentIndex === {{ $index }} }"
                @click="goTo({{ $index }})"
                aria-label="Slide {{ $index + 1 }}"
                :aria-selected="currentIndex === {{ $index }}"
            ></button>
        @endforeach
    </div>
</div>
