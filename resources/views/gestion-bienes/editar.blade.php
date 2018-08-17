@extends('plantilla')

@section('contenido')
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="header">
                <h2><b>Edición de BIEN: {{ $bien->codigo }}</b></h2>
            </div>
            <div class="body">
                <form action="{{ route('bienes.update',$bien->id ) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="row clearfix">
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="numero">Descripcion:</label>
                                <div class="form-line">
                                    <input type="text" name="descripcion" class="form-control" value="{{ $bien->descripcion }}" maxlength="65">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha de Incorporación:</label>
                                <div class="form-line">
                                    <input type="text" name="fecha_incorp" class="form-control date" value="{{ date('d-m-Y',strtotime($bien->fecha_incorp)) }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="total">Valor:</label>
                                <div class="form-line">
                                    <input type="text" name="valor" id="valor" class="form-control decimal" value="{{ number_format($bien->valor,2,',','.') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="total">Valor Actual:</label>
                                <div class="form-line">
                                    <input type="text" name="valor_actual" id="total" class="form-control decimal" value="{{ number_format($bien->valor_actual,2,',','.') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="orden">Nro de Orden:</label>
                                <select name="nro_orden" id="nro_orden" class="form-control show-tick">
                                    <option value="">Seleccione..</option>
                                    @foreach($ordenes as $orden)
                                        <option value="{{ $orden->id }}" @if($bien->nro_orden == $orden->id) selected @endIf>{{ $orden->numero }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="orden">Elemento:</label>
                                <select name="elemento" id="elemento" class="form-control show-tick">
                                    <option value="">Seleccione..</option>
                                    @foreach($elementos as $elemento)
                                        <option value="{{ $elemento->id }}" @if($bien->elemento == $elemento->id) selected @endIf>{{ $elemento->codigo.' -- '.$elemento->descripcion  }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="form-group ">
                            <input type="submit" class="form-control btn btn-primary" value="Modificar">
                        </div>
                    </div>
                </form>
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

    $('#total').addClass('decimal');
    $(function(){
        $('.int').inputmask('numeric', { placeholder: '' });
        $('#rifModal').inputmask('J-99999999-9', { placeholder: "J-00000000-0"});
        $('.date').inputmask('dd-mm-yyyy', { placeholder: '__-__-____' });
        $('.decimal').inputmask('decimal', {
            radixPoint: ",",
            groupSeparator: ".",
            autoGroup: true,
            //digits: 0,
            groupSize: 3,
            placeholder: "0.00",
            //numericInput: true
        });
    })

    /*$.ajax({
        method: 'POST',
        url: "proveedorJson",
        data : {_token : "{{ csrf_token() }}" },
        dataType: 'JSON',
    }).done(function (x) {
        $.each( x, function(i,v){
            var option = '<option value="'+v.id+'">'+v.nombre+'</option>';
            $("#proveedores").append(option);
        })
        $("#proveedores").selectpicker('refresh');
    }).fail(function () {
        alert("NO SE HAN PODIDO CARGAR LOS PROVEEDORES")
    })
*/
    /*function attrLote(){
        $("#inc_por").selectpicker('val','unidad');
        $("#cantidad_div").addClass('hidden');
        $("#cantidad").val(0);
        $("#inc_div").removeClass('col-md-offset-4').addClass('col-md-offset-7');
        $("#separador").addClass("hidden");
        $("#cod-lote").addClass("hidden");
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
            $("#cantidad").val(0);
            $("#cantidad").focus();
            $("#separador").removeClass("hidden");
            $("#cod-lote").removeClass("hidden");
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
            data : {_token :$('#token').val()},
            dataType: 'JSON',
        }).done(function (e) {
            $("#codigo").html(e.bien);
            bien = e.bien;
            $("#cod-lote").html(e.lote);
        }).fail(function () {
            alert("NO SE HAN PODIDO CARGAR LOS ELEMENTOS")
        })
    })

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

    $('.js-modal-buttons .btn').on('click', function () {
        var color = $(this).data('color');
        $('#mdModal .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
        $('#mdModal').modal('show');
    });*/
</script>
@endsection