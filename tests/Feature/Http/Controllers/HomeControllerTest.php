<?php

use function Pest\Laravel\get;

test('home page renders successfully', function () {
    get(route('home'))
        ->assertOk()
        ->assertSee('CEIQ')
        ->assertSee('community empowerment');
});

test('home page contains hero section', function () {
    get(route('home'))
        ->assertOk()
        ->assertSee('The future-ready');
});

test('home page contains features section', function () {
    get(route('home'))
        ->assertOk()
        ->assertSee('Action-Level Intelligence');
});

test('home page contains resource request form', function () {
    get(route('home'))
        ->assertOk()
        ->assertSee('CEIQ Impact Brief')
        ->assertSee('name="email"', escape: false);
});
