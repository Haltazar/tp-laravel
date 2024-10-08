<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contract;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contract_id' => Contract::inRandomOrder()->first()->id,
            'month' => $this->faker->month(),
            'year' => $this->faker->year(),
            'amount' => $this->faker->randomFloat(2, 100, 1000),
            'paid' => $this->faker->boolean(),
            'paid_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
