<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Animal extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'DIIO',
        'save_to'    => 'slug',
    ];

    protected $table = "animales";
    protected $fillable = ['DIIO','numeroGuia','tipo','id_corral'];

    public function corral()
    {
        return $this->belongsTo('App\Corral','id_corral');
    }
    public function historialesmedicos()
    {
        return $this->hasMany('App\Historial_Medico','id_animales');
    }
    public function pesos()
    {
        return $this->hasMany('App\Peso', 'id_animales');
    }
    public function users()
    {
        return $this->belongsToMany('App\User','user_animal','id_animales', 'id_user');
    }
    public function images()
    {
        return $this->hasMany('App\image', 'id_image');
    }
}
