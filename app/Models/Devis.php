<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    use HasFactory;

    public $fillable = [
        'souscategorie_id', 'type_demande', 'ville', 'email', 'nom', 'prenom', 'telephone', 'demande'
    ];

    public function sousCategorie()
    {
        return $this->belongsTo(SousCategories::class);
    }
}
