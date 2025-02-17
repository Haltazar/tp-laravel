<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $user = auth()->user();

        $contracts = Contract::where('owner_id', $user->id)->pluck('id');

        $invoices = Invoice::whereIn('contract_id', $contracts)->get();

        return view('invoice.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        return view('invoice.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }

    public function generateInvoice(Request $request)
    {
        $request->validate([
            'contract_id' => 'required|exists:contracts,id',
        ]);

        $contract = Contract::with('tenant', 'box')->findOrFail($request->contract_id);

        $box = $contract->box;
        $tenant = $contract->tenant;

        $startDate = Carbon::parse($contract->start_date);
        $endDate = Carbon::parse($contract->end_date);

        $pricePerMonth = $box->monthly_price;
        $pricePerWeek = $box->weekly_price;
        $pricePerDay = $box->daily_price;

        $totalAmount = 0;

        $fullMonths = $startDate->diffInMonths($endDate);
        $totalAmount += $fullMonths * $pricePerMonth;

        $startDate->addMonths($fullMonths);

        $fullWeeks = $startDate->diffInWeeks($endDate);
        $totalAmount += $fullWeeks * $pricePerWeek;

        $startDate->addWeeks($fullWeeks);

        $remainingDays = $startDate->diffInDays($endDate);
        $totalAmount += $remainingDays * $pricePerDay;

        $startFormatted = $contract->start_date ? Carbon::parse($contract->start_date)->translatedFormat('l j F Y') : '';
        $endFormatted = $contract->end_date ? Carbon::parse($contract->end_date)->translatedFormat('l j F Y') : '';

        $formattedAmount = number_format($totalAmount, 2, ',', ' ');

        $invoiceContent = "Facture pour : {$tenant->firstname} {$tenant->lastname}\n" .
        "Adresse : {$tenant->address}, {$tenant->city}, {$tenant->postal_code}\n" .
        "Box loué : {$box->name} ({$box->address})\n" .
        "Période de location : {$startFormatted} au {$endFormatted}\n" .
        "Montant total : {$formattedAmount}€\n" .
        "Statut : En attente de paiement";

        $invoice = Invoice::create([
            'contract_id' => $contract->id,
            'invoice_date' => Carbon::now(),
            'renting_start_date' => $contract->start_date,
            'renting_end_date' => $contract->end_date,
            'amount' => $totalAmount,
            'status' => 'pending',
            'content' => $invoiceContent,
        ]);

        return redirect()->route('invoice.show', $invoice)->with('success', 'Facture générée avec succès.');
    }

}
