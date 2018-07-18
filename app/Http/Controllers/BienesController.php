<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bien;
use App\Elemento;

class BienesController extends Controller
{
    public function getLastAjax($bienid,$cantidadid){

        $bien = Bien::where('elemento',$bienid)->orderBy('codigo',"desc")->first();

        if (! $bien){

            $elemento = Elemento::find($bienid);

            $bien = $elemento->codigo."-0001";

            if (strlen($cantidadid) == 1){
                $lote = $elemento->codigo."-000".$cantidadid;
            }elseif (strlen($cantidadid) == 2){
                $lote = $elemento->codigo."-00".$cantidadid;
            }elseif (strlen($cantidadid) == 3){
                $lote = $elemento->codigo."-0".$cantidadid;
            }else{
                $lote = $elemento->codigo."-".$cantidadid;
            }

            return response()->json(["bien" => $bien, "lote" => $lote],200);
        }

        $bien = explode('-',$bien->codigo);

        $bien = $bien[3] + 1;

        return response()->json(["bien" => $bien],200);
    }
}
