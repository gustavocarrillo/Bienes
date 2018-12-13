<?php

namespace App\Http\Controllers;

use App\Bien;
use App\Elemento;
use Illuminate\Http\Request;
use App\Departamento;
use App\Direccion;
use Barryvdh\DomPDF\Facade as PDF;

class ReportesController extends Controller
{
    public function BM1($tipoUnidad ,$id)
    {
        $data = '';
        $count = [];
        $elementos = Elemento::all();

        foreach ($elementos as $elemento) {
            if($tipoUnidad == "direccion") {
                $data = Bien::where('direccion', $id)
                    ->where('codigo', 'like', $elemento->codigo . '%');
            }elseif ($tipoUnidad == "departamento"){
                $data = Bien::where('departamento', $id)
                    ->where('codigo', 'like', $elemento->codigo . '%');
            }

            if (count($data->get()) > 0) {
                $bien = $data->first();
                $bien->count = $data->count();
                array_push($count, $bien);
            }
        }
        $data = $count;
        $pdf = PDF::loadView('PDF.bm1', compact('data'));
        $pdf->setPaper('A4','landscape');
//        return view('PDF.bm1')->with(compact('data','bienes_dep'));
        return $pdf->download("bm1.pdf");
    }

    public function BM2($tipoUnidad ,$id)
    {
        $data = '';
        $bienes_dep = Departamento::where('codigo','10-06')->first();

        if($tipoUnidad == "direccion"){
            $data = Direccion::with('bienes')->where('id',$id)->first();
        }elseif ($tipoUnidad == "departamento"){
            $data = Departamento::with('bienes','_direccion')->where('id',$id)->first();
        }
//        dd($data->toArray());
        $pdf = PDF::loadView('PDF.bm1', compact('data'));
        $pdf->setPaper('A4','landscape');
//        return view('PDF.bm1')->with(compact('data','bienes_dep'));
        return $pdf->download("bm1.pdf");
    }
}
