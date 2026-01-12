{{--
Video modal for YouTube embed.
Uses Alpine.js for open/close functionality.
--}}
@props(['videoId' => 'dQw4w9WgXcQ'])

<div
    x-data="{ open: false }"
    x-on:open-video.window="open = true"
    x-on:keydown.escape.window="open = false"
>
    {{-- Trigger button --}}
    <button
        class="btn btn-video"
        @click="$dispatch('open-video')"
        {{ $attributes }}
    >
        <svg style="width: 1.25rem; height: 1.25rem; margin-right: 0.5rem;" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
        </svg>
        {{ $slot }}
    </button>

    {{-- Modal --}}
    <div
        class="video-modal"
        :class="{ 'is-open': open }"
        @click.self="open = false"
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-cloak
    >
        <div class="video-modal-content">
            <button
                class="video-modal-close"
                @click="open = false"
                aria-label="Close video"
            >
                &times;
            </button>
            <template x-if="open">
                <iframe
                    src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1&rel=0"
                    allow="autoplay; encrypted-media"
                    allowfullscreen
                ></iframe>
            </template>
        </div>
    </div>
</div>
