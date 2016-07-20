<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corral extends Model
{
    protected $table = "corrales";
    protected $fillable = ['id','numero','cantidad_alimento','id_galpon'];
    public function animals()
    {
        return $this->hasMany('App\Animal','id_corral');
    }
    public function galpon()
    {
        return $this->belongsTo('App\Galpon','id_galpon');
    }
    public function atributos()
    {
        return $this->belongsToMany('App\Corral','corral_atributo','id_corral','id_atributo');
    }
}
