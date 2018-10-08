<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    protected $table = "bienes";

    protected $fillable = [
        'codigo',
        'descripcion',
        'fecha_incorp',
        'valor',
        'valor_actual',
        'nro_orden',
        'elemento',
        'direccion',
        'departamento',
        'usuario'
    ];

    public function elemento() {

        return $this->belongsTo('App\Elemento','elememto');
    }

    public function orden() {

        return $this->belongsTo('App\Orden','nro_orden');
    }

    public function _direccion() {

        return $this->belongsTo('App\Direccion','direccion');
    }

    public function _departamento() {

        return $this->belongsTo('App\Departamento','departamento');
    }

    public function usuario() {

        return $this->belongsTo('App\User','usuario');
    }

    public function movimientos() {

        return $this->belongsToMany('App\Movimiento','movimientos','bien','t_movimiento')
            ->withPivot('fecha','departamento');
    }
}
