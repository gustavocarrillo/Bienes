<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cierre extends Model
{
    protected $fillable = [
        'direccion',
        'mes',
        'ano',
        'monto',
    ];
}
