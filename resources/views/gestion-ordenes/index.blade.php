@extends('plantilla')

@section('contenido')
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h2><b>listado Ordenes de Compra</b></h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <table class="table table-bordered">
                        <tr>
                            <th>Numero</th>
                            <th>Fecha</th>
                            <th>Proveedor</th>
                            <th>Fecha de Factura</th>
                            <th>Nro de Factura</th>
                            <th>Nro de Control</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                        @foreach($ordenes as $orden)
                            <tr>
                                <td>{{ $orden->numero }}</td>
                                <td>{{ $orden->fecha }}</td>
                                <td>{{ $orden->proveedor }}</td>
                                <td>{{ $orden->f_factura }}</td>
                                <td>{{ $orden->nro_factura }}</td>
                                <td>{{ $orden->nro_control }}</td>
                                <td>{{ $orden->total }}</td>
                                <td>
                                    <a href="{{ route('orden.show',$orden->id) }}" class="btn btn-primary">Ver</a>
                                    <a href="{{ route('orden.update',$orden->id) }}" class="btn btn-success">Editar</a>
                                    <a href="{{ route('orden.destroy',$orden->id) }}" class="btn btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
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
    $(function(){
        $('.int').inputmask('numeric', { placeholder: '' });
        $('#rifModal').inputmask('J-99999999-9', { placeholder: "J-00000000-0"});
        $('.date').inputmask('dd-mm-yyyy', { placeholder: '__-__-____' });
        $('.decimal').inputmask('decimal', { radixPoint: ",", groupSeparator: ".", autoGroup: true, placeholder: "0.00", numericInput: true});
    })

    $.ajax({
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