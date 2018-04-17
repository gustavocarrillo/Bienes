@extends('plantilla')

@section('contenido')
    <div class="col-lg-7 col-md-7">
        <div class="card">
            <div class="header">
                <h2><b>Incorporacion de Bienes</b></h2>
            </div>
            <div class="body">
                    <input type="hidden" value="{{ csrf_token() }}" id="token">
                    <h2 class="card-inside-title">Seleccionar Elemento</h2>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="p-b-15">
                                <select name="elementos" id="elementos" class="form-control show-tick" data-live-search="true">
                                    <option value="" selected>Seleccione un elemento</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-md-offset-7" id="inc_div">
                                    <div class="form-group">
                                        <label for="inc_por">Incorporación por: </label>
                                        <select name="inc_por" id="inc_por" class="form-control show-tick">
                                            <option value="unidad">Unidad</option>
                                            <option value="lote">Lote</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 hidden" id="cantidad_div">
                                    <div class="form-group">
                                        <label for="cantidad">Cantidad</label>
                                        <div class="form-line">
                                            <input type="text" name="cantidad" id="cantidad" class="form-control int" placeholder="" maxlength="6"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2 class="card-inside-title">Datos de Incorporación</h2>
                            <div class="row">
                                <div class="col-md-offset-6 col-md-7 p-r-5">
                                    <div class="form-group">
                                        <label for="inc_por">Codigo: </label>
                                        <span id="codigo">00-0-000-0000</span><span id="separador" class="hidden"> --- </span><span id="cod-lote" class="hidden">00-0-000-0000</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="orden">Orden de Compra:</label>
                                        <div class="form-line">
                                            <input type="text" name="orden" id="orden" class="form-control int" placeholder="" value="" maxlength="4" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="p-t-30">
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#smallModal">Nueva</button>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-offset-2">
                                    <div class="form-group">
                                        <label for="orden">Valor del Bien:</label>
                                        <div class="form-line">
                                            <input type="text" name="valor_bien" id="valor_bien" class="form-control decimal" maxlength="16"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-sm-4">
                                    <label>Fecha de Incorporación</label>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                        <div class="form-line">
                                            <input type="text" name="f_incorp" id="f_incorp"class="form-control date" placeholder="Ejem: 30/07/2016">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4  col-md-offset-2">
                                    <div class="form-group">
                                        <label for="valor_actual_bien">Valor actual del Bien:</label>
                                        <div class="form-line">
                                            <input type="text" name="valor_actual_bien" id="valor_actual_bien" class="form-control decimal" maxlength="16"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2 class="card-inside-title">Destino</h2>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <select name="departamento" id="departamento" class="form-control show-tick" data-live-search="true">
                                                <option value="" selected>Seleccione un elemento</option>
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
                                                <option value="" selected>Seleccione un elemento</option>
                                            </select>
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
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    {{--Modal--}}
    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
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
                                       <input type="text" id="fechaModal"class="form-control date" placeholder="">
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Proveedor:</label>
                                <div class="form-line">
                                    <input type="text" id="proveedorModal" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Rif:</label>
                                <div class="form-line">
                                    <input type="text" id="rifModal" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Factura N°:</label>
                                <div class="form-line">
                                    <input type="text" id="nro_ordenModal" class="form-control int">
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
    </div>
    {{--Fin - Modal--}}
@endsection

@section('js')
<script>
    $(function(){
        $('.int').inputmask('numeric', { placeholder: '0' });
        $('#rifModal').inputmask('J-99999999-9', { placeholder: "J-00000000-0"});
        $('.date').inputmask('dd/mm/yyyy', { placeholder: '__/__/____' });
        $('.decimal').inputmask('decimal', { radixPoint: ",", groupSeparator: ".", autoGroup: true, placeholder: "0.00", numericInput: true});
    })

    function fillSelect(url,selector){
        $.ajax({
            method: 'POST',
            url: url,
            data : {_token :$('#token').val()},
            dataType: 'JSON',
        }).done(function (x) {
            $.each( x, function(i,v){
                var option = '<option value="'+v.id+'">'+v.codigo+' - '+v.descripcion+'</option>';
                $(selector).append(option);

            })
            $(selector).selectpicker('refresh');
        }).fail(function () {
            alert("NO SE HAN PODIDO CARGAR LOS ELEMENTOS")
        })
    }

    //Cargar el select con los elementos
    fillSelect("elementos",'#elementos');

    //Cargar el select con los departamentos
    fillSelect("departamentos","#departamento");

    //Cargar el select con los tipo_movimientos
    fillSelect("tipo_movimientos","#t_movimiento")

    //Cambia estado de div inc_por
    $("#inc_por").change(function () {
        if($(this).val() == "lote"){
            $("#cantidad_div").removeClass('hidden');
            $("#inc_div").removeClass('col-md-offset-7').addClass('col-md-offset-4');
            $("#cantidad").focus();
            $("#separador").removeClass("hidden");
            $("#cod-lote").removeClass("hidden");
        }else{
            $("#cantidad_div").addClass('hidden');
            $("#inc_div").removeClass('col-md-offset-4').addClass('col-md-offset-7');
            $("#separador").addClass("hidden");
            $("#cod-lote").addClass("hidden");
        }
    })
    //fin - inc_por

    $('.js-modal-buttons .btn').on('click', function () {
        var color = $(this).data('color');
        $('#mdModal .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#mdModal').modal('show');
    });

</script>
@endsection