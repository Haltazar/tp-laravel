<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contract;
use App\Models\User;
use App\Models\Box;
use Carbon\Carbon;

class ContractModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'title',
        'content',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    /**
     * Génère un contrat en remplaçant les variables par les données du locataire
     */
    public function generateContract(User $tenant, User $owner, Box $box, $start_date, $end_date)
    {
        $variables = [
            'nom' => $tenant->firstname,
            'prenom' => $tenant->lastname,
            'adresse' => $tenant->address,
            'ville' => $tenant->city,
            'code_postal' => $tenant->postal_code,
            'telephone' => $tenant->phone,
            'email' => $tenant->email,
            'nom_proprietaire' => $owner->firstname,
            'prenom_proprietaire' => $owner->lastname,
            'adresse_proprietaire' => $owner->address,
            'nom_du_box' => $box->name,
            'adresse_du_box' => $box->location,
            'prix_journalier' => $box->daily_price,
            'prix_hebdomadaire' => $box->weekly_price,
            'prix_mensuel' => $box->monthly_price,
            'date_du_jour' => Carbon::now()->format('d-m-Y'),
            'ville_proprietaire' => $owner->city,
            'date_de_debut' => $this->start_date,
            'date_de_fin' => $this->end_date,
        ];

        $contract_content = str_replace(
            array_map(fn($k) => '{' . $k . '}', array_keys($variables)),
            array_values($variables),
            $this->content
        );

        return Contract::create([
            'contract_model_id' => $this->id,
            'user_id' => $tenant->id,
            'owner_id' => $owner->id,
            'box_id' => $box->id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'content' => $contract_content,
        ]);
    }
}
