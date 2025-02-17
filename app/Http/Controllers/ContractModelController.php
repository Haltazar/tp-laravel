<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContractModel;

class ContractModelController extends Controller
{

    /**
     * Affiche la liste des modèles de contrat de l'utilisateur connecté.
     */
    public function index()
    {
        $models = ContractModel::where('owner_id', auth()->user()->id)->get();
        return view('contract-model.index', compact('models'));
    }

    /**
     * Affiche le formulaire de création d'un modèle.
     */
    public function create()
    {
        return view('contract-model.create');
    }

    /**
     * Stocke un nouveau modèle de contrat.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        ContractModel::create([
            'owner_id' => auth()->user()->id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('contract-model.index')->with('success', 'Modèle créé avec succès.');
    }

    /**
     * Affiche le formulaire d'édition d'un modèle.
     */
    public function edit(ContractModel $contractModel)
    {
        return view('contract-model.edit', compact('contractModel'));
    }

    /**
     * Met à jour un modèle existant.
     */
    public function update(Request $request, ContractModel $contractModel)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $contractModel->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('contract-model.index')->with('success', 'Modèle mis à jour avec succès.');
    }

    /**
     * Supprime un modèle.
     */
    public function destroy(ContractModel $contractModel)
    {
        $contractModel->delete();

        return redirect()->route('contract-model.index')->with('success', 'Modèle supprimé avec succès.');
    }

    /**
     * Affiche le modèle.
     */
    public function show(ContractModel $contractModel)
    {
        return view('contract-model.show', compact('contractModel'));
    }
}
