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

test('home page contains CTA section', function () {
    get(route('home'))
        ->assertOk()
        ->assertSee('Ready to Transform Your School or District?')
        ->assertSee('Schedule Your Demo');
});
