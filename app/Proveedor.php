<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    protected $fillable = ['rif','nombre'];

    public function ordenes(){

        return $this->hasMany('App\Orden');
    }
}
