<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $table = 'estadisticas';
    protected $fillable = ['id'];

    public function corrales()
    {
        return $this->belongsToMany('App\Corral','estadisticas_corrales','id_estadisticas','id_corral')
            ->withPivot('corralMayorGanancia','pesaje_promedio','tipoMayorGanancia','tipoMayorEnfermedad','ganancia_dinero');
    }
    public function galpones()
    {
        return $this->belongsToMany('App\Galpon','estadisticas_galpones','id_estadisticas','id_galpon')
            ->withPivot('pesaje_promedio');
    }
    public function animals()
    {
        return $this->belongsToMany('App\Animal','estadisticas_animales','id_animales','id_estadisticas')
            ->withPivot('ganancia_peso','distribucion','ganancia_dinero');
    }
}
