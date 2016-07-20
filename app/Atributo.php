<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atributo extends Model
{
    protected $table = "atributos";
    protected $fillable = ['id','nombre','id_corral'];
    public function corrales()
    {
        return $this->belongsToMany('App\Corrales','corral_atributo','id_atributo','id_corral');
    }
}
