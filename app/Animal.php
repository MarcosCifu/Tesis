<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = "animales";
    protected $fillable = ['DIIO','numeroGuia','tipo','id_corral'];
    public function Corral()
    {
        return $this->belongsTo('App\Corral');
    }
    public function Historiales_Medicos()
    {
        return $this->hasMany('App\Historial_Medico');
    }
    public function Pesos()
    {
        return $this->hasMany('App\Peso');
    }
    public function Users()
    {
        return $this->belongsTo('App\User');
    }
}
