<?php

use function Pest\Laravel\get;

test('about page renders successfully', function () {
    get(route('about'))
        ->assertOk()
        ->assertSee('Why We Built CEIQ');
});

test('about page contains story section', function () {
    get(route('about'))
        ->assertOk()
        ->assertSee('Our Story');
});

test('about page contains values section', function () {
    get(route('about'))
        ->assertOk()
        ->assertSee('Our Values');
});
