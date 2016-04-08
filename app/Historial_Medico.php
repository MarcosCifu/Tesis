<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial_Medico extends Model
{
    protected $table = "historial_Medico";
    protected $fillable = ['enfermedad','fecha','id_animales'];
    public function Animal()
    {
        return $this->belongsTo('App\Animal');
    }
}
