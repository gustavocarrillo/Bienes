@extends('plantilla')

@section('contenido')
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h2><b>Listado de Bienes</b></h2>
            </div>
            <div class="body">
                <div class="align-right">
                    <a href="{{ route('bienes.create') }}" class="btn btn-primary"><strong>Incorporar Nuevo Bien</strong></a>
                </div>
                <br />
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Descripcion</th>
                                <th>Fecha de Incorporación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($bienes as $bien)
                            <tr>
                                <td width="10%">{{ $bien->codigo }}</td>
                                <td width="55%">{{ $bien->descripcion }}</td>
                                <td width="10%">{{ date('d-m-Y',strtotime($bien->fecha_incorp)) }}</td>
                                <td width="20%">
                                        <a href="{{ route('bienes.show',$bien->id) }}" class="btn btn-xs bg-indigo"><i class="material-icons">remove_red_eye</i></a>
                                        <a href="{{ route('bienes.edit',$bien->id) }}" class="btn btn-xs btn-success"><i class="material-icons">create</i></a>
                                        <a href="{{ route('bienes.desincorporar',$bien->id) }}" class="btn btn-xs btn-danger" ><i class="material-icons">delete</i></a>
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