<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubGrupo extends Model
{
    protected $table = 'sub_grupos';

    protected $fillable =[
        'codigo',
        'descripcion'
    ];

    public function secciones() {

        return $this->hasMany('App\Seccion','sub_grupo');
    }

    public $timestamps = false;
}
