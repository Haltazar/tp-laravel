<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Affiche la liste des utilisateurs qui ont une réservation avec le propriétaire connecté.
     */
    public function index()
    {
        $ownerId = auth()->id();

        // Récupérer les utilisateurs qui ont une réservation avec le propriétaire connecté
        $users = User::whereHas('reservations', function ($query) use ($ownerId) {
            $query->where('owner_id', $ownerId);
        })->get();

        return view('user.index', compact('users'));
    }


    /**
     * Affiche le formulaire de création d'un utilisateur.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Enregistre un nouvel utilisateur.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:20',
            'street' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:10',
            'is_owner' => 'boolean',
            'iban' => 'nullable|string|max:34',
            'bic' => 'nullable|string|max:11',
            'bank_name' => 'nullable|string|max:255',
            'card_number' => 'nullable|string|max:16',
            'expiration_month' => 'nullable|integer|min:1|max:12',
            'expiration_year' => 'nullable|integer|min:' . date('Y'),
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone' => $request->phone,
            'street' => $request->street,
            'city' => $request->city,
            'country' => $request->country,
            'postal_code' => $request->postal_code,
            'is_owner' => $request->is_owner ?? false,
            'iban' => $request->iban,
            'bic' => $request->bic,
            'bank_name' => $request->bank_name,
            'card_number' => $request->card_number,
            'expiration_month' => $request->expiration_month,
            'expiration_year' => $request->expiration_year,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index')->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Affiche un utilisateur spécifique.
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Affiche le formulaire d'édition d'un utilisateur.
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Met à jour un utilisateur existant.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'street' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:10',
            'is_owner' => 'boolean',
            'iban' => 'nullable|string|max:34',
            'bic' => 'nullable|string|max:11',
            'bank_name' => 'nullable|string|max:255',
            'card_number' => 'nullable|string|max:16',
            'expiration_month' => 'nullable|integer|min:1|max:12',
            'expiration_year' => 'nullable|integer|min:' . date('Y'),
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone' => $request->phone,
            'street' => $request->street,
            'city' => $request->city,
            'country' => $request->country,
            'postal_code' => $request->postal_code,
            'is_owner' => $request->is_owner ?? false,
            'iban' => $request->iban,
            'bic' => $request->bic,
            'bank_name' => $request->bank_name,
            'card_number' => $request->card_number,
            'expiration_month' => $request->expiration_month,
            'expiration_year' => $request->expiration_year,
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('user.show', $user)->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * Supprime un utilisateur.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Utilisateur supprimé avec succès.');
    }

    /**
     * Affiche la liste des réservations d'un utilisateur.
     */

    public function reservation(User $user)
    {
        $ownerId = auth()->id(); // ID du propriétaire connecté

        $reservations = $user->reservations()
            ->whereHas('box', function ($query) use ($ownerId) {
                $query->where('owner_id', $ownerId);
            })
            ->with(['box', 'box.owner'])
            ->get();

        return view('user.reservation', compact('reservations', 'user'));
    }

}
