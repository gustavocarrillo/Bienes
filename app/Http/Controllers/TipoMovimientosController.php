<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoMovimiento;

class TipoMovimientosController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'codigo' => 'required|unique:tipo_movimientos,codigo',
            'descripcion' => 'required',
            'tipo' => 'required',
        ]);

        TipoMovimiento::create($request->all());
        flash('Tipo de movimiento registrado exitosamente')->success();
        return response()->redirectToRoute('tipo-movimiento.index');
    }

    public function create()
    {
        return view('gestion-tipo-movimientos.nuevo');
    }

    public function index()
    {
        $tipos = TipoMovimiento::all();

        return view('gestion-tipo-movimientos.index')->with('tipos',$tipos);
    }

    public function show(){

    }

    public function edit($id)
    {
        $tipo = TipoMovimiento::find($id);

        if (! $tipo){
            flash('El tipo de movimiento no existe')->error();
            return response()->redirectToRoute('tipo-movimiento.index');
        }

        return view('gestion-tipo-movimientos.editar',compact('tipo'));
    }

    public function update(Request $request,$id)
    {
        $tipo = TipoMovimiento::find($id);

        if (! $tipo){
            flash('El tipo de movimiento no existe')->error();
            return response()->redirectToRoute('tipo-movimiento.index');
        }

        $this->validate($request,[
            'codigo' => 'required|unique:tipo_movimientos,codigo,'.$tipo->id,
            'descripcion' => 'required',
        ]);

        $tipo->codigo = $request->codigo;
        $tipo->descripcion = $request->descripcion;
        $tipo->tipo = $request->tipo;
        $tipo->save();

        flash('El tipo de movimiento ha sido modificado exitosamente')->success();
        return response()->redirectToRoute('tipo-movimiento.index');
    }

    public function destroy($id)
    {
        $tipo = TipoMovimiento::find($id);

        if (! $tipo){
            flash('El tipo de movimiento no existe')->error();
            return response()->redirectToRoute('tipo-movimiento.index');
        }

        $tipo->delete();

        flash('El tipo de movimiento ha sido eliminado')->error();
        return response()->redirectToRoute('tipo-movimiento.index');
    }

    public function getTiposMovimientosAjax()
    {
        $tipos = TipoMovimiento::all();

        return response()->json($tipos,200);
    }

}
