<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table = "secciones";

    protected $fillable =[
        'codigo',
        'descripcion',
        'sub_grupo'
    ];

    public function sub_grupo() {

        return $this->belongsTo('App\SubGrupo');
    }

    public function elementos() {

        return $this->hasMany('App\Elemento','seccion');
    }

    public $timestamps = false;
}
