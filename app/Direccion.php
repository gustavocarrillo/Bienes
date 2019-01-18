<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direcciones';

    protected $fillable = [
        'codigo',
        'descripcion',
        'responsable',
        'cedula_responsable',
        'cargo_responsable',
        'resolucion',
    ];

    public function departamentos() {

        return $this->hasMany('App\Departamento','direccion');
    }

    public function bienes() {

        return $this->hasMany('App\Bien','direccion');
    }

    public $timestamps = false;
}
