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
                                        <a title="BM3" class="btn btn-xs btn-warning  @if(count($departamento->bienes) == 0) disabled @endif" data-toggle="modal" data-target="#bm3Modal" onclick="getId({{ $departamento->id }})">BM3</a>
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

        {{--BM3--}}
        <div class="modal fade" id="bm3Modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="smallModalLabel">Seleccionar Período</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Mes</label>
                            <select name="mes" id="bm3Mes" class="form-control">
                                <option value="01">Enero</option>
                                <option value="02">Febrero</option>
                                <option value="03">Marzo</option>
                                <option value="04">Abril</option>
                                <option value="05">Mayo</option>
                                <option value="06">Junio</option>
                                <option value="07">Julio</option>
                                <option value="08">Agosto</option>
                                <option value="09">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Año</label>
                            <select name="ano" class="form-control ano" id="bm3Ano">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Observación</label>
                            <textarea class="form-control" id="bm3Observacion"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Constancia</label>
                            <textarea class="form-control" id="bm3Constancia"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" id="bm3" onclick="bm3({{ $departamento->id }})">Generar BM3</button>
                    </div>
                </div>
            </div>
        </div>
        {{--//BM3--}}
    </div>
@endsection

@section('js')
<script>
    $(".table").dataTable();

    year = new Date().getFullYear();
    for (var i = year; i >= 1980 ; i--){
        $('.ano').append("<option value='"+i+"'>"+i+"</option>")
    }

    let dep_id = 0;

    function getId(id) {
        dep_id = id;
    }

    function bm3() {
        let observacion = $("#bm3Observacion").val();
        observacion = observacion ? '/' + observacion + '/' : '';
        let constancia =  $("#bm3Constancia").val();

        window.open("../public/bm3/departamento/" +dep_id+ "/" + $("#bm3Mes").val() + "/" + $("#bm3Ano").val() + observacion  + constancia );
    }
</script>
@endsection