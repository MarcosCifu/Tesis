<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corral extends Model
{
    protected $table = "corrales";
    protected $fillable = ['id','numero','cantidad_alimento','id_galpon','pesaje_promedio','tamaño'];
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
        return $this->belongsToMany('App\Atributo','corral_atributo','id_corral','id_atributo')->withPivot('id_corral','id_atributo');
    }
    public function estadisticascorrales()
    {
        return $this->hasMany('App\EstadisticaCorral','id_corral');
    }
    public function estadoanimales()
    {
        return $this->hasMany('App\Animal','id_corral')->where('estado','Enfermo')->count();
    }
    public function estadoanimalesmuertos()
    {
        return $this->hasMany('App\Animal','id_corral')->where('estado','Muerto')->count();
    }
    public function animalesenfermos()
    {
        return $this->hasMany('App\Animal','id_corral')->where('estado','Enfermo');
    }
    public function animalesmuertos()
    {
        return $this->hasMany('App\Animal','id_corral')->where('estado','Muerto');
    }


}
