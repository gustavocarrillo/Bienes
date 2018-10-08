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

    public function bienes() {

        return $this->belongsToMany('App\Bien','movimientos','t_movimiento','bien')
            ->withPivot('fecha','departamento');
    }

    public function _departamento() {

        return $this->belongsTo('App\Departamento');
    }

    public function _usuario() {

        return $this->belongsTo('App\User','usuario');
    }
}
