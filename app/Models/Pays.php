<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    use HasFactory;

    public $fillable = [
        'iso', 'libelle', 'slug_pays'
    ];

    use Sluggable;

    public function Sluggable():array
    {
        return[
            'slug_pays' =>
            [
                'source' => 'iso'
            ]
        ];
    }

    public function ville()
    {
        return $this->hasMany(Ville::class);
    }
}
