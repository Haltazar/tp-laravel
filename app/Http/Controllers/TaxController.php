<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Invoice;
use App\Models\Taxe;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $currentYear = now()->year;

        $contractIds = Contract::where('owner_id', $user->id)->pluck('id');

        $invoices = Invoice::whereIn('contract_id', $contractIds)
            ->whereYear('renting_start_date', $currentYear)
            ->whereYear('renting_end_date', $currentYear)
            ->get();

        $totalRevenue = $invoices->sum('amount');

        $totalTaxes = $this->calculateTaxes($totalRevenue);

        return view('tax.index', compact('invoices', 'totalRevenue', 'totalTaxes', 'currentYear'));
    }

    private function calculateTaxes($revenue)
    {
        $tax = 0;

        $brackets = [
            [0, 11294, 0],
            [11295, 28797, 0.11],
            [28798, 32000, 0.30],
        ];

        foreach ($brackets as [$min, $max, $rate]) {
            if ($revenue > $min) {
                $taxable = min($revenue, $max) - $min;
                $tax += $taxable * $rate;
            }
        }

        return round($tax, 2);
    }
}
