<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadisticaCorral extends Model
{
    protected $table = 'estadisticas_corrales';
    protected $fillable = ['id','pesaje_promedio','tipoMayorGanancia','tipoMayorEnfermedad','ganancia_dinero'];
    public function corrales()
    {
        return $this->belongsTo('App\Corral','id_corral');
    }
}
