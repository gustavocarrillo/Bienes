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
        'inventario_inicial',
    ];

    public function departamentos()
    {
        return $this->hasMany('App\Departamento','direccion');
    }

    public function bienes()
    {
        return $this->hasMany('App\Bien','direccion');
    }

    public function movimientos()
    {
        return $this->belongsToMany('App\Bien','movmimientos','direccion','bien')
            ->withPivot('t_movimiento','fecha','direccion','departamento','observacion','usuario');
    }

    public function cierres()
    {
        return $this->hasMany('App\Cierre','direccion');
    }

    public $timestamps = false;
}
