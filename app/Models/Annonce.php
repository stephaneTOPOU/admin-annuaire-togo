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
        'titre', 'text1', 'image1', 'text2', 'image2', 'text3', 'image3', 'text4', 'image4', 'text5', 'image5', 'text6', 'image6','slug_annonce'
    ];
}
