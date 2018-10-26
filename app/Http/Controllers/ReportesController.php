<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Direccion;
use Barryvdh\DomPDF\Facade as PDF;

class ReportesController extends Controller
{
    public function BM1($tipoUnidad ,$id)
    {
        $data = '';
        $bienes_dep = Departamento::where('codigo','10-06')->first();

        if($tipoUnidad == "direccion"){
            $data = Direccion::with('bienes')->where('id',$id)->first();
        }elseif ($tipoUnidad == "departamento"){
            $data = Departamento::with('bienes','_direccion')->where('id',$id)->first();
        }
        //dd($data->toArray());
        $pdf = PDF::loadView('PDF.bm1', compact('data','bienes_dep'));
        //$pdf->setPaper('A4','landscape');
        //return view('PDF.bm1')->with(compact('data','bienes_dep'));
        return $pdf->download("bm1.pdf");
    }
}
