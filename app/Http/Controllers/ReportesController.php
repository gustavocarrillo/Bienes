<?php

namespace App\Http\Controllers;

use App\Bien;
use App\Elemento;
use App\Movimiento;
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
            $data = Bien::where('direccion', $id);
            $count = $data->count();
            foreach ($data->get() as $bien){
                $total+=$bien->valor_actual;
                $totalLetras = NumerosEnLetras::convertir($total);
            }
        }elseif ($tipoUnidad == "departamento"){
            $unidad = Departamento::where('id',$id)->with('_direccion')->first();
            $data = Bien::where('departamento', $id);
            $count = $data->count();
            foreach ($data->get() as $bien){
                $total+=$bien->valor_actual;
                $totalLetras = NumerosEnLetras::convertir($total);
            }
        }

        /* if (count($data->get()) > 0) {
             $bien = $data->first();
             $bien->count = $data->count();
             array_push($count, $bien);
         }*/

        $data = $data->get();
        $fecha = date('d',strtotime(today())).' del mes de '.$this->meses((date('m',strtotime(today())) - 1)).' de '.date('Y',strtotime(today()));
        /*        $data = $count;*/
        $pdf = PDF::loadView('PDF.bm1', compact('data','bienes_dep','unidad','fecha','total','totalLetras','count'));
//        $pdf->setPaper('A4','landscape');
//        return view('PDF.bm1')->with(compact('data','bienes_dep'));
        return $pdf->download("bm1.pdf");
    }

    public function BM2($tipoUnidad ,$id,$mes,$ano)
    {
        $fecha = $ano.'-'.$mes;
        //$fecha = '2019-01';
        $data = [];

        if($tipoUnidad == "direccion"){
            $data['direccion'] = Direccion::where('id',$id)->first()->toArray();
            $movimientos = Movimiento::where(['direccion' => $id])
                ->where('fecha','like',$fecha.'%')
                ->with('_bien')
                ->get();
            $data['movimientos'] = $movimientos;
        }elseif ($tipoUnidad == "departamento"){
            $data['departamento'] = Departamento::with('_direccion')->where('id',$id)->first()->toArray();
            $movimientos = Movimiento::where(['departamento' => $id])
                ->where('fecha','like',$fecha.'%')
                ->with('_bien')
                ->get();
            $data['movimientos'] = $movimientos;
        }
        $data['periodo'] = $this->meses(( (int)$mes) - 1 ).' '.$ano;

//        dd($data);
        $pdf = PDF::loadView('PDF.bm2', compact('data'));
        $pdf->setPaper('letter','landscape');
//        return view('PDF.bm1')->with(compact('data','bienes_dep'));
        return $pdf->download("bm2.pdf");
    }

    private function meses($mes)
    {
        $meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

        return $meses[$mes];
    }
}
