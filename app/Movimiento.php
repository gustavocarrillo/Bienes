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
        'direccion',
        'departamento',
        'idU',
        'observacion',
        'usuario',
        'tipo'
    ];

    protected $hidden = ['idU'];

    public function _bien()
    {
        return $this->hasOne('App\Bien','id','bien');
    }

    public function _tipo()
    {
        return $this->belongsTo('App\TipoMovimiento','t_movimiento');
    }

    public function _direccion()
    {
        return $this->belongsTo('App\Direccion','direccion');
    }

    public function _departamento()
    {
        return $this->belongsTo('App\Departamento','departamento');
    }

    public function _usuario()
    {
        return $this->belongsTo('App\User','usuario');
    }
}
