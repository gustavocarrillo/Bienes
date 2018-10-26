@extends('plantilla')

@section('contenido')
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h2><b>Reportes</b></h2>
            </div>
            <div class="body">
                <form action="" method="post" class="form-inline">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    {{ method_field('put') }}
                    <div class="row clearfix">
                        <div class="col-md-2 col-lg-2">
                            <div class="form-group">
                                <label for="orden">Tipo de Reporte:</label>
                                <select name="reporte" id="reporte" class="form-control">
                                    <option value="">Seleccione..</option>
                                    <option value="1">BM1</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 hidden" id="f_desde_div">
                            <div class="form-group">
                                <label for="orden">Desde:</label>
                                <input type="text" name="f_desde" class="form-control form-line">
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 hidden" id="f_hasta_div">
                            <div class="form-group">
                                <label for="orden">Hasta:</label>
                                <input type="text" name="f_hasta" class="form-control form-line">
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-5">
                            <div class="form-group">
                                <label for="orden">Dirección:</label>
                                <select name="movimiento" id="movimiento" class="form-control">
                                    <option value="">Seleccione..</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1 col-lg-1">
                            <div class="form-group m-t-25">
                                <input type="submit" class="btn btn-primary" value="Emitir">
                            </div>
                        </div>
                    </div>

                    {{--
                    <div class="row clearfix">
                        <div class="form-group ">
                            <input type="submit" class="form-control btn btn-primary" value="Desincorporar">
                        </div>
                    </div>--}}
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
    $('#reporte').change(function () {
        if($(this).val() == '1'){
            $('#f_desde_div').removeClass('hidden')
            $('#f_hasta_div').removeClass('hidden')
        }else{
            $('#f_desde_div').addClass('hidden')
            $('#f_hasta_div').addClass('hidden')
        }
    })
</script>
@endsection