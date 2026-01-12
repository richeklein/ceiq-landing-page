<?php

use function Pest\Laravel\get;

test('privacy page renders successfully', function () {
    get(route('privacy'))
        ->assertOk()
        ->assertSee('Privacy Policy');
});

test('privacy page contains key sections', function () {
    get(route('privacy'))
        ->assertOk()
        ->assertSee('Our Commitment to Privacy')
        ->assertSee('Contact Us');
});
