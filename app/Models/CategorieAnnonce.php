<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieAnnonce extends Model
{
    use HasFactory;

    use Sluggable;
    public function Sluggable():array
    {
        return[
            'slug_cat_an' =>
            [
                'source' => 'libelle'
            ]
        ];
    }

    public $fillable = [
        'libelle', 'slug_cat_an'
    ];

    public function Annonce()
    {
        return $this->hasMany(Annonce::class);
    }
}
