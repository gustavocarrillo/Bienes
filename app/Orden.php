<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = "ordenes";

    protected $fillable = [
        'numero',
        'fecha',
        'anno',
        'proveedor',
        'f_factura',
        'nro_factura',
        'nro_control',
        'total',
        'idU',
        'usuario'
    ];

    public function bienes() {

        return $this->hasMany('App\Bien','nro_orden');
    }

    public function usuario() {

        return $this->belongsTo('App\User');
    }
}
