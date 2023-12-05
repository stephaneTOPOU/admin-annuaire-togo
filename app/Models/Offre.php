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
        'categorieOffres_id',
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
        'date_lim',
        'valide'
    ];

    public function Categorie()
    {
        return $this->hasOne(CategorieOffres::class);
    }
}
