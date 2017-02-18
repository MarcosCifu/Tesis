<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galpon extends Model
{
    protected $table = 'galpones';
    protected $fillable = ['id','numero', 'cantidad_corrales'];
    public function corrales()
    {
        return $this->hasMany('App\Corral','id_galpon');
    }
    public function estadisticasgalpones()
    {
        return $this->hasMany('App\EstadisticaGalpon','id_galpon');
    }
    public function numero(){
        return 'Galpón ' . $this->attributes['numero'];
    }
}
