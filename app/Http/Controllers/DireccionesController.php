<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Direccion;

class DireccionesController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'codigo' => 'required|unique:direcciones,codigo',
            'descripcion' => 'required',
            'responsable' => 'required',
        ]);

        Direccion::create($request->all());
        flash('Direccion registrada exitosamente')->success();
        return response()->redirectToRoute('direccion.index');
    }

    public function create()
    {
        return view('gestion-direcciones.nuevo');
    }

    public function index()
    {
        $direcciones = Direccion::with('bienes')->get();

        return view('gestion-direcciones.index')->with('direcciones',$direcciones);
    }

    public function show(){

    }

    public function edit($id)
    {
        $direccion = Direccion::find($id);

        if (! $direccion){
            flash('La Direccion no existe')->error();
            return response()->redirectToRoute('direccion.index');
        }

        return view('gestion-direcciones.editar',compact('direccion'));
    }

    public function update(Request $request,$id)
    {
        $direccion = Direccion::find($id);

        if (! $direccion){
            flash('La Direccion no existe')->error();
            return response()->redirectToRoute('direccion.index');
        }

        $this->validate($request,[
            'codigo' => 'required|unique:direcciones,codigo,'.$direccion->id,
            'descripcion' => 'required',
            'responsable' => 'required',
        ]);

        $direccion->codigo = $request->codigo;
        $direccion->descripcion = $request->descripcion;
        $direccion->responsable = $request->responsable;
        $direccion->save();

        flash('La Direccion ha sido modificada exitosamente')->success();
        return response()->redirectToRoute('direccion.index');
    }

    public function destroy($id)
    {
        $direccion = Direccion::find($id);

        if (! $direccion){
            flash('La Direccion no existe')->error();
            return response()->redirectToRoute('direccion.index');
        }

        $direccion->delete();

        flash('La Direccion ha sido eliminada')->error();
        return response()->redirectToRoute('direccion.index');
    }
}
