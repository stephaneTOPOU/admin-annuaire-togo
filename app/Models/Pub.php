<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pub extends Model
{
    use HasFactory;

    public $fillable = [
        'entreprise', 
        'titre', 
        'slug_pub',
        'sousTitre',
        'description',
        'detail',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'image6',
        'libelle',
    ];
    public function MediaPub()
    {
        return $this->hasMany(MediaPub::class);
    }
}