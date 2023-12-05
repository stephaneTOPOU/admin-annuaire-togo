<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallerie_image extends Model
{
    use HasFactory;

    public function entreprise()
    {
        return $this->belongsTo(Entreprises::class);
    }
}
