<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corral extends Model
{
    protected $table = "corrales";
    protected $fillable = ['numero','cantidad'];
    public function Animales()
    {
        return $this->$this->hasMany('App\Animal');
    }
}
