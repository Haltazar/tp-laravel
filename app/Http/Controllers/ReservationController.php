<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Affiche toutes les réservations du propriétaire connecté.
     */
    public function index()
    {
        $ownerId = auth()->id();
        $reservations = Reservation::where('owner_id', $ownerId)->with(['user', 'box'])->get();

        return view('reservation.index', compact('reservations'));
    }

    /**
     * Affiche une réservation spécifique du propriétaire connecté.
     */
    public function show(Reservation $reservation)
    {
        $reservation->load(['user', 'box']);
        return view('reservation.show', compact('reservation'));
    }

    /**
     * Affiche le formulaire de modification d'une réservation.
     */
    public function edit($id)
    {
        $ownerId = auth()->id();
        $reservation = Reservation::where('id', $id)
            ->where('owner_id', $ownerId)
            ->firstOrFail();

        return view('reservation.edit', compact('reservation'));
    }

    /**
     * Met à jour une réservation existante.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
        ]);

        $ownerId = auth()->id();
        $reservation = Reservation::where('id', $id)
            ->where('owner_id', $ownerId)
            ->firstOrFail();

        $reservation->update([
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
        ]);

        return redirect()->route('reservation.show', $reservation)->with('success', 'Réservation mise à jour avec succès.');
    }

    /**
     * Supprime une réservation appartenant au propriétaire connecté.
     */
    public function destroy($id)
    {
        $ownerId = auth()->id();
        $reservation = Reservation::where('id', $id)
            ->where('owner_id', $ownerId)
            ->firstOrFail();

        $reservation->delete();

        return redirect()->route('reservation.index')->with('success', 'Réservation supprimée avec succès.');
    }
}
