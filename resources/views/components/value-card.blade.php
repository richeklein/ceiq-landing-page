{{--
Value card for the about page values grid.
Displays icon, title, and description.
--}}
@props(['title', 'iconClass' => 'value-icon-1'])

<div class="value-card">
    <div class="value-icon {{ $iconClass }}">
        {{ $icon }}
    </div>
    <h3>{{ $title }}</h3>
    <p>{{ $slot }}</p>
</div>
