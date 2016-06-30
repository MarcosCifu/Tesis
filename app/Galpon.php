<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galpon extends Model
{
    protected $table = 'galpones';
    protected $fillable = ['id','numero', 'cantidad_corrales'];
    public function corrales()
    {
        return $this->hasMany('App\Corral','id_galpon');
    }
}
