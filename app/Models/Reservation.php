<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        "start_date",
        "end_date",
        "price",
        "user_id", // Ajoute 'user_id' aux champs remplissables
        "box_id" // Ajoute 'box_id' aux champs remplissables
    ];

    // Relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec le modèle Box
    public function box()
    {
        return $this->belongsTo(Box::class);
    }
}