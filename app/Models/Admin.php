<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'prenoms',
        'email',
        'password',
        'fonction',
        'pays_id'

    ];

    public function minispot()
    {
        return $this->hasMany(MiniSpot::class);
    }

    public function popup()
    {
        return $this->hasMany(PopUp::class);
    }

    public function reportage()
    {
        return $this->hasMany(Reportage::class);
    }

    public function slider1()
    {
        return $this->hasMany(Slider1::class);
    }

    public function slider2()
    {
        return $this->hasMany(Slider2::class);
    }

    public function slider3()
    {
        return $this->hasMany(Slider3::class);
    }

    public function sliderlateral()
    {
        return $this->hasMany(SliderLateral::class);
    }

    public function sliderlateralbas()
    {
        return $this->hasMany(SliderLateralBas::class);
    }

    public function sliderrecherche()
    {
        return $this->hasMany(SliderRecherche::class);
    }

    public function sliderrecherchelateral()
    {
        return $this->hasMany(SliderRechercheLateral::class);
    }

    public function sliderrecherchelateralbas()
    {
        return $this->hasMany(SliderRechercheLateralBas::class);
    }

    public function sliderCategorie()
    {
        return $this->hasMany(SliderCategorie::class);
    }

    public function sliderEntreprise()
    {
        return $this->hasMany(SliderEntreprise::class);
    }

}
