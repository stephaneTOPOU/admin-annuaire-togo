<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentaireAnnonce extends Model
{
    use HasFactory;

    public $fillable = [
        'annonce_id', 'pseudo', 'commentaire'
    ];
}
