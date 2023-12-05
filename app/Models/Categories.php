<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Categories extends Model
{
    use HasFactory;

    public $fillable = [
        'libelle', 'pays_id', 'slug_categorie'
    ];

    use Sluggable;

    public function Sluggable():array
    {
        return[
            'slug_categorie' =>
            [
                'source' => 'libelle'
            ]
        ];
    }

    public function sousCategorie()
    {
        return $this->hasMany(SousCategories::class);
    }
}
