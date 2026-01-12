{{--
Feature card for the features grid.
Displays icon, title, and description.
--}}
@props(['title', 'iconColor' => '#3b82f6'])

<div class="feature-card">
    <div class="feature-icon" style="background-color: {{ $iconColor }};">
        {{ $icon }}
    </div>
    <h3>{{ $title }}</h3>
    <p>{{ $slot }}</p>
</div>
