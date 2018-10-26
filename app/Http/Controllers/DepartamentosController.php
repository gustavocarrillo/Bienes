<?php

namespace App\Http\Controllers;

use App\Direccion;
use Illuminate\Http\Request;
use App\Departamento;

class DepartamentosController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'codigo' => 'required|unique:departamentos,codigo',
            'descripcion' => 'required',
            'responsable' => 'required',
            'direccion' => 'required',
        ]);

        Departamento::create($request->all());
        flash('Departamento registrado exitosamente')->success();
        return response()->redirectToRoute('departamento.index');
    }

    public function create()
    {
        $direcciones = Direccion::all();

        return view('gestion-departamentos.nuevo')->with('direcciones',$direcciones);
    }

    public function index()
    {
        $departamentos = Departamento::with('bienes')->get();

        return view('gestion-departamentos.index')->with('departamentos',$departamentos);
    }

    public function show(){

    }

    public function edit($id)
    {
        $departamento = Departamento::find($id);
        $direcciones = Direccion::all();

        if (! $departamento){
            flash('El departamento no existe')->error();
            return response()->redirectToRoute('departamento.index');
        }

        return view('gestion-departamentos.editar',compact(['departamento','direcciones']));
    }

    public function update(Request $request,$id)
    {
        $departamento = Departamento::find($id);

        if (! $departamento){
            flash('El departamento no existe')->error();
            return response()->redirectToRoute('departamento.index');
        }

        $this->validate($request,[
            'codigo' => 'required|unique:direcciones,codigo,'.$departamento->id,
            'descripcion' => 'required',
            'responsable' => 'required',
            'direccion' => 'required',
        ]);

        $departamento->codigo = $request->codigo;
        $departamento->descripcion = $request->descripcion;
        $departamento->responsable = $request->responsable;
        $departamento->direccion = $request->direccion;
        $departamento->save();

        flash('El departamento ha sido modificada exitosamente')->success();
        return response()->redirectToRoute('departamento.index');
    }

    public function destroy($id)
    {
        $departamento = Departamento::find($id);

        if (! $departamento){
            flash('El departamento no existe')->error();
            return response()->redirectToRoute('departamento.index');
        }

        $departamento->delete();

        flash('El departamento ha sido eliminada')->error();
        return response()->redirectToRoute('departamento.index');
    }

    public function getDepartamentosAjax($direccion){

        $departamentos = Departamento::where('direccion',$direccion)->get();

        if (count($departamentos) == 0){
            return response()->json(false,404);
        }

        return response()->json($departamentos,200);
    }
}
