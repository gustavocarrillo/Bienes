@extends('plantilla')

@section('contenido')
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h2><b>Listado de Direcciones</b></h2>
            </div>
            <div class="body">
                <div class="align-right">
                    <a href="{{ route('direccion.create') }}" class="btn btn-primary">Nueva Direccion</a>
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
                        @foreach($direcciones as $direccion)
                            <tr>
                                <td width="10%">{{ $direccion->codigo }}</td>
                                <td width="30%">{{ $direccion->descripcion }}</td>
                                <td width="20%">{{ $direccion->responsable }}</td>
                                <td width="10%">{{ strtoupper($direccion->cargo_responsable) }}</td>
                                <td width="10%">{{ $direccion->resolucion }}</td>
                                <td width="30%">
                                    <form method="post" action="{{ route('direccion.destroy',$direccion->id) }}">
                                        <a href="{{ route('direccion.edit',$direccion->id) }}" class="btn btn-xs btn-success"><i class="material-icons">create</i></a>
                                        {{ method_field('delete') }}
                                        {{ csrf_field()  }}
                                        <a href="{{ route('reportes.bm1',['direccion',$direccion->id]) }}" class="btn btn-xs btn-primary  @if(count($direccion->bienes) == 0) disabled @endif"><i class="material-icons">assignment_returned</i></a>
                                        <button class="btn btn-xs btn-danger" onclick="if (! window.confirm('¿Desea elminar esta Direccion?')){ return false }"><i class="material-icons">delete</i></button>
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