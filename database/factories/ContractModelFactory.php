<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContractModel>
 */
class ContractModelFactory extends Factory
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
            'title' => $this->generateTitle(),
            'content' => $this->generateContent(),
        ];
    }

    /**
     * Génère un contenu de contrat avec des variables.
     *
     * @return string
     */
    protected function generateContent()
    {
        return "Ce contrat est conclu entre {name}, résidant à {address}, et le propriétaire, {owner}. Le montant du loyer est de {rent} euros.";
    }

    /**
     * Génère un titre de contrat avec des variables.
     *
     * @return string
     */
    protected function generateTitle()
    {
        return "Contrat n°" . $this->faker->unique()->numberBetween(1, 100);
    }
}
