<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temoignage extends Model
{
    use HasFactory;

    public $fillable = [
        'nom', 'image ', 'message', 'note', 'libelle'
    ];
}
