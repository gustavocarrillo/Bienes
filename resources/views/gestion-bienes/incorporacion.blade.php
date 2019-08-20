@extends('plantilla')

@section('contenido')
    <div class="col-lg-7 col-md-7">
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
        <div class="card">
            <div class="header">
                <h2><b>Incorporacion de Bienes</b></h2>
            </div>
            <div class="body">
                <h2 class="card-inside-title">Seleccionar Elemento</h2>
                <form action="{{ route('bienes.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="codigo" id="codigo_input">
                    <input type="hidden" name="lote" id="lote_input">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="p-b-15">
                                <select name="elemento" id="elementos" class="form-control show-tick" data-live-search="true">
                                    <option value="" selected>Seleccione un elemento</option>
                                    @foreach($elementos as $elemento)
                                        <option value="{{ $elemento->id }}">{{ $elemento->codigo.' - '.$elemento->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-md-offset-8" id="inc_div">
                                    <div class="form-group">
                                        <label for="inc_por">Incorporación por: </label>
                                        <select name="inc_por" id="inc_por" class="form-control show-tick">
                                            <option value="unidad" @if(old('inc_por') == 'unidad') selected @endIf>Unidad</option>
                                            <option value="lote" @if(old('inc_por') == 'lote') selected @endIf>Lote</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 hidden" id="cantidad_div">
                                    <div class="form-group">
                                        <label for="cantidad">Cantidad</label>
                                        <div class="form-line">
                                            <input type="text" name="cantidad" id="cantidad" class="form-control int" placeholder="" maxlength="4" value="{{ old('cantidad')  }}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2 class="card-inside-title">Datos de Incorporación</h2>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inc_por">Descripcion: </label>
                                        <div class="form-line">
                                            {{--<input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="" value="{{ old('descripcion')  }}" maxlength="100" />--}}
                                            <textarea name="descripcion" class="form-control" rows="3">{{ old('descripcion') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-offset-5 col-md-8  p-l-30 m-t-20">
                                    <div class="form-group">
                                        <label for="inc_por">Codigo: </label>
                                        <span id="codigo">00-0-000-0000</span><span id="separador" class="hidden"> -- </span><span id="cod-lote" class="hidden">00-0-000-0000</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="orden">Orden de Compra:</label>
                                        {{--<div class="form-line">
                                            <input type="text" id="orden" name="nro_orden" class="form-control">
                                        </div>--}}
                                        <select name="nro_orden" id="orden" class="form-control show-tick" data-live-search="true">
                                            <option value="" selected>Seleccione..</option>
                                            {{--@foreach($ordenes as $orden)
                                                <option value="{{ $orden->id }}">{{ $orden->numero }}</option>
                                            @endforeach--}}
                                        </select>
                                    </div>
                                </div>
                                {{--<div class="col-sm-2">
                                    <div class="form-group m-t-30">
                                        <input type="checkbox" id="basic_checkbox_2" name="n_a" class="filled-in"/>
                                        <label for="basic_checkbox_2">N/A</label>
                                    </div>
                                </div>--}}
                                <div class="col-sm-2">
                                    <div class="p-t-30">
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#smallModal" onclick="stop(event)">Nueva</button>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-offset-3">
                                    <div class="form-group">
                                        <label for="orden">Valor del Bien:</label>
                                        <div class="form-line">
                                            <input type="text" name="valor" id="valor_bien" value="{{ old('valor')  }}" class="form-control decimal" maxlength="16"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-sm-5">
                                    <label>Fecha de Incorporación</label>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                        <div class="form-line">
                                            <input type="text" name="fecha_incorp" id="f_incorp" class="form-control date" placeholder="Ejem: 30/07/2016" value="{{ old('fecha_incorp') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4  col-md-offset-3">
                                    <div class="form-group">
                                        <label for="valor_actual_bien">Valor actual del Bien:</label>
                                        <div class="form-line">
                                            <input type="text" name="valor_actual" id="valor_actual_bien" class="form-control decimal" maxlength="16" value="{{ old('valor_actual')  }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2 class="card-inside-title">Destino</h2>
                                    <hr>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="orden">Dirección</label>
                                            <select name="direccion" id="direccion" class="form-control show-tick" data-live-search="true">
                                                <option value="" selected>Seleccione una dirección</option>
                                                @foreach($direcciones as $direccion)
                                                    <option value="{{ $direccion->id }}">{{ $direccion->codigo.' - '.$direccion->descripcion }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" id="departamentos_div">
                                        <div class="form-group">
                                            <label for="orden">Departamento</label>
                                            <select name="departamento" id="departamento" class="form-control show-tick" data-live-search="true">
                                                <option value="" selected>Seleccione un departamento</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2 class="card-inside-title">Tipo de Movimiento</h2>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <select name="t_movimiento" id="t_movimiento" class="form-control show-tick" data-live-search="true">
                                                <option value="" selected>Seleccione un tipo</option>
                                                @foreach($tipos as $tipo)
                                                    <option value="{{ $tipo->id }}">{{ $tipo->codigo.' - '.$tipo->descripcion }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2 class="card-inside-title">Foto</h2>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input type="file" name="foto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 p-t-10 p-b-8">
                                    <button id="btnGuardar" class="btn btn-primary waves-effect">
                                        <i class="material-icons">save</i>
                                        <span>GUARDAR</span>
                                    </button>
                                    <a href="{{ route('bienes.index') }}" class="btn btn-danger waves-effect pull-right">
                                        <i class="material-icons">cancel</i>
                                        <span>Volver</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--Modal--}}
    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
        <form action="" id="modal">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header hidden" id="modalMsgHeader">
                        <div class="alert" id="modalMsg">

                        </div>
                    </div>
                    <div class="modal-header">
                        <h4 class="modal-title" id="smallModalLabel">Nueva Orden de Compra</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">N° de Orden:</label>
                                    <div class="form-line">
                                        <input type="text" id="nro_ordenModal" class="form-control int-">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="">Fecha:</label>
                                    <div class="input-group">
                                   <span class="input-group-addon">
                                       <i class="material-icons">date_range</i>
                                   </span>
                                        <div class="form-line">
                                            <input type="text" id="fechaModal" class="form-control date" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="orden">Proveedor:</label>
                                    <select name="proveedores" id="proveedores" class="form-control show-tick">
                                        <option>Seleccione..</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Rif:</label>
                                    <div class="form-line">
                                        <input type="text" id="rifModal" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Factura N°:</label>
                                    <div class="form-line">
                                        <input type="text" id="nro_facturaModal" class="form-control int">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="">Fecha:</label>
                                    <div class="input-group">
                                   <span class="input-group-addon">
                                       <i class="material-icons">date_range</i>
                                   </span>
                                        <div class="form-line">
                                            <input type="text" id="fechaFacturaModal" class="form-control date" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Control N°:</label>
                                    <div class="form-line">
                                        <input type="text" id="nro_controlModal" class="form-control int">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="">Total:</label>
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" id="totalModal"class="form-control decimal" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="guardarModal" class="btn btn-primary waves-effect">
                            <i class="material-icons">save</i>
                            <span>GUARDAR</span>
                        </button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                            <i class="material-icons">cancel</i>
                            <span>Cancelar</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>

    {{--Fin - Modal--}}
@endsection

@section('js')
    <script>
        $(function(){
            $('.int').inputmask('numeric', { placeholder: '0' });
            //$('#rifModal').inputmask('J-99999999-9', { placeholder: "J-00000000-0"});
            $('.date').inputmask('dd-mm-yyyy', { placeholder: '__-__-____' });
            $('.decimal').inputmask('decimal', { radixPoint: ",", groupSeparator: ".", autoGroup: true, digits: 6, placeholder: "0.000000", numericInput: true});
        })

        $('#basic_checkbox_2').change(function (){
            if(this.checked){
                $('#orden').prop('disabled',true);
            }else{
                $('#orden').prop('disabled',false);
            }
        })

        function stop(e) {
            e.preventDefault()
        }

        /*if($('#basic_checkbox_2').change === true ){
            alert('checked')
            $('#orden').prop('disabled',true);
        */

        function attrLote(){
            $("#inc_por").selectpicker('val','unidad');
            $("#cantidad_div").addClass('hidden');
            $("#cantidad").val(0);
            $("#inc_div").removeClass('col-md-offset-4').addClass('col-md-offset-8');
            $("#separador").addClass("hidden");
            $("#cod-lote").addClass("hidden");
        }

        //Cargar el select con los elementos
        //fillSelect("elementos",'#elementos');

        //Cargar el select con los departamentos
        $('#direccion').change(function () {
            dep = fillSelect("departamentos/"+$(this).val(),"#departamento","#departamentos_div",'un departamento');
        })

        //Cargar el select con los tipo_movimientos
        //fillSelect("tipo_movimientos","#t_movimiento")

        //Cambia estado de div inc_por
        $("#inc_por").change(function () {
            if($(this).val() == "lote"){
                $("#cantidad_div").removeClass('hidden');
                $("#inc_div").removeClass('col-md-offset-8').addClass('col-md-offset-4');
                $("#cantidad").val(0);
                $("#cantidad").focus();
                $("#separador").removeClass("hidden");
                $("#cod-lote").removeClass("hidden");
                $("#lote_input").val("hidden");
            }else{
                attrLote()
            }
        })
        //fin - inc_por

        $("#elementos").change(function () {

            attrLote();
            cantidad = 0;

            if($("#cantidad").val()){
                var cantidad = $("#cantidad").val()
            }

            $.ajax({
                method: 'get',
                url: 'bien/' + $(this).val() + "/cantidad/" + cantidad,
                data : {_token: "{{ csrf_token() }}" },
                dataType: 'JSON',
            }).done(function (e) {
                //alert(e.bien)
                $("#codigo").html(e.bien);
                $("#codigo_input").val(e.bien);
                bien = e.bien;
                $("#cod-lote").html(e.lote);
                $("#codido_lote").val(e.lote);
            }).fail(function () {
                alert("NO SE HAN PODIDO CARGAR LOS ELEMENTOS")
            })
        })

        var proveedores = [];

        //PROVEEDORES
        $.ajax({
            method: 'POST',
            url: "../proveedorJson",
            data : {_token : "{{ csrf_token() }}" },
            dataType: 'JSON',
        }).done(function (x) {
            proveedores = x;

            $.each( x, function(i,v){
                var option = '<option value="'+v.id+'">'+v.nombre+'</option>';
                $("#proveedores").append(option);
            })
            $("#proveedores").selectpicker('refresh');
        }).fail(function (x) {
            console.log(x)
            alert("NO SE HAN PODIDO CARGAR LOS PROVEEDORES")
        });

        $('#proveedores').change(function (e) {
            console.log('PROVEEDOR',proveedores);

            let proveedor = proveedores.filter( function(p){
                return p.id == $('#proveedores').val();
            });

            // $('#rifModal').val(proveedor.rif)
        });

        $('#guardarModal').click(function () {

                let data = {
                    _token : "{{ csrf_token() }}",
                    numero: $('#nro_ordenModal').val(),
                    fecha: $('#fechaModal').val(),
                    proveedores: $('#proveedores').val(),
                    f_factura: $('#fechaFacturaModal').val(),
                    nro_factura: $('#nro_facturaModal').val(),
                    nro_control: $('#nro_controlModal').val(),
                    total: $('#totalModal').val(),
                };

                $.ajax({
                    method: 'POST',
                    url: "../ordenAjax",
                    data: data,
                    dataType: 'JSON',
                }).done(function (x) {
                    $('#modalMsg').addClass('alert-success').append('Se ha guardado la orden de compra');
                    $('#modalMsgHeader').removeClass('hidden');
                    setTimeout(function () {
                        $('#modalMsgHeader').addClass('hidden');
                        $('#modalMsg').append('');
                        // $("#smallModal").modal('hide');
                    },4000);
                    $('#nro_ordenModal').val('')
                    $('#fechaModal').val('')
                    $('#proveedores').val('')
                    $('#rifModal').val('')
                    $('#fechaFacturaModal').val('')
                    $('#nro_facturaModal').val('')
                    $('#nro_controlModal').val('')
                    $('#totalModal').val('')
                    getOrdenes();
                }).fail(function () {
                    $('#modalMsg').addClass('alert-danger').append('Ya existe una orden de compra con ese N° en el año indicado');
                    $('#modalMsgHeader').removeClass('hidden');
                    setTimeout(function () {
                        $('#modalMsgHeader').addClass('hidden');
                        $('#modalMsg').append('');
                    },4000);
                })
            }
        );

        $('#cantidad').change(function () {
            $.ajax({
                method: 'get',
                url: 'bien/' + $("#elementos").val() + "/cantidad/" + $('#cantidad').val(),
                data : {_token :$('#token').val()},
                dataType: 'JSON',
            }).done(function (e) {
                $("#codigo").html(e.bien);
                $("#cod-lote").html(e.lote);
            }).fail(function () {
                alert("NO SE HAN PODIDO CARGAR LOS ELEMENTOS")
            })
        })

        $('#t_movimiento').change(function () {
            if ($(this).val() == 11){
                $('#orden').val(0);
                $('#orden').selectpicker('refresh');
                $('#orden').prop('disabled',true);
            }else{
                $('#orden').prop('disabled',false);
            }
        })

        $('.js-modal-buttons .btn').on('click', function () {
            var color = $(this).data('color');
            $('#mdModal .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
            $('#mdModal').modal('show');
        });

        function getOrdenes() {
            $.ajax({
                method: 'POST',
                url: "../ordenesAjax",
                data : {_token : "{{ csrf_token() }}" },
                dataType: 'JSON',
            }).done(function (x) {
                proveedores = x;
                $.each( x, function(i,v){
                    let ano = v.fecha.split('-')
                    var option = '<option value="'+v.id+'">'+v.numero+'-'+ano[0]+'</option>';
                    $("#orden").append(option);
                })
                $("#orden").selectpicker('refresh');
            }).fail(function (x) {
                console.log(x)
                alert("NO SE HAN PODIDO CARGAR LAS ORDENES")
            })
        }

        getOrdenes();
    </script>
@endsection