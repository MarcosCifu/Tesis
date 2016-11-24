<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atributo extends Model
{
    protected $table = "atributos";
    protected $fillable = ['id','nombre','id_corral'];
    public function corrales()
    {
        return $this->belongsToMany('App\Corral','corral_atributo','id_atributo','id_corral')->withPivot('id_corral','id_atributo');
    }
}
