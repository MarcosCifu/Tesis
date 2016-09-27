<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial_Medico extends Model
{
    protected $table = "historiales_medicos";
    protected $fillable = ['enfermedad','fecha','id_animales','tratamiento','estado_tratamiento'];
    public function animal()
    {
        return $this->belongsTo('App\Animal','id_animales');
    }
}
