<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'box_id',
        'tenant_id',
        'user_id',
        'contract_model_id',
        'start_date',
        'end_date',
        'monthly_rent',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function contrat_model()
    {
        return $this->belongsTo(ContractModel::class);
    }

    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    // Relation avec les paiements (un contrat a plusieurs paiements)
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    // Relation avec les factures (un contrat a plusieurs factures)
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
