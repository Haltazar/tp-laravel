<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('box.index', [
            'boxes' => Box::all(),
        ]);
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
        $box = Box::findOrFail($id);
        $box->update($request->validated());
        return redirect()->route('box.show', $box);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        Box::destroy($id);
        return redirect()->route('home');
    }
}
