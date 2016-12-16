<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadisticaCorral extends Model
{
    protected $table = 'estadisticas_corrales';
    protected $fillable = ['id','fecha','pesaje_promedio','pesaje_total','tipoMayorGanancia','tipoMayorEnfermedad','ganancia_dinero','id_corral'];
    public function corrales()
    {
        return $this->belongsTo('App\Corral','id_corral');
    }
}
