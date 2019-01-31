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
                                <img src="../fotos/{{ $bien->foto }}" alt="" class="image" style="max-width: 250px; border-radius: 5px 5px 5px 5px">
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
                    <a href="{{ route('bienes.index') }}" class="btn btn-block btn-primary">Volver</a>
                </div>
            </div>
        </div>

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
    </script>
@endsection
