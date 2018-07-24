@extends('plantilla')

@section('contenido')
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h2><b>Listado de Proveedores</b></h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable">
                        <thead>
                            <tr>
                                <th>Rif</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($proveedores as $proveedor)
                            <tr>
                                <td>{{ $proveedor->rif }}</td>
                                <td>{{ $proveedor->nombre }}</td>
                                <td>
                                    <a href="{{ route('proveedor.show',$proveedor->id) }}" class="btn btn-primary">Ver</a>
                                    <a href="{{ route('proveedor.update',$proveedor->id) }}" class="btn btn-success">Editar</a>
                                    <a href="{{ route('proveedor.destroy',$proveedor->id) }}" class="btn btn-danger">Eliminar</a>
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