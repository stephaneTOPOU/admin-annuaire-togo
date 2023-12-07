<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Offre extends Model
{
    use HasFactory;
    use Sluggable;

    public function Sluggable():array
    {
        return [

            'slug_offres'=>[
                'source'=> 'titre'
            ]
        ];
    }

    protected $fillable = [
        'entreprise',
        'site',
        'facebook',
        'twitter',
        'linkedin',
        'titre',
        'slug_offres',
        'description',
        'mission',
        'profil',
        'dossier',
        'lien',
        'lieu',
        'libelle',
        'categorie',
        'date_lim',
        'valide',
        'description_courte'
    ];

    public function Categorie()
    {
        return $this->hasOne(CategorieOffres::class);
    }
}
