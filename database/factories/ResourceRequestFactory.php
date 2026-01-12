<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Factory for ResourceRequest model.
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ResourceRequest>
 */
class ResourceRequestFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'role' => fake()->randomElement([
                'Superintendent',
                'Principal',
                'Family & Community Engagement Lead',
                'Grant / Fund Development',
                'Other District Leader',
            ]),
            'organization' => fake()->optional()->company(),
            'wants_preview' => fake()->boolean(70),
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
