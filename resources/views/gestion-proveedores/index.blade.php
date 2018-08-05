@extends('plantilla')

@section('contenido')
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h2><b>Listado de Proveedores</b></h2>
            </div>
            <div class="body">
                <div class="align-right">
                    <a href="{{ route('proveedor.create') }}" class="btn btn-primary">Nuevo Proveedor</a>
                </div>
                <br />
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
                                    <form method="post" action="{{ route('proveedor.destroy',$proveedor->id) }}">
                                        <a href="{{ route('proveedor.edit',$proveedor->id) }}" class="btn btn-success">Editar</a>
                                        {{ method_field('delete') }}
                                        {{ csrf_field()  }}
                                        <button class="btn btn-danger" onclick="if (! window.confirm('¿Desea elminar este Proveedor?')){ return false }">Eliminar</button>
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