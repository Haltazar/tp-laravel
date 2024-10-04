<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1,10),
            'box_id' => fake()->numberBetween(1,10),
            'start_date' => fake()->dateTimeBetween('+1 year', '+5 year'),
            'end_date' => fake()->dateTimeBetween('+1 year', '+5 year'),
            'price' => fake()->randomFloat(10,15),
        ];
    }
}