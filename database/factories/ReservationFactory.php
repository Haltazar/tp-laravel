<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Box;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Taxe>
 */
class ReservationFactory extends Factory
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupère les propriétaires ayant des boxes
        $owners = User::where('is_owner', true)->has('boxes')->get();
        // Récupère les utilisateurs normaux
        $users = User::where('is_owner', false)->get();

        if ($owners->isEmpty() || $users->isEmpty()) {
            $this->command->info('Pas assez de données : besoin de propriétaires et d\'utilisateurs non-propriétaires.');
            return;
        }

        // Génère 10 réservations aléatoires
        for ($i = 0; $i < 10; $i++) {
            $owner = $owners->random();
            $user = $users->random();
            $box = $owner->boxes()->inRandomOrder()->first(); // Sélectionne un box du propriétaire

            if (!$box) {
                continue; // Si pas de box, on passe au suivant
            }

            $start_at = Carbon::now()->addDays(rand(1, 30));
            $end_at = (clone $start_at)->addDays(rand(1, 30)); // Durée aléatoire

            // Calcul du prix en fonction de la durée
            $diffInDays = $start_at->diffInDays($end_at);
            $price = $this->calculatePrice($diffInDays, $box);

            Reservation::create([
                'user_id' => $user->id,
                'owner_id' => $owner->id,
                'box_id' => $box->id,
                'start_at' => $start_at,
                'end_at' => $end_at,
                'price' => $price,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('10 réservations ont été créées avec un prix calculé.');
    }

    /**
     * Calcule le prix total en fonction de la durée et des tarifs du box.
     */
    private function calculatePrice(int $days, Box $box): float
    {
        $price = 0;

        if ($days >= 30 && $box->monthly_price) {
            // Si la durée dépasse ou atteint un mois, on applique le tarif mensuel autant que possible
            $months = intdiv($days, 30);
            $remainingDays = $days % 30;
            $price += $months * $box->monthly_price;
            $days = $remainingDays;
        }

        if ($days >= 7 && $box->weekly_price) {
            // Si la durée dépasse ou atteint une semaine, on applique le tarif hebdomadaire autant que possible
            $weeks = intdiv($days, 7);
            $remainingDays = $days % 7;
            $price += $weeks * $box->weekly_price;
            $days = $remainingDays;
        }

        // Les jours restants sont facturés au prix journalier
        if ($days > 0 && $box->daily_price) {
            $price += $days * $box->daily_price;
        }

        return $price;
    }
}
