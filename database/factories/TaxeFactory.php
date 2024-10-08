<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Taxe>
 */
class TaxeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'year' => $this->faker->year(),
            'total_income' => $this->faker->randomFloat(2, 1200, 500000),
            'tax_amount' => $this->faker->randomFloat(2, 0, 100000),
            'company_type' => $this->faker->randomElement(['public', 'private']),
        ];
    }
}
