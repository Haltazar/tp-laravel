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
        $request->validate([
            'name'          => 'required|string|max:255',
            'location'      => 'required|string|max:255',
            'size'          => 'required|numeric|min:1',
            'description'   => 'required|string',
            'daily_price'   => 'required|numeric|min:0',
            'weekly_price'  => 'required|numeric|min:0',
            'monthly_price' => 'required|numeric|min:0',
            'ref'           => 'required|string|max:50|unique:boxes,ref',
        ]);

        Box::create([
            'user_id'       => auth()->user()->id,
            'name'          => $request->name,
            'location'      => $request->location,
            'size'          => $request->size,
            'description'   => $request->description,
            'daily_price'   => $request->daily_price,
            'weekly_price'  => $request->weekly_price,
            'monthly_price' => $request->monthly_price,
            'ref'           => $request->ref,
        ]);

        return redirect()->route('box.index')->with('success', 'Box created successfully.');
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
