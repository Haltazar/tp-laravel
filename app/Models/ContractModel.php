<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    // Fonction pour remplacer les variables dans le contenu
    public function replaceVariables(array $variables)
    {
        $content = $this->content;

        foreach ($variables as $key => $value) {
            // Remplace les variables dans le contenu
            $content = str_replace('{' . $key . '}', $value, $content);
        }

        return $content;
    }
}
