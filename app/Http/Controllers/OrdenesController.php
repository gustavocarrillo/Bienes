<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orden;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrdenesController extends Controller
{
    public function nueva(Request $request){

        $orden = new Orden();
        $orden->numero = $request->nro_orden;
        $orden->fecha = date('Y-m-d',strtotime($request->fecha));
        $orden->proveedor = $request->proveedor;
        $orden->rif = $request->rif;
        $orden->f_factura = date('Y-m-d',strtotime($request->fechaFactura));
        $orden->nro_factura = $request->factura;
        $orden->nro_control = $request->nroControl;

        $search = ['.',','];
        $total = str_replace($search,['','.'],$request->total);
        $orden->total = $total;
        $orden->idU = $request->nro_orden.'-'.date('Y');
        $orden->usuario = Auth::id();

        if ($orden->save()){
            return response()->json('Orden creada exitosamente');
        }else{
            return response()->json('ERROR: No se pudo crear la orden');
        }
    }
}
