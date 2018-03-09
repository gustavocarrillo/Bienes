<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'tipo',
        'estatus'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function bienes() {

        return $this->hasMany('App\Bien','usuario');
    }

    public function movimientos() {

        return $this->hasMany('App\Movimiento','usuario');
    }

    public function ordenes() {

        return $this->hasMany('App\Orden','usuario');
    }
}
