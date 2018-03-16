<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Elemento;

class ElementosController extends Controller
{
    public function getElementosAjax(){

        $elementos = Elemento::all();

        return response()->json($elementos);
    }
}
