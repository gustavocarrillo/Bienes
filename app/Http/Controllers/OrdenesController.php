<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Orden;
use Illuminate\Support\Facades\Auth;
use App\Proveedor;

class OrdenesController extends Controller
{
    public function create()
    {
        return view('gestion-ordenes.nuevo');
    }

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
            'proveedor_id' => $request->proveedores,
            'f_factura' => date('Y-m-d',strtotime($request->f_factura)),
            'nro_factura' => $request->nro_factura,
            'nro_control' => $request->nro_control,
            'total' => $total,
            'idU' => $idU,
            'usuario' => Auth::id(),
        ]);

        flash('Orden guardada exitosamente')->success();
        return response()->redirectToRoute('orden.index');
    }

    public function storeAjax(Request $request)
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
            return response()->json(false,400);
        }

        $total = str_replace('.',"",$request->total);
        $total = str_replace(',',".",$total);
        $now = Carbon::now();

        Orden::create([
            "numero" => $request->numero,
            "fecha" => date('Y-m-d',strtotime($request->fecha)),
            "anno" => $now->year,
            'proveedor_id' => $request->proveedores,
            'f_factura' => date('Y-m-d',strtotime($request->f_factura)),
            'nro_factura' => $request->nro_factura,
            'nro_control' => $request->nro_control,
            'total' => $total,
            'idU' => $idU,
            'usuario' => Auth::id(),
        ]);

        return response()->json(true,200);
    }

    public function edit($id)
    {
        $orden = Orden::with('proveedor')->where('id',$id)->first();

        if (!$orden){
            flash("La orden no existe")->error();
            return response()->redirectToRoute('orden.index');
        }

        $proveedores = Proveedor::all();
        return view('gestion-ordenes.editar',compact(['orden','proveedores']));
    }

    public function update(Request $request,$id)
    {
        $orden = Orden::with('proveedor')->where('id',$id)->first();

        if (!$orden){
            flash("La orden no existe")->error();
            return response()->redirectToRoute('orden.index');
        }

        $this->validate($request,[
            'numero' => 'required|numeric|unique:ordenes,numero,'.$orden->id,
            'fecha' => 'required',
            'proveedores' => 'required',
            'f_factura' => 'required',
            'nro_factura' => 'required',
            'nro_control' => 'required',
            'total' => 'required',
        ]);

        $total = str_replace('.',"",$request->total);
        $total = str_replace(',',".",$total);

        $orden->numero = $request->numero;
        $orden->fecha = date('Y-m-d',strtotime($request->fecha));
        $orden->proveedor_id = $request->proveedores;
        $orden->f_factura = date('Y-m-d',strtotime($request->f_factura));
        $orden->nro_factura = $request->nro_factura;
        $orden->nro_control = $request->nro_control;
        $orden->total = $total;
        $orden->save();

        flash("La orden ha sido modificada exitosamente")->success();
        return response()->redirectToRoute('orden.index');
    }

    public function index()
    {
        $ordenes = Orden::all();

        return view('gestion-ordenes.index',['ordenes' => $ordenes]);
    }

    public function show($id)
    {
        $orden = Orden::with('proveedor')->where('id',$id)->first();

        if (!$orden){
            flash("La orden no existe")->error();
            return response()->redirectToRoute('orden.index');
        }

        return view('gestion-ordenes.ver',compact("orden"));
    }

    public function delete($id)
    {
        $orden = Orden::with('proveedor')->where('id',$id)->first();

        if (!$orden){
            flash("La orden no existe")->error();
            return response()->redirectToRoute('orden.index');
        }

        $orden->delete();

        flash("La orden ha sido eliminada")->success();
        return response()->redirectToRoute('orden.index');
    }

    public function getOrdenesAjax()
    {
        $ordenes = Orden::orderBy('fecha','desc')->get();

        return response()->json($ordenes,200);
    }
}
