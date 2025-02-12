<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Box;
use App\Models\Reservation;

class ReservationSeeder extends Seeder
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

        $reservationsCreated = 0;
        $attempts = 0;
        $maxAttempts = 50; // Pour éviter une boucle infinie

        while ($reservationsCreated < 10 && $attempts < $maxAttempts) {
            $attempts++;

            $owner = $owners->random();
            $user = $users->random();
            $box = $owner->boxes()->inRandomOrder()->first(); // Sélectionne un box du propriétaire

            if (!$box) {
                continue; // Si pas de box, on passe au suivant
            }

            $start_at = Carbon::now()->addDays(rand(1, 30));
            $end_at = (clone $start_at)->addDays(rand(1, 30)); // Durée aléatoire

            // Vérifie si une réservation existe déjà pour cette période
            $existingReservation = Reservation::where('box_id', $box->id)
                ->where(function ($query) use ($start_at, $end_at) {
                    $query->whereBetween('start_at', [$start_at, $end_at])
                        ->orWhereBetween('end_at', [$start_at, $end_at])
                        ->orWhere(function ($query) use ($start_at, $end_at) {
                            $query->where('start_at', '<=', $start_at)
                                ->where('end_at', '>=', $end_at);
                        });
                })
                ->exists();

            if ($existingReservation) {
                continue; // Si une réservation existe déjà pour cette période, on passe au suivant
            }

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

            $reservationsCreated++;
        }

        $this->command->info("$reservationsCreated réservations ont été créées avec un prix calculé.");
    }

    /**
     * Calcule le prix total en fonction de la durée et des tarifs du box.
     */
    private function calculatePrice(int $days, Box $box): float
    {
        $price = 0;

        if ($days >= 30 && $box->monthly_price) {
            // Si la durée atteint un mois, applique le tarif mensuel autant que possible
            $months = intdiv($days, 30);
            $remainingDays = $days % 30;
            $price += $months * $box->monthly_price;
            $days = $remainingDays;
        }

        if ($days >= 7 && $box->weekly_price) {
            // Si la durée atteint une semaine, applique le tarif hebdomadaire autant que possible
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
