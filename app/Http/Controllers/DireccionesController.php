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

        $data = $request->all();

        $valor = str_replace('.',"",$request->inventario_inicial);
        $valor = str_replace(',',".",$valor);
        $data['inventario_inicial'] = $valor;

//        dd($data);

        Direccion::create($data);
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

        $direccion->inventario_inicial = number_format($direccion->inventario_inicial,5,',','.');

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
        $direccion->cedula_responsable = $request->cedula_responsable;
        $direccion->cargo_responsable = $request->cargo_responsable;
        $direccion->resolucion = $request->resolucion;

        $valor = str_replace('.',"",$request->inventario_inicial);
        $valor = str_replace(',',".",$valor);

        $direccion->inventario_inicial = $valor;

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
