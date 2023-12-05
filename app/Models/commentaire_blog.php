<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentaire_blog extends Model
{
    use HasFactory;

    public function entreprise()
    {
        return $this->belongsTo(Blog::class);
    }

    public $fillable = [
        'blog_id', 'commentaire','nom'
    ];
}
