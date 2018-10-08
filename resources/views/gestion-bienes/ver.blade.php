@extends('plantilla')

@section('contenido')
    <div class="col-lg-8 col-md-8">
        <div class="card">
            <div class="header">
                <h2><b>BIEN: {{ $bien->codigo }}</b></h2>
            </div>
            <div class="body">
                <form action="{{ route('bienes.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row clearfix">
                        <div class="col-md-6 col-lg-6">
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
                            <div class="form-group">
                                <label for="orden">Nro de Orden:</label>
                                <div>
                                    {{ $bien->orden->numero }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
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
                        </div>
                    </div>
                    <div class="row clearfix">
                        <a href="{{ route('bienes.index') }}" class="btn btn-block btn-primary">Volver</a>
                    </div>
                </form>
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
