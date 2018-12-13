<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap Core Css -->
    <link href="{{ asset("plugins/bootstrap/css/bootstrap.css") }}" rel="stylesheet">
    <link href="{{ asset("css/style.css") }}" rel="stylesheet">
    <style>
        .saltopagina{page-break-after:always;}
    </style>
</head>
<body style="background-color: white">
<div class="align-center">
    <h4>Departamento de Bienes Municipales</h4>
    <h4>Inventarion de Bienes Muebles</h4>
</div>
<br>
<br>
<div class="col-lg-6 col-md-6">
    <{{--div>
        <p>Entidad propietaria: <strong>ALCALDIA DE MATURIN</strong></p>
        <p>Servicio:<strong> @if($data->_direccion) {{ $data->_direccion->descripcion }} @else {{ $data->descripcion }} @endif</strong></p>
        <p>Unida de trabajo o dependencia:<strong> @if($data->_direccion) {{ $data->_direccion->descripcion }} @else {{ $data->descripcion }} @endif</strong></p>
        <p>Dirección o lugar: <strong>Calle Azcúe, Edificio Palacio Municipal, Maturín Estado Monagas. </strong></p>
    </div>--}}
    <br>
    <div class="">
        <div class="">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>N°</th>
                        <th>Fecha</th>
                        <th>Codigo</th>
                        <th>Descripcion</th>
                        <th>Cantidad</th>
                        <th width="15%">Valor Unit.</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{ $total = 0 }}
                    {{ $n = 1 }}
                    @foreach($data as $bien)
                        <tr>
                            <td width="3%">{{ $n }}</td>
                            <td width="5%">{{ date('d-m-Y',strtotime($bien->fecha_incorp)) }}</td>
                            <td width="10%">{{ $bien->codigo }}</td>
                            <td width="30%">{{ $bien->descripcion }}</td>
                            <td width="30%">{{ $bien->count }}</td>
                            <td width="5%">{{ $bien->valor_actual }}</td>
                        </tr>
                        {{ $n++ }}
                        {{ $total+= $bien->valor_actual}}
                    @endforeach
                    <tr style="background-color: #b8e834">
                        <td colspan="5"><strong>TOTAL:</strong></td>
                        <td><strong>{{ $total }}</strong></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
</div>
<div class="saltopagina"></div>
<table class="table-responsive" style="border: 0px">
    {{--<tr>
        <td class="align-center">DEPARTAMENTO DE BIENES</td>
        <td class="align-center">@if($data->_direccion) {{ $data->_direccion->descripcion }} @else {{ $data->descripcion }} @endif</td>
    </tr>--}}
    <tr>
        <td><span style="color: white">texto</span></td>
        <td><span style="color: white">texto</span></td>
    </tr>
    <tr>
        <td><span style="color: white">texto</span></td>
        <td><span style="color: white">texto</span></td>
    </tr>
    <tr>
        <td class="align-center">_______________________</td>
        <td class="align-center">_______________________</td>
    </tr>
    {{-- <tr>
         <td width="340px" class="align-center">{{ strtoupper($bienes_dep->responsable) }}</td>
         <td width="340px" class="align-center">@if($data->_direccion) {{ $data->_direccion->responsable }} @else {{ $data->responsable }} @endif</td>
     </tr>
     <tr>
         <td width="340px" class="align-center">{{ strtoupper($bienes_dep->resolucion) }}</td>
         <td width="340px" class="align-center">@if($data->_direccion) {{ $data->_direccion->resolucion }} @else {{ $data->resolucion }} @endif</td>
     </tr>--}}
</table>
</body>
</html>

