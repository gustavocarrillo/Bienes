@extends('plantilla')

@section('contenido')
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h2><b>BIEN: {{ $bien->codigo }}</b></h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="orden">Descripción:</label>
                            <div>
                                {{ $bien->descripcion }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha de Incorporacón:</label>
                            <div>
                                {{ date('d-m-Y',strtotime($bien->fecha_incorp)) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="orden">Valor:</label>
                            <div>
                                {{ $bien->valor }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="orden">Valor Actual:</label>
                            <div>
                                {{ $bien->valor_actual }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="orden">Nro de Orden:</label>
                            <div>
                                @if(isset($bien->orden->numero))
                                    {{ $bien->orden->numero }}
                                @else
                                    N/A
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección:</label>
                            <div>
                                {{ $bien->_direccion->descripcion }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="departamento">Departamento:</label>
                            <div>
                                @if($bien->_departamento)
                                    {{ $bien->_departamento->descripcion }}
                                @else
                                    N/A
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="estatus">Estatus:</label>
                            <div>
                                <span class="label @if($bien->estatus == 'activo') label-success @else label-danger @endif">{{ strtoupper($bien->estatus) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-5">
                        <div class="form-group">
                            <label for="orden">FOTO</label>
                            <div>
                                <img src="@if($bien->foto)../fotos/{{ $bien->foto }}@else ../fotos/none.png @endif" alt="" class="image" style="max-width: 250px; border-radius: 5px 5px 5px 5px">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row clearfix">
                    <div class="col-md-12 col-lg-12 ">
                        <h2 class="card-inside-title">Movimientos</h2>
                        <table class="table table-bordered table-striped table-hover data-table">
                            <thead>
                            <tr>
                                <th>Nº</th>
                                <th>Movimiento</th>
                                <th>Fecha</th>
                                <th>Dirección</th>
                                <th>Departamento</th>
                                <th>Observación</th>
                                <th>Usuario</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{ $cont = 1 }}
                            @foreach($movimientos as $movimiento)
                                <tr>
                                    <td>{{ $cont }}</td>
                                    <td>{{ $movimiento->_tipo->descripcion }}</td>
                                    <td>{{ date('d-m-Y',strtotime($movimiento->fecha )) }}</td>
                                    <td>{{ $movimiento->_direccion->descripcion}}</td>
                                    <td>@if($movimiento->_departamento){{ $movimiento->_departamento->descripcion }}@endif</td>
                                    <td>{{ $movimiento->observacion }}</td>
                                    <td>{{ $movimiento->_usuario->username }}</td>
                                </tr>
                                {{ $cont++ }}
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row clearfix">
                    <a class="btn btn-warning pull-right" data-toggle="modal" data-target="#smallModal">Faltante por investigar</a>
                    <a href="{{ route('bienes.index') }}" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div>

        {{--Modal--}}
        <div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
            <form action="" id="modal">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Faltante por investigar</h4>
                        </div>
                        <form action="{{ route('bienes.store') }}" method="post">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="">Fecha:</label>
                                        <div class="input-group">
                                           <span class="input-group-addon">
                                               <i class="material-icons">date_range</i>
                                           </span>
                                            <div class="form-line">
                                                <input type="text" id="fechaModal" class="form-control date" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Observación:</label>
                                        <div class="form-line">
                                            <textarea name="observacion" id="observacion" class="form-control" cols="30" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                                    <i class="material-icons">cancel</i>
                                    <span>Cancelar</span>
                                </button>
                                <button type="submit" id="guardarModal" class="btn btn-primary waves-effect">
                                    <i class="material-icons">save</i>
                                    <span>GUARDAR</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </form>
        </div>
        {{--Fin - Modal--}}

        @include('flash::message')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection

@section('js')
    <script>
        $(".table").dataTable();
        $(function(){
            $('.date').inputmask('dd-mm-yyyy', { placeholder: '__-__-____' });
        })
    </script>
@endsection
