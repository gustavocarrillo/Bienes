@extends('plantilla')

@section('contenido')
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h2><b>Listado de Departamentos</b></h2>
            </div>
            <div class="body">
                <div class="align-right">
                    <a href="{{ route('departamento.create') }}" class="btn btn-primary">Nuevo Departamento</a>
                </div>
                <br />
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Descripcion</th>
                                <th>Responsable</th>
                                <th>Cargo</th>
                                <th>Resolución</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($departamentos as $departamento)
                            <tr>
                                <td width="7%">{{ $departamento->codigo }}</td>
                                <td width="30%">{{ $departamento->descripcion }}</td>
                                <td width="20%">{{ $departamento->responsable }}</td>
                                <td width="10%">{{ strtoupper($departamento->cargo_responsable) }}</td>
                                <td width="10%">{{ $departamento->resolucion }}</td>
                                <td width="30%">
                                    <form method="post" action="{{ route('departamento.destroy',$departamento->id) }}">
                                        <a href="{{ route('departamento.edit',$departamento->id) }}" class="btn btn-xs btn-success"><i class="material-icons">remove_red_eye</i></a>
                                        {{ method_field('delete') }}
                                        {{ csrf_field()  }}
                                        <a href="{{ route('reportes.bm1',['departamento',$departamento->id]) }}" class="btn btn-xs btn-warning @if(count($departamento->bienes) == 0) disabled @endif">BM1</a>
                                        <button class="btn btn-xs btn-danger" onclick="if (! window.confirm('¿Desea elminar este Departamento?')){ return false }"><i class="material-icons">delete</i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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