<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    use HasFactory;

    protected $fillable = ['entreprise_id', 'image'];

    public function entreprise()
    {
        return $this->belongsTo(Entreprises::class);
    }
}
