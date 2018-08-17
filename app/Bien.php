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
        'usuario'
    ];

    public function elemento() {

        return $this->belongsTo('App\Elemento','elememto');
    }

    public function orden() {

        return $this->belongsTo('App\Orden','nro_orden');
    }

    public function usuario() {

        return $this->belongsTo('App\User','usuario');
    }

    public function movimientos() {

        return $this->hasMany('App\Movimiento','bien');
    }
}
