<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = "ordenes";

    protected $fillable = [
        'numero',
        'fecha',
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
