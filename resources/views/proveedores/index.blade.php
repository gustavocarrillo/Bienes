@extends('plantilla')

@section('contenido')
    <div class="col-lg-10 col-md-10">
        <div class="card">
            <div class="header">
                <h2><b>Listado de Proveedores</b></h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>Rif</th>
                                <th>Nombre</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach( $proveedores as $prov)
                            <tr>
                                <td>
                                    {{ $prov->rif }}
                                </td>
                                <td>
                                    {{ $prov->nombre }}
                                </td>

                                <td>
                                    <a href="" class="btn-primary btn-sm">Editar</a>
                                    <a href="" class="btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection