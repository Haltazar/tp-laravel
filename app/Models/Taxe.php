<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxe extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'year',
        'total_income',
        'tax_amount',
        'company_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
