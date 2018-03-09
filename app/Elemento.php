<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    protected $table = 'elementos';

    protected $fillable =[
        'codigo',
        'descripcion',
        'seccion'
    ];

    public function seccion() {

        return $this->belongsTo('App\Seccion');
    }

    public function bienes() {

        return $this->hasMany('App\Bien','elemento');
    }

    public $timestamps = false;
}
