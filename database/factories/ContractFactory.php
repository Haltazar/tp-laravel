<?php

namespace Database\Factories;

use App\Models\Box;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tenant;
use App\Models\ContractModel;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contract>
 */
class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'box_id' => Box::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'tenant_id' => Tenant::inRandomOrder()->first()->id,
            'contract_model_id' => ContractModel::inRandomOrder()->first()->id,
            'start_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'end_date' => $this->faker->dateTimeBetween('+1 month', '+1 year'),
            'monthly_rent' => $this->faker->randomFloat(2, 100, 1000),
        ];
    }
}
