<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\ContractModel;
use App\Models\User;
use App\Models\Box;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Affiche la liste des contrats de l'utilisateur connecté.
     */
    public function index()
    {
        $contracts = Contract::where('owner_id', auth()->user()->id)->get();
        return view('contract.index', compact('contracts'));
    }

    public function show(Contract $contract)
    {
        $contract->load(['tenant', 'owner', 'box']);
        return view('contract.show', compact('contract'));
    }

    /**
     * Générer un contrat pour un locataire
     */
    public function generate(Request $request)
    {
        $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
        ]);

        $reservation = Reservation::with('user')->findOrFail($request->reservation_id);

        $box = $reservation->box;
        $owner = $reservation->owner;
        $tenant = $reservation->user;

        $contractModel = ContractModel::first();

        if (!$contractModel) {
            return redirect()->back()->with('error', 'Aucun modèle de contrat trouvé.');
        }

        $contractContent = str_replace(
            ['{nom}', '{prenom}', '{adresse}', '{ville}', '{code_postal}', '{email}', '{telephone}', '{nom_proprietaire}', '{prenom_proprietaire}', '{adresse_proprietaire}', '{nom_du_box}', '{adresse_du_box}', '{prix_journalier}', '{prix_hebdomadaire}', '{prix_mensuel}', '{date_de_debut}', '{date_de_fin}', '{date_du_jour}', '{ville_proprietaire}'],
            [$tenant->lastname, $tenant->firstname, $tenant->address, $tenant->city, $tenant->postal_code, $tenant->email, $tenant->phone, $owner->lastname, $owner->firstname, $owner->address, $box->name, $box->address, $box->daily_price, $box->weekly_price, $box->monthly_price, $reservation->start_at, $reservation->end_at, \Carbon\Carbon::now()->format('d-m-Y'), $owner->city],
            $contractModel->content
        );

        $contract = Contract::create([
            'box_id' => $box->id,
            'owner_id' => $owner->id,
            'user_id' => $tenant->id,
            'contract_model_id' => $contractModel->id,
            'start_date' => $reservation->start_at,
            'end_date' => $reservation->end_at,
            'content' => $contractContent,
        ]);

        return redirect()->route('contract.show', $contract)->with('success', 'Contrat généré avec succès.');
    }


    public function create()
    {
        $boxes = Box::where('user_id', auth()->user()->id)->get();
        $contractModels = ContractModel::where('owner_id', auth()->user()->id)->get();

        return view('contract.create', compact('boxes', 'contractModels'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'box_id' => 'required|exists:boxes,id',
            'contract_model_id' => 'required|exists:contract_models,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $box = Box::findOrFail($request->box_id);
        $owner = auth()->user();

        $reservation = Reservation::where('box_id', $box->id)->latest()->first(); 

        if (!$reservation) {
            return redirect()->back()->with('error', 'Aucune réservation active pour ce box.');
        }

        $tenant = $reservation->user;
        $contractModel = ContractModel::findOrFail($request->contract_model_id);

        $contractContent = $contractModel->generateContract($tenant, $owner, $box, $request->start_date, $request->end_date);

        Contract::create([
            'box_id' => $box->id,
            'owner_id' => $owner->id,
            'user_id' => $tenant->id,
            'contract_model_id' => $contractModel->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'content' => $contractContent,
        ]);

        return redirect()->route('contract.index')->with('success', 'Contrat créé avec succès.');
    }

    /** 
     *  Supprimer un contrat
     *
     */
    public function destroy(Request $request, $contract)
    {
        $contract = Contract::findOrFail($contract);
        $contract->delete();
        return redirect()->route('contract.index')->with('success', 'Contrat supprimé avec succès.');
    }
}
