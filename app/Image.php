<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = ['name', 'id_animales', 'id_user'];
    public function animal()
    {
        return $this->belongsTo('App\Animal','id_animal');
    }
    public function user()
    {
        return $this->belongsTo('App\User','id_user');
    }
}
