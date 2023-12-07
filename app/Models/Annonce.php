<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    use Sluggable;

    public function Sluggable():array
    {
        return[
            'slug_annonce' =>
            [
                'source' => 'titre'
            ]
        ];
    }
    
    public $fillable = [
        'titre', 'text1', 'image1', 'text2', 'image2', 'text3', 'image3', 'image4', 'image5', 'image6', 'video','slug_annonce','categorie_id', 'descriptionCourte',
    ];

    public function Categorie()
    {
        return $this->belongsTo(CategorieAnnonce::class);
    }
}
