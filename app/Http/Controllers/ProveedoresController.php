<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use Validator;

class ProveedoresController extends Controller
{
    public function index() {

        $proveedores = Proveedor::all();

        return view('proveedores.index')->with('proveedores',$proveedores);
    }

    public function nuevo() {

        return view('proveedores.nuevo');
    }

    public function store(Request $request){

        $this->validation($request->all());

        $proveedor = new Proveedor();
        $proveedor->rif = $request->rif;
        $proveedor->nombre = $request->nombre;

        if( $proveedor->save() ){
            flash('Proveedor registrado exitosamente')->success();
            return redirect()->route('prov-nuevo');
        }

        flash('ERROR: Imposible registrar al proveedor')->danger();
        return redirect()->route('prov-nuevo');
    }

    private function validation($request){

        $rules = [
            "rif" => "required|unique:proveedores,rif",
            "nombre" => "required|unique:proveedores,nombre"
        ];

        $messageBag = [
            "rif.required" => "Debe introducir un Rif",
            "rif.unique" => "El Rif que intenta introducir ya esta registrado",
            "nombre.required" => "Debe introducir un Nombre",
            "nombre.unique" => "El Nombre que intenta introducir ya esta registrado",
        ];

        $validar = Validator::make($request,$rules,$messageBag)->validate();

        return $validar;
    }
}
