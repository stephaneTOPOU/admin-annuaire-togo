<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametre extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'adresse',
        'geolocalisation',
        'telephone1',
        'telephone2',
        'lienface',
        'lientwitter',
        'lieninsta',
        'lienyoutube',
        'logo_header',
        'logo_footer',
        'pays_id',
        'lienlinkedin'

    ];
}
