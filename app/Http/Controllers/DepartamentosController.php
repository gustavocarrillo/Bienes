<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;

class DepartamentosController extends Controller
{
    public function getDepartamentosAjax(){

        $departamentos = Departamento::all();

        return response()->json($departamentos);
    }
}
