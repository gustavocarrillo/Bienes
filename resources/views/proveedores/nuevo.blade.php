@extends('plantilla')

@section('contenido')
    <div class="col-lg-7 col-md-7">
        <div class="card">
            <div class="header">
                <h2><b>Nuevo Proveedor</b></h2>
            </div>
            <div class="body">
                <form action="{{ route('prov-guardar') }}" method="post" id="form_validation">
                    <div class="row clearfix">
                        <div class="col-md-3">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="">Rif:</label>
                                <div class="form-line">
                                    <input type="text" name="rif" id="rif" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="">Nombre:</label>
                                <div class="form-line">
                                    <input type="text" name="nombre" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 p-t-10 p-b-8">
                            <button class="btn btn-primary waves-effect">
                                <i class="material-icons">save</i>
                                <span>GUARDAR</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @include('flash::message')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="list-style: none">
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
            $('#rif').inputmask('J-99999999-9', { placeholder: "J-00000000-0"});
        })
    </script>
@endsection