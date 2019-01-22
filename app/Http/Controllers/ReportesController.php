<?php

namespace App\Http\Controllers;

use App\Bien;
use App\Elemento;
use Illuminate\Http\Request;
use App\Departamento;
use App\Direccion;
use Barryvdh\DomPDF\Facade as PDF;
use NumerosEnLetras;

class ReportesController extends Controller
{
    public function BM1($tipoUnidad ,$id)
    {
        $data = '';
        $elementos = Elemento::all();
        $bienes_dep = Departamento::where('codigo','10-06')->first();
        $unidad = '';
        $total = 0;
        $totalLetras = '';

        if($tipoUnidad == "direccion") {
            $unidad = Direccion::find($id);
            $data = Bien::where('direccion', $id)->get();
            foreach ($data as $bien){
                $total+=$bien->valor;
                $totalLetras = NumerosEnLetras::convertir($total);
            }
        }elseif ($tipoUnidad == "departamento"){
            $unidad = Departamento::where('id',$id)->with('_direccion')->first();
            $data = Bien::where('departamento', $id)->get();
            foreach ($data as $bien){
                $total+=$bien->valor;
                $totalLetras = NumerosEnLetras::convertir($total);
            }
        }

        /* if (count($data->get()) > 0) {
             $bien = $data->first();
             $bien->count = $data->count();
             array_push($count, $bien);
         }*/

        $fecha = date('d',strtotime(today())).' del mes de '.$this->meses((date('m',strtotime(today())) - 1)).' de '.date('Y',strtotime(today()));
        /*        $data = $count;*/
        $pdf = PDF::loadView('PDF.bm1', compact('data','bienes_dep','unidad','fecha','total','totalLetras'));
//        $pdf->setPaper('A4','landscape');
//        return view('PDF.bm1')->with(compact('data','bienes_dep'));
        return $pdf->stream("bm1.pdf");
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
        $pdf->setPaper('letter');
//        return view('PDF.bm1')->with(compact('data','bienes_dep'));
        return $pdf->download("bm1.pdf");
    }

    private function meses($mes)
    {
        $meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

        return $meses[$mes];
    }
}