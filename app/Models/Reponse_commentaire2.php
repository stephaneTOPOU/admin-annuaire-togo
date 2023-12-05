<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse_commentaire2 extends Model
{
    use HasFactory;

    public function commentaire()
    {
        return $this->belongsTo(commentaireAnnonce::class);
    }

    public $fillable = [
        'commentaire_id', 'commentaire','nom','email'
    ];
}
