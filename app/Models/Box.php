<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Box extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'location',
        'size',
        'description',
        'daily_price',
        'status',
        'ref',
        'weekly_price',
        'monthly_price',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
