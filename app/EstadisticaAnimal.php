<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadisticaAnimal extends Model
{
    protected $table = 'estadisticas_animales';
    protected $fillable = ['id','ganancia_peso','distribucion','ganancia_dinero'];
    public function animals()
    {
        return $this->belongsTo('App\Animal','id_animal');
    }
}
