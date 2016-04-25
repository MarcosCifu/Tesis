<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materiales';
    protected $fillable = ['numero', 'descripcion', 'cantudad', 'id_umb'];

    public function umb()
    {
        return $this->belongsTo('App\Umb','id_umb');
    }
}
