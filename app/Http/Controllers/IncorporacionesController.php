<?php

namespace App\Http\Controllers;

use App\Bien;
use Illuminate\Http\Request;
//use App\Bien;
use App\Elemento;

class IncorporacionesController extends Controller
{
    public function nuevaIncorporacion(Request $request){

        $elemento = Elemento::find($request->elemento);

        $ultimo_bien = Elemento::where('codigo','like',$elemento->codigo.'%')->get();

        $ultimo_bien = $ultimo_bien->last();

        $codigo = '';

        if(!$ultimo_bien){
            $codigo = $ultimo_bien->codigo.'-001';
        }

        $array = explode('-',$ultimo_bien->codigo);

        $array = intval($array->last());

        $bien = new Bien();
        $bien->elemento = $request->elemento;
        $bien->descripcion = $request->description;
        $bien->fecha_incorp = $request->f_incorp;
        $bien->valor = $request->valor_bien;
        $bien->valor_actual = $request->valor_actual_bien;
        $bien->nro_orden = $request->orden;
    }
}
