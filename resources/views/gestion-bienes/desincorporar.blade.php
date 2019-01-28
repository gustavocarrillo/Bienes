@extends('plantilla')

@section('contenido')
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="header">
                <h2><b>Desincorpación de BIEN: {{ $bien->codigo }}</b></h2>
            </div>
            <div class="body">
                <form action="{{ route('bienes.desincorporado',$bien->id) }}" method="post">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" id="token" value="{{ $bien->id }}">
                    {{ method_field('put') }}
                    <div class="row clearfix">
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="orden">Tipo de desincorporacón:</label>
                                <select name="movimiento" id="movimiento" class="form-control show-tick" data-live-search="true">
                                    <option value="">Seleccione..</option>
                                    @foreach($tipos as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->codigo.' -- '.$tipo->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="traspaso" class="hidden">
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
                                <div class="form-group hidden" id="departamentos_div">
                                    <div class="form-group">
                                        <label for="orden">Departamento</label>
                                        <select name="departamento" id="departamento" class="form-control show-tick" data-live-search="true">
                                            <option value="" selected>Seleccione un departamento</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Fecha:</label>
                                <div class="form-line">
                                    <input type="text" name="fecha" class="form-control date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="orden">Observación:</label>
                                <div class="form-line">
                                    <textarea name="observacion" id="" cols="30" rows="4" class="form-control show-tick"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="form-group ">
                            <input type="submit" class="form-control btn btn-primary" value="Desincorporar">
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
            $('.date').inputmask('dd-mm-yyyy', { placeholder: '__-__-____' });
        })
        //Cargar el select con los departamentos
        $('#direccion').change(function () {
            dep = fillSelect("../departamentos/"+$(this).val(),"#departamento","#departamentos_div",'un departamento');
        })

        $('#movimiento').change(function () {
            if ($("#movimiento").val() === "18") {
                $("#traspaso").removeClass('hidden');
            } else {
                $("#traspaso").addClass('hidden');
            }
        })
    </script>
@endsection