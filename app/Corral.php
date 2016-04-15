<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corral extends Model
{
    protected $table = "corrales";
    protected $fillable = ['numero','cantidad'];
    public function animals()
    {
        return $this->hasMany('App\Animal');
    }
}
