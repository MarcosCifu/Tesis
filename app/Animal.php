<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Animal extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'id',
        'save_to'    => 'slug',
    ];

    protected $table = "animales";
    protected $fillable = ['DIIO','numero_Guia','tipo','id_corral','id_pesos','estado','path','fecha_compra','fecha_venta','precio_compra','precio_venta'];

    /**
     * @return array
     */
    public function setPathAttribute($path)
    {
        if(!empty($path))
        {
            $nombre = 'ancalibeef' . time() . '.' . $path->getClientOriginalName();
            $this->attributes['path'] = $nombre;
            \Storage::disk('local')->put($nombre, \File::get($path));
        }
    }

    public function corral()
    {
        return $this->belongsTo('App\Corral','id_corral');
    }
    public function historialesmedicos()
    {
        return $this->hasMany('App\Historial_Medico','id_historiales');
    }
    public function pesos()
    {
        return $this->hasMany('App\Peso','id_animales');
    }
    public function users()
    {
        return $this->belongsToMany('App\User','user_animal','id_animales','id_user')->withPivot('fecha_compra','fecha_venta','precio_compra','precio_venta');
    }
    
}
