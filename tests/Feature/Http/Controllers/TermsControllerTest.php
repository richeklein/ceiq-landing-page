<?php

use function Pest\Laravel\get;

test('terms page renders successfully', function () {
    get(route('terms'))
        ->assertOk()
        ->assertSee('Terms of Use');
});

test('terms page contains legal sections', function () {
    get(route('terms'))
        ->assertOk()
        ->assertSee('Acceptance of Terms')
        ->assertSee('Limitation of Liability');
});
