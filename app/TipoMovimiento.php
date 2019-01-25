<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMovimiento extends Model
{
    protected $table = 'tipo_movimientos';

    protected $fillable = [
        'codigo',
        'descripcion',
        'tipo',
    ];

    public function movimientos() {

        return $this->hasMany('App\Movimiento','t_movimiento');
    }

    public $timestamps = false;
}
