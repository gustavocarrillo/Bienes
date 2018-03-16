<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoMovimiento;

class TipoMovimientosController extends Controller
{
    public function getTipoMovimientosAjax(){

        $t_movimientos = TipoMovimiento::all();

        return response()->json($t_movimientos);
    }
}
