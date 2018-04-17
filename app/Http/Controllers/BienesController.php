<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bien;
use App\Elemento;

class BienesController extends Controller
{
    public function getBienAjax(Request $request){

        $bien = Bien::where('elemento','=',$request->elemento)->count();

        if($bien > 0){

            $bien = Elemento::where('elemento','=',$request->elemento)->get();

            $bien = $bien->last();

            $bien = explode('-',$bien->codigo);

            $_bien = intval($bien[3]) + 1;

            if(strlen($_bien) == 1){

                $bien = $bien[0].'-'.$bien[1].'-'.$bien[2].'-'.$bien[3].'-000'.$_bien;

                return response()->json($bien);

            }elseif (strlen($_bien) == 2){

                $bien = $bien[0].'-'.$bien[1].'-'.$bien[2].'-'.$bien[3].'-00'.$_bien;

                return response()->json($bien);

            }elseif (strlen($_bien) == 3) {

                $bien = $bien[0].'-'.$bien[1].'-'.$bien[2].'-'.$bien[3].'-0'.$_bien;

                return response()->json($bien);
            }
        }else{

            $elemento = Elemento::find($request->elemento);

            $bien = explode('-',$elemento->codigo);

            $bien = $bien[0].'-'.$bien[1].'-'.$bien[2].'-'.$bien[3].'-0001';

            return response()->json($bien);
        }
    }
}
