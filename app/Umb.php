<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Umb extends Model
{
    protected $table = 'unidadmedidasbase';
    protected $fillable = ['tipo'];
    public function materiales()
    {
        return $this->hasMany('App\Material','id_material');
    }
}
