<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadisticaGalpon extends Model
{
    protected $table = 'estadisticas_galpones';
    protected $fillable = ['id','pesaje_promedio'];
    public function galpones()
    {
        return $this->belongsTo('App\Galpon','id_galpon');
    }
}
