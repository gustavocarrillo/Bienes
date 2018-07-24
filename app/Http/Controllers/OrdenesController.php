<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Orden;
use Illuminate\Support\Facades\Auth;

class OrdenesController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|numeric',
            'fecha' => 'required',
            'proveedores' => 'required',
            'f_factura' => 'required',
            'nro_factura' => 'required',
            'nro_control' => 'required',
            'total' => 'required',
        ]);

        $idU = $request->numero.$request->anno;

        $_idU = Orden::where('idU',$idU)->first();

        if ($_idU){
            flash('Ya existe una orden con este numero en este año')->error();
            return view('gestion-ordenes.nueva');
        }

        $total = str_replace('.',"",$request->total);
        $total = str_replace(',',".",$total);
        $now = Carbon::now();

        Orden::create([
            "numero" => $request->numero,
            "fecha" => date('Y-m-d',strtotime($request->fecha)),
            "anno" => $now->year,
            'proveedor' => $request->proveedores,
            'f_factura' => date('Y-m-d',strtotime($request->f_factura)),
            'nro_factura' => $request->nro_factura,
            'nro_control' => $request->nro_control,
            'total' => $total,
            'idU' => $idU,
            'usuario' => Auth::id(),
        ]);

        flash('Orden guardada exitosamente')->success();
        return view('gestion-ordenes.nueva');
    }

    public function create()
    {
        return view('gestion-ordenes.nueva');
    }

    public function index()
    {
        $ordenes = Orden::all();
        return view('gestion-ordenes.index')->with('ordenes',$ordenes);
    }

    public function show($id)
    {
        $orden = Orden::with('proveedor')->where('id',$id)->first();
        return view('gestion-ordenes.ver')->with('orden',$orden);
    }
}
