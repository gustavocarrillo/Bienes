<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $table = 'movimientos';

    protected $fillable = [
        'bien',
        't_movimiento',
        'fecha',
        'departamento',
        'idU',
        'usuario'
    ];

    public function bien() {

        return $this->belongsTo('App\TipoMovimiento');
    }

    public function departamento() {

        return $this->belongsTo('App\Departamento');
    }

    public function usuario() {

        return $this->belongsTo('App\User');
    }
}
