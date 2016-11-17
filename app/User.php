<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email', 'password', 'type','fecha_compra','fecha_venta','precio_compra','precio_venta','numero_Guia','procedencia'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function animals()
    {
        return $this->belongsToMany('App\Animal','user_animal','id_user','id_animales')->withPivot('fecha_compra','fecha_venta','precio_compra','precio_venta','numero_Guia','procedencia');
    }
    public function materiales()
    {
        return $this->hasMany('App\Material', 'id_user');
    }
    public function admin()
    {
        return $this->type === 'admin';
    }
}
