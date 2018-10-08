<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;

class DepartamentosController extends Controller
{
    public function getDepartamentosAjax($direccion){

        $departamentos = Departamento::where('direccion',$direccion)->get();

        if (count($departamentos) == 0){
            return response()->json(false,404);
        }

        return response()->json($departamentos,200);
    }
}
