<?php

namespace App\Http\Controllers;

use App\Bien;
use App\Cierre;
use App\Elemento;
use App\Movimiento;
use Carbon\Carbon;
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
        $data = [];

        if($tipoUnidad == "direccion"){
            $data['direccion'] = Direccion::where('id',$id)->first()->toArray();
            $movimientos = Movimiento::where(['direccion' => $id])
                ->whereIn('tipo',['0','1'])
                ->where('fecha','like',$fecha.'%')
                ->with('_bien')
                ->get();
            $data['movimientos'] = $movimientos;
        }elseif ($tipoUnidad == "departamento"){
            $data['departamento'] = Departamento::with('_direccion')->where('id',$id)->first()->toArray();
            $movimientos = Movimiento::where(['departamento' => $id])
                ->whereIn('tipo',['0','1'])
                ->where('fecha','like',$fecha.'%')
                ->with('_bien','_tipo')
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

    public function bm4($id,$mes,$ano)
    {
        $fecha = Carbon::createFromFormat('Y-m-d',"{$ano}-{$mes}-01");

        $f = $fecha->toDateString();
        $f = explode('-',$f);

        $movimientos = Movimiento::where(['direccion' => $id])
            ->where('fecha','like',$f[0].'-'.$f[1].'%')
            ->with('_bien')
            ->get();

        $incorporacion = 0;
        $desincorporacion = 0;

        $f = $fecha->subMonth(1)->toDateString();
        $f = explode('-',$f);

        $cierre = Cierre::where(['direccion' => $id,'ano' => $f[0],'mes' => $f[1]])->first();
        $direccion = Direccion::find($id);
        $existenciaAnterior = $cierre ? $cierre->monto : $direccion->inventario_inicial;

        foreach ($movimientos as $movimiento){
            if ($movimiento->tipo == 1){
                $incorporacion += $movimiento->_bien->valor_actual;
            }
            if ($movimiento->tipo == 0){
                $desincorporacion += $movimiento->_bien->valor_actual;
            }
        }

        $total = $existenciaAnterior + $incorporacion - $desincorporacion;

        $data = [];
        $data['existenciaAnterior'] = $existenciaAnterior;
        $data['incorporacion'] = $incorporacion;
        $data['desincorporacion'] = $desincorporacion;
        $data['direccion'] = $direccion;
        $data['mes'] = $this->meses(( (int)$mes) - 1 );
        $data['ano'] = $ano;
        $data['total'] = $total;

        $pdf = PDF::loadView('PDF.bm4', compact('data'));
        $pdf->setPaper('letter','landscape');
//        return view('PDF.bm1')->with(compact('data','bienes_dep'));
        return $pdf->download("bm4.pdf");
    }

    private function meses($mes)
    {
        $meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

        return $meses[$mes];
    }

    public function BM3($tipoUnidad,$id,$mesId,$anoId,$observacionId="",$constanciaId="")
    {
        $fecha = $anoId.'-'.$mesId;
//        dd($fecha);

        $total = 0;
        if($tipoUnidad == "direccion"){
            $data['direccion'] = Direccion::where('id',$id)->first()->toArray();
            $bienes = Bien::where('direccion',$id)
                ->where('estatus','faltante')
                ->where('fecha_faltante','like',$fecha.'%')
                ->get();
//            dd($bienes);
            foreach ($bienes as $bien){
                $total+=$bien['valor_actual'];
            }
            $data['bienes'] = $bienes;
        }elseif ($tipoUnidad == "departamento"){
            $data['departamento'] = Departamento::with('_direccion')->where('id',$id)->first()->toArray();
            $bienes = Bien::where('departamento',$id)
                ->where('estatus','faltante')
                ->where('fecha_faltante','like',$fecha.'%')
                ->get();
            foreach ($bienes as $bien){
                $total+=$bien['valor_actual'];
            }
            $data['bienes'] = $bienes;
        }

        $data['total'] = $total;
        $data['observacion'] = $observacionId;
        $data['constancia'] = $constanciaId;
        $pdf = PDF::loadView('PDF.bm3', compact('data'));
        $pdf->setPaper('letter','landscape');
//        return view('PDF.bm3')->with(compact('data'));
        return $pdf->download("bm3.pdf");
    }
}
