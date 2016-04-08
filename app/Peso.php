<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peso extends Model
{
    protected $table = "pesos";
    protected $fillable = ['pesaje','fecha','id_animales'];
    public function Animal()
    {
        return $this->belongsTo('App\Animal');
    }
        
}
