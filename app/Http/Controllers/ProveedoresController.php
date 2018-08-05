<?php

namespace App\Http\Controllers;

use App\Proveedor;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'rif' => 'required|unique:proveedores,rif',
            'nombre' => 'required',
        ]);

        Proveedor::create($request->all());
        flash('Proveedor registrado exitosamente')->success();
        return response()->redirectToRoute('proveedor.index');
    }

    public function create()
    {
        return view('gestion-proveedores.nuevo');
    }

    public function index()
    {
        $proveedores = Proveedor::all();

        return view('gestion-proveedores.index')->with('proveedores',$proveedores);
    }

    public function show(){

    }

    public function edit($id)
    {
        $proveedor = Proveedor::find($id);

        if (! $proveedor){
            flash('El proveedor solicitado no existe')->error();
            return response()->redirectToRoute('proveedor.index');
        }

        return view('gestion-proveedores.editar',compact('proveedor'));
    }

    public function update(Request $request,$id)
    {
        $proveedor = Proveedor::find($id);

        if (! $proveedor){
            flash('El proveedor no existe')->error();
            return response()->redirectToRoute('proveedor.index');
        }

        $this->validate($request,[
            'rif' => 'required|unique:proveedores,rif,'.$proveedor->id,
            'nombre' => 'required',
        ]);

        $proveedor->rif = $request->rif;
        $proveedor->nombre = $request->nombre;
        $proveedor->save();

        flash('El proveedor ha sido modificado exitosamente')->success();
        return response()->redirectToRoute('proveedor.index');
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);

        if (! $proveedor){
            flash('El proveedor no existe')->error();
            return response()->redirectToRoute('proveedor.index');
        }

        $proveedor->delete();

        flash('El proveedor ha sido eliminado')->error();
        return response()->redirectToRoute('proveedor.index');
    }

    public function getProveedoresAjax()
    {
        $proveedores = Proveedor::all();

        return response()->json($proveedores,200);
    }

}
