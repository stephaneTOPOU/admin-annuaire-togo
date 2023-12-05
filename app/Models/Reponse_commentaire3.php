<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse_commentaire3 extends Model
{
    use HasFactory;

    public function commentaire()
    {
        return $this->belongsTo(commentaire_blog::class);
    }

    public $fillable = [
        'commentaire_id', 'commentaire','nom'
    ];
}
