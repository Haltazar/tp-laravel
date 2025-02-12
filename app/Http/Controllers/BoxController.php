<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        // Vérifier si l'utilisateur est connecté
        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour voir vos box.');
        }

        // Récupérer les box de l'utilisateur
        $boxes = Box::where('user_id', $user->id)->get();

        return view('box.index', compact('boxes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('box.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données (facultatif mais recommandé)
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'size' => 'required|integer',
            'status' => 'required|string|max:255',
            'ref' => 'required|string|max:255',
            'weekly_price' => 'required|numeric',
            'monthly_price' => 'required|numeric',
            'daily_price' => 'required|numeric',
        ]);

        // Créer une nouvelle box et assigner l'utilisateur connecté
        $box = new Box();
        $box->name = $request->name;
        $box->description = $request->description;
        $box->location = $request->location;
        $box->size = $request->size;
        $box->user_id = auth()->user()->id; // Assigner l'ID de l'utilisateur authentifié
        $box->save();

        return redirect()->route('box.index')->with('success', 'Box créée avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('box.show', [
            'box' => Box::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('box.edit', [
            'box' => Box::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'size' => 'required|integer',
            'status' => 'required|string|max:255',
            'ref' => 'required|string|max:255',
            'weekly_price' => 'required|numeric',
            'monthly_price' => 'required|numeric',
            'daily_price' => 'required|numeric',
        ]);

        // Trouver la box et mettre à jour
        $box = Box::findOrFail($id);
        $box->update($validatedData);

        return redirect()->route('box.show', $box)->with('success', 'Box mis à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $box = Box::findOrFail($id);
        $box->delete(); // Utilisation de delete() au lieu de destroy()

        return redirect()->route('box.userBoxes')->with('success', 'Box supprimée avec succès.');
    }
}
