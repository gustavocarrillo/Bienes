<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';

    protected $fillable = [
        'codigo',
        'descripcion',
        'responsable',
        'direccion'
    ];

    public function direccion() {

        return $this->belongsTo('App\Direccion');
    }

    public function bienes() {

        return $this->hasMany('App\Bien','departamento');
    }

    public function movimientos() {

        return $this->hasMany('App\Movimiento','departamento');
    }

    public $timestamps = false;
}
