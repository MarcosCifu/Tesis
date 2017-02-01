<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    protected $table = 'precioKilo';
    protected $fillable = ['id','tipo','valor','fecha'];


    public function user()
    {
        return $this->belongsTo('App\User','id_user');
    }
}
