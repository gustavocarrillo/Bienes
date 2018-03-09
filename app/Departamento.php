<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'direcciones';

    protected $fillable = [
        'codigo',
        'descripcion',
        'responsable',
        'direccion'
    ];

    public function departamentos() {

        return $this->belongsTo('App\Direccion');
    }

    public function movimientos() {

        return $this->hasMany('App\Movimiento','departamento');
    }

    public $timestamps = false;
}
