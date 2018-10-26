@extends('plantilla')

@section('contenido')
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="header">
                <h2><b>Modificar Direccion</b></h2>
            </div>
            <div class="body">
                <form action="{{ route('direccion.update', $direccion->id) }}" method="post">
                    {{ method_field('put')  }}
                    {{ csrf_field() }}
                    <div class="row clearfix">
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="rif">Codigo:</label>
                                <div class="form-line">
                                    <input type="text" name="codigo" class="form-control codigo" value="{{ $direccion->codigo  }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nombre">descripcion:</label>
                                <div class="form-line">
                                    <input type="text" name="descripcion" class="form-control" value="{{ $direccion->descripcion  }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Responsable:</label>
                                <div class="form-line">
                                    <input type="text" name="responsable" class="form-control" value="{{ $direccion->responsable  }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Cargo:</label>
                                <div class="form-line">
                                    <input type="text" name="cargo_responsable" class="form-control" value="{{ $direccion->cargo_responsable  }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Resolución:</label>
                                <div class="form-line">
                                    <input type="text" name="resolucion" class="form-control" value="{{ $direccion->resolucion  }}">
                                </div>
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
    $(function(){
        $('.int').inputmask('numeric', { placeholder: '' });
        $('.codigo').inputmask('99', { placeholder: ""});
        $('.date').inputmask('dd/mm/yyyy', { placeholder: '__/__/____' });
        $('.decimal').inputmask('decimal', { radixPoint: ",", groupSeparator: ".", autoGroup: true, placeholder: "0.00", numericInput: true});
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