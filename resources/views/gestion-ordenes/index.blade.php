@extends('plantilla')

@section('contenido')
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h2><b>Listado Ordenes de Compra</b></h2>
            </div>
            <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>Numero</th>
                                    <th>Fecha</th>
                                    <th>Nro de Factura</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($ordenes as $orden)
                                <tr>
                                    <td>{{ $orden->numero }}</td>
                                    <td>{{ $orden->fecha }}</td>
                                    <td>{{ $orden->nro_factura }}</td>
                                    <td>
                                        <a href="{{ route('orden.show',$orden->id) }}" class="btn btn-primary">Ver</a>
                                        <a href="{{ route('orden.update',$orden->id) }}" class="btn btn-success">Editar</a>
                                        <a href="{{ route('orden.destroy',$orden->id) }}" class="btn btn-danger">Eliminar</a>
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
    $('.table').dataTable();
</script>
@endsection