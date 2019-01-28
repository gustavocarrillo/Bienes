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
                                <select name="movimiento" id="movimiento" class="form-control show-tick">
                                    <option value="">Seleccione..</option>
                                    @foreach($movimientos as $movimiento)
                                        <option value="{{ $movimiento->id }}">{{ $movimiento->codigo.' -- '.$movimiento->descripcion }}</option>
                                    @endforeach
                                </select>
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
</script>
@endsection