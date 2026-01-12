<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DemoRequest>
 */
class DemoRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'organization' => fake()->optional()->company(),
            'questions' => fake()->optional()->paragraph(),
            'email_sent_at' => null,
        ];
    }

    public function emailSent(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_sent_at' => now(),
        ]);
    }
}
