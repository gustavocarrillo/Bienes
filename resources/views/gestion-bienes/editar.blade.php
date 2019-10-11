@extends('plantilla')

@section('contenido')
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="header">
                <h2><b>Edición de BIEN: {{ $bien->codigo }}</b></h2>
            </div>
            <div class="body">
                <form action="{{ route('bienes.update',$bien->id ) }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    {{ method_field('put') }}
                    <div class="row clearfix">
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="numero">Descripcion:</label>
                                <div class="form-line">
{{--
                                    <input type="text" name="descripcion" class="form-control" value="{{ $bien->descripcion }}" maxlength="65">
--}}
                                    <textarea name="descripcion" class="form-control"  id="" rows="">{{ $bien->descripcion }}</textarea>
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
                                    <input type="text" name="valor" id="valor" class="form-control decimal" value="{{ $bien->valor }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="total">Valor Actual:</label>
                                <div class="form-line">
                                    <input type="text" name="valor_actual" id="total" class="form-control decimal" value="{{ $bien->valor_actual }}">
                                </div>
                            </div>
                            {{--<div class="form-group">
                                <label for="orden">Nro de Orden:</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="nro_orden" value="{{ $bien->nro_orden }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="orden">Dirección:</label>
                                <select name="direccion" id="direccion" class="form-control show-tick">
                                    <option value="">Seleccione..</option>
                                    @foreach($direcciones as $direccion)
                                        <option value="{{ $direccion->id }}" @if($bien->direccion == $direccion->id) selected @endIf>{{ $direccion->codigo.' -- '.$direccion->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group @if(count($departamentos) == 0) hidden @endif" id="departamentos_div">
                                <label for="orden">Departamento:</label>
                                <select name="departamento" id="departamento" class="form-control show-tick">
                                    <option value="">Seleccione..</option>
                                    @foreach($departamentos as $departamento)
                                        <option value="{{ $departamento->id }}" @if($bien->departamento == $departamento->id) selected @endIf>{{ $departamento->codigo.' -- '.$departamento->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>--}}
                            <div class="form-group">
                                <label for="">Foto</label>
                                <input type="file" name="foto">
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <a href="{{ route('bienes.show', $bien->id) }}" class="btn btn-primary" >Volver</a>
                            <input type="submit" class="btn btn-success pull-right" value="Modificar">
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
            $('.decimal').inputmask('decimal', { radixPoint: ",", groupSeparator: ".", autoGroup: true, digits: 6, placeholder: "0.000000", numericInput: false});

        })

        $('#direccion').change(function () {
            dep = fillSelect("../departamentos/"+$(this).val(),"#departamento","#departamentos_div",'un departamento');
        })
    </script>
@endsection