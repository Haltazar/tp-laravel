<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Box>
 */
class BoxFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ref' => fake()->uuid(),
            'location' => fake()->streetAddress(),
            'description' => fake()->paragraph(),
            'user_id' => fake()->numberBetween(1,10),
            'daily_price' => fake()->randomFloat(2, 10, 20),
            'weekly_price' => fake()->randomFloat(2, 60, 80),
            'monthly_price' => fake()->randomFloat(2, 200, 280),
        ];
    }
}
