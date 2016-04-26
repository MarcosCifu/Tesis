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
        'name', 'email', 'password', 'type',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function images()
    {
        return $this->hasMany('App\Image', 'id_user');
    }
    public function animals()
    {
        return $this->belongsToMany('App\Animal','user_animal','id','id_user')->wherePivot('fecha_ingreso','fecha_salida','precio_ingreso','precio_salida','procedencia')->withTimestamps();
    }
    public function materiales()
    {
        return $this->hasMany('App\Material', 'id_user');
    }
}
