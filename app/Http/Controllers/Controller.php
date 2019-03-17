<?php

namespace App\Http\Controllers;

use App\Cierre;
use App\Direccion;
use App\Movimiento;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->ejecutarCierre();
    }

    private function ejecutarCierre()
    {
        $fecha = Carbon::now()->subMonth(1)->toDateString();
        $fecha = explode('-',$fecha);

        $direcciones = Direccion::all();

        foreach ($direcciones as $direccion){
            $cierre = Cierre::where(['direccion' => $direccion->id,'mes' => $fecha[1],'ano' => $fecha[0]])->first();

            if (!$cierre){

                $f = $fecha[0].'-'.$fecha[1];

                $movimientos = Movimiento::where(['direccion' => $direccion->id])
                    ->where('fecha','like',$f.'%')
                    ->with('_bien')
                    ->get();

                $incorporacion = 0;
                $desincorporacion = 0;

                foreach ($movimientos as $movimiento){
                    if ($movimiento->tipo == 1){
                        $incorporacion += $movimiento->_bien->valor_actual;
                    }

                    if ($movimiento->tipo == 0){
                        $desincorporacion += $movimiento->_bien->valor_actual;
                    }
                }

                $total = $incorporacion - $desincorporacion;

                Cierre::create([
                    'direccion' => $direccion->id,
                    'ano' => $fecha[0],
                    'mes' => $fecha[1],
                    'monto' => $total
                ]);
            }
        }
    }
}
