<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direcciones';

    protected $fillable = [
        'codigo',
        'descripcion',
        'responsable'
    ];

    public function departamentos() {

        return $this->hasMany('App\Departamento','direccion');
    }

    public $timestamps = false;
}
