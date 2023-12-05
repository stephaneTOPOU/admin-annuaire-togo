<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaPub extends Model
{
    use HasFactory;
    public $fillable = [
        'pubs_id',
        'imageSpot', 
        'videoSpot',
        'youtube',
    ];
    public function Pub()
    {
        return $this->hasOne(Pub::class);
    }
}
