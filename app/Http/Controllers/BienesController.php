<?php

namespace App\Http\Controllers;

use App\Direccion;
use App\Orden;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Bien;
use App\Elemento;
use App\Departamento;
use App\TipoMovimiento;
use Auth;

class BienesController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'codigo' => 'required|unique:bienes,codigo',
            'descripcion' => 'required',
            'fecha_incorp' => 'required',
            'valor' => 'required',
            'valor_actual' => 'required',
            't_movimiento' => 'required',
            'nro_orden' => 'required_unless:t_movimiento,11',
            'direccion' => 'required',
            'elemento' => 'required',
        ]);

        $valor = str_replace('.',"",$request->valor);
        $valor = str_replace(',',".",$valor);

        $valor_actual = str_replace('.',"",$request->valor_actual);
        $valor_actual = str_replace(',',".",$valor_actual);

        //dd($request->all());

        Bien::create([
            'codigo' => $request->codigo,
            'descripcion' => ucfirst($request->descripcion),
            'fecha_incorp' => date('Y-m-d',strtotime(trim($request->fecha_incorp))),
            'valor' => $valor,
            'valor_actual' => $valor_actual,
            'nro_orden' => $request->nro_orden,
            'elemento' => $request->elemento,
            'direccion' => $request->direccion,
            'departamento' => $request->departamento,
            'usuario' => Auth::id(),
        ]);

        flash('El bien ha sido registrado exitosamente')->success();
        return response()->redirectToRoute('bienes.index');
    }

    public function index()
    {
        $bienes = Bien::with('orden')->orderBy('fecha_incorp','desc')->get();

        return view('gestion-bienes.index')->with(compact('bienes'));
    }

    public function show($id)
    {
        $bien = Bien::where('id',$id)->with('orden','_direccion','_departamento')->first();

        return view('gestion-bienes.ver')->with(compact('bien'));
    }

    public function edit($id)
    {
        $bien = Bien::find($id);

        $elementos = Elemento::all();
        $direcciones = Direccion::all();
        $departamentos = Departamento::all();
        $tipos = TipoMovimiento::all();
        $ordenes = Orden::where('anno',Carbon::now()->year)->get();

        return view('gestion-bienes.editar')->with(compact(['bien','elementos','direcciones','departamentos','tipos','ordenes']));
    }

    public function update(Request $request,$id)
    {
        $bien = Bien::find($id);

        $this->validate($request,[
            'descripcion' => 'required',
            'fecha_incorp' => 'required',
            'valor' => 'required',
            'valor_actual' => 'required',
            'nro_orden' => 'required',
            'elemento' => 'required',
        ]);

        $valor = str_replace('.',"",$request->valor);
        $valor = str_replace(',',".",$valor);

        $valor_actual = str_replace('.',"",$request->valor_actual);
        $valor_actual = str_replace(',',".",$valor_actual);

        $bien->descripcion = $request->descripcion;
        $bien->fecha_incorp = date('Y-m-d',strtotime($request->fecha_incorp));
        $bien->valor = $valor;
        $bien->valor_actual = $valor_actual;
        $bien->nro_orden = $request->nro_orden;
        $bien->elemento = $request->elemento;
        $bien->save();

        flash('El bien ha sido modificado exitosamente')->success();
        return response()->redirectToRoute('bienes.index');
    }

    public function getLastAjax($bienid,$cantidadid)
    {
        $bien = Bien::where('elemento',$bienid)->orderBy('codigo',"desc")->first();

        if (! $bien){

            $elemento = Elemento::find($bienid);

            $bien = $elemento->codigo."-0001";

            if (strlen($cantidadid) == 1){
                $lote = $elemento->codigo."-000".$cantidadid;
            }elseif (strlen($cantidadid) == 2){
                $lote = $elemento->codigo."-00".$cantidadid;
            }elseif (strlen($cantidadid) == 3){
                $lote = $elemento->codigo."-0".$cantidadid;
            }else{
                $lote = $elemento->codigo."-".$cantidadid;
            }

            return response()->json(["bien" => $bien, "lote" => $lote],200);
        }

        $bien = explode('-',$bien->codigo);

        //dd($bien);

        $bien[4] += 1;

        if (strlen($bien[4]) == 1){
            $bien[4] = '000'.$bien[4];
        }elseif (strlen($bien[4]) == 2){
            $bien[4] = '00'.$bien[4];
        }elseif (strlen($bien[4]) == 3){
            $bien[4] = '0'.$bien[4];
        }

        $bien = join('-',$bien);

        return response()->json(["bien" => $bien],200);
    }

    public function create()
    {
        $elementos = Elemento::all();
        $direcciones = Direccion::all();
        $departamentos = Departamento::all();
        $tipos = TipoMovimiento::where('descripcion','like','incorporacion%')->get();
        $ordenes = Orden::where('anno',Carbon::now()->year)->get();

        return view('gestion-bienes.incorporacion')->with(compact(['elementos','direcciones','departamentos','tipos','ordenes']));
    }

    public function destroy($id)
    {
        $bienes = Bien::find($id);
        $bienes->delete();

        return response()->redirectToRoute('bienes.index');
    }
}
