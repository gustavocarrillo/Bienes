@extends('plantilla')

@section('contenido')
    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
        <div class="card">
            <div class="header">
                <h2><b>Incorporacion de Bienes</b></h2>
            </div>
            <div class="body">
                <form action="">
                    <input type="hidden" value="{{ csrf_token() }}" id="token">
                    <h2 class="card-inside-title">Seleccionar Elemento</h2>
                    <div class="row clearfix">
                        <div class="col-sm-12">
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
                                            <input type="text" name="cantidad" id="cantidad" class="form-control" placeholder="" maxlength="6"/>
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
                                            <input type="text" name="orden" id="orden" class="form-control" placeholder="" value="" maxlength="4" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-offset-2">
                                    <div class="form-group">
                                        <label for="orden">Valor del Bien:</label>
                                        <div class="form-line">
                                            <input type="text" name="valor_bien" id="valor_bien" class="form-control" maxlength="16"/>
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
                                            <input type="text" name="valor_actual_bien" id="valor_actual_bien" class="form-control" maxlength="16"/>
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
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $(function(){
        $('#cantidad').inputmask('numeric', { placeholder: '0' });
        $('#orden').inputmask('numeric', { placeholder: '0' });
        $('#f_incorp').inputmask('dd/mm/yyyy', { placeholder: '__/__/____' });
        $('#valor_bien').inputmask('decimal', { radixPoint: ",", groupSeparator: ".", autoGroup: true, placeholder: "0.00", numericInput: true});
        $('#valor_actual_bien').inputmask('decimal', { radixPoint: ",", groupSeparator: ".", autoGroup: true, placeholder: "0.00", numericInput: true});
    })

    //Cargar el select con los elementos
    $.ajax({
        method: 'POST',
        url: 'elementos',
        data : {_token :$('#token').val()},
        dataType: 'JSON',
    }).done(function (elms) {
        $.each( elms, function(i,v){
            var option = '<option value="'+v.id+'">'+v.codigo+' - '+v.descripcion+'</option>';
            $("#elementos").append(option);

        })
        $("#elementos").selectpicker('refresh');
    }).fail(function () {
        alert("NO SE HAN PODIDO CARGAR LOS ELEMENTOS")
    })
    //fin - elementos

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

</script>
@endsection