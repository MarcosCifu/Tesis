<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materiales';
    protected $fillable = ['numero', 'nombre', 'umb', 'cantidad','observacion'];

    
    public function user()
    {
        return $this->belongsTo('App\User','id_user');
    }
}
