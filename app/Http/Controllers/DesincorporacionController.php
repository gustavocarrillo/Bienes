<?php

namespace App\Http\Controllers;

use App\Bien;
use Illuminate\Http\Request;

class DesincorporacionController extends Controller
{
    public function index()
    {
        $bienes = Bien::where('estatus','desincorporado')->get();

        return view('gestion-desincorporacion.index')->with(compact('bienes'));
    }
}
