<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousCategories extends Model
{
    use HasFactory;

    public $fillable = [
        'categorie_id ', 'libelle', 'slug_souscategorie'
    ];


    use Sluggable;

    public function Sluggable():array
    {
        return[
            'slug_souscategorie' =>
            [
                'source' => 'libelle'
            ]
        ];
    }

    public function Categories()
    {
        return $this->belongsTo(Categories::class);
    }

    public function entreprise()
    {
        return $this->hasMany(Entreprise::class);
    }
}
