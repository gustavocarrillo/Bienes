<?php

namespace App\Http\Controllers;

use App\Proveedor;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'rif' => 'required|unique:proveedores,rif',
            'nombre' => 'required',
        ]);

        Proveedor::create($request->all());
        flash('Proveedor registrado exitosamente')->success();
        return view('gestion-proveedores.nuevo');
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

    public function getProveedoresAjax()
    {
        $proveedores = Proveedor::all();

        return response()->json($proveedores,200);
    }
}
