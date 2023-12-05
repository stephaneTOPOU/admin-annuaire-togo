<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    use Sluggable;

    public function Sluggable():array
    {
        return[
            'slug_blog' =>
            [
                'source' => 'titre'
            ]
        ];
    }

    public $fillable = ['titre', 'description1', 'image1', 'description2', 'image2', 'description3', 'image3', 'description4', 'video1', 'description5', 'video2', 'descriptionCourte', 'slug_blog'];
}
