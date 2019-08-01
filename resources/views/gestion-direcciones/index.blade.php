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
                                <th width="5%">Codigo</th>
                                <th width="15%">Descripcion</th>
                                <th width="40%">Responsable</th>
                                <th width="15%">Cargo</th>
                                {{--<th width="10%">Resolución</th>--}}
                                <th width="15%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($direcciones as $direccion)
                            <tr>
                                <td width="10%">{{ $direccion->codigo }}</td>
                                <td width="30%">{{ $direccion->descripcion }}</td>
                                <td width="20%">{{ $direccion->responsable }}</td>
                                <td width="10%">{{ strtoupper($direccion->cargo_responsable) }}</td>
                                {{--<td width="10%">{{ $direccion->resolucion }}</td>--}}
                                <td width="30%">
                                    <form method="post" action="{{ route('direccion.destroy',$direccion->id) }}">
                                        <a href="{{ route('direccion.edit',$direccion->id) }}" title="EDITAR" class="btn btn-xs btn-success"><i class="material-icons">create</i></a>
                                        {{ method_field('delete') }}
                                        {{ csrf_field()  }}
                                        <a href="{{ route('reportes.bm1',['direccion',$direccion->id]) }}" title="BM1" class="btn btn-xs btn-warning  @if(count($direccion->bienes) == 0) disabled @endif">BM1</a>
                                        <a title="BM2" class="btn btn-xs btn-warning  @if(count($direccion->bienes) == 0) disabled @endif" data-toggle="modal" data-target="#bm2Modal" onclick="getId({{ $direccion->id }})">BM2</a>
                                        <a title="BM3" class="btn btn-xs btn-warning  @if(count($direccion->bienes) == 0) disabled @endif" data-toggle="modal" data-target="#bm3Modal" onclick="getId({{ $direccion->id }})">BM3</a>
                                        <a title="BM4" class="btn btn-xs btn-warning  @if(count($direccion->bienes) == 0) disabled @endif" data-toggle="modal" data-target="#bm4Modal" onclick="getId({{ $direccion->id }})">BM4</a>
                                        <button title="ELIMINAR" class="btn btn-xs btn-danger" onclick="if (! window.confirm('¿Desea elminar esta Direccion?')){ return false }"><i class="material-icons">delete</i></button>
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

        {{--BM2--}}
        <div class="modal fade" id="bm2Modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="smallModalLabel">Seleccionar Período</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Mes</label>
                            <select name="mes" id="bm2Mes" class="form-control">
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
                            <select name="ano" class="form-control ano" id="bm2Ano">
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" id="bm2" onclick="bm2({{ $direccion->id }})">Generar BM2</button>
                    </div>
                </div>
            </div>
        </div>
        {{--//BM2--}}

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
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" id="bm3" onclick="bm3({{ $direccion->id }})">Generar BM3</button>
                    </div>
                </div>
            </div>
        </div>
        {{--//BM3--}}

        {{--BM4--}}
        <div class="modal fade" id="bm4Modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="smallModalLabel">Seleccionar Período</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Mes</label>
                            <select name="mes" id="bm4Mes" class="form-control">
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
                            <select name="ano" class="form-control ano" id="bm4Ano">
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" id="bm4" onclick="bm4({{ $direccion->id }})">Generar BM4</button>
                    </div>
                </div>
            </div>
        </div>
        {{--//BM4--}}
    </div>
@endsection

@section('js')
<script>
    $(".table").dataTable();

    year = new Date().getFullYear();
    for (var i = year; i >= 1980 ; i--){
        $('.ano').append("<option value='"+i+"'>"+i+"</option>")
    }

    let dir_id = 0;

    function getId(id) {
        dir_id = id;
    }

    function bm2() {
        window.open("../public/bm2/direccion/" +dir_id+ "/" + $("#bm2Mes").val() + "/" + $("#bm2Ano").val())
    }
    let constancia = $("#bm3Constancia").val();

    function bm3() {
        let observacion = $("#bm3Observacion").val();
        observacion = observacion ? '/' + $("#bm3Observacion").val() + '/' : '';
        let constancia =  $("#bm3Constancia").val();
        constancia = constancia ? '/' + $("#bm3Constancia").val() + '/' : '';

        window.open("../bm3/direccion/" +dir_id+ "/" + $("#bm3Mes").val() + "/" + $("#bm3Ano").val() + observacion  + constancia );
    }

    function bm4() {
        window.open("../public/bm4/" +dir_id+ "/" + $("#bm4Mes").val() + "/" + $("#bm4Ano").val())
    }

</script>
@endsection