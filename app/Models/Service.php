<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function entreprise()
    {
        return $this->belongsTo(Entreprises::class);
    }

    public function serviceImage()
    {
        return $this->hasMany(ServiceImage::class);
    }
}
