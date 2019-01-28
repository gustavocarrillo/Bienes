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
<div class="col-lg-6 col-md-6">
    {{--<div class="saltopagina"></div>--}}
    <div>
        <h3 style="text-align: center"><strong>DEPARTAMENTO DE BIENES MUNICIPALES</strong></h3>
        <h4 style="text-align: center"><strong>RELACION DEL MOVIMIENTO DE BIENES MUEBLES</strong></h4>
        <p style="text-align: right"><strong>Formulario BM-2</strong></p>
        <p></p>
        <p>Entidad propietaria: <strong>ALCALDÍA DE MATURÍN</strong></p>
        <p>Servicio:<strong> @if($unidad->_direccion) {{ $unidad_direccion->descripcion }} @else {{ $unidad->descripcion }} @endif</strong></p>
        <p>Unida de trabajo o dependencia:<strong> @if($unidad->_direccion) {{ $unidad->_direccion->descripcion }} @else {{ $unidad->descripcion }} @endif</strong></p>
        <p>Dirección o lugar: <strong>Calle Azcúe, Edificio Palacio Municipal, Maturín Estado Monagas. </strong></p>
        <p>PERIODO DE LA CUENTA:   @{{ mes }} @{{ año }}</p>
    </div>
    <br>
    <div class="">
        <div class="">
            <div class="" style="max-width: 750px">
                <table class="table table-bordered" style="font-size: 10px">
                    <thead>
                    <tr>
                        <th><strong>En el mes de la Cuenta ha ocurrido el siguiente movimiento en los Bienes a cargo de esta Dependencia:</strong></th>
                    </tr>
                    <tr>
                        <th>N°</th>
                        <th>Codigo</th>
                        <th>Descripcion</th>
                        <th>Incorporaciones (Bs)</th>
                        <th>Desincorporaciones (Bs)</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{ $n = 1 }}
                    @foreach($data as $bien)
                        <tr>
                            <td width="7%">{{ $n }}</td>
                            <td width="13%">{{ date('d-m-Y',strtotime($bien->fecha_incorp)) }}</td>
                            <td width="15%">{{ $bien->codigo }}</td>
                            <td width="50%">{{ $bien->descripcion }}</td>
                            <td width="15%">{{ $bien->valor_actual }}</td>
                        </tr>
                        {{ $n++ }}
                    @endforeach
                    <tr style="background-color: #b8e834">
                        <td colspan="3"><strong>SUB TOTALES:</strong></td>
                        <td><strong>{{ $total_incorp }}</strong></td>
                        <td><strong>{{ $total_desincorp }}</strong></td>
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
{{--<div class="saltopagina"></div>--}}
<table class="table-responsive" style="border: 0px">
    {{--<tr>
        <td class="align-center">DEPARTAMENTO DE BIENES</td>
        <td class="align-center">@if($data->_direccion) {{ $data->_direccion->descripcion }} @else {{ $data->descripcion }} @endif</td>
    </tr>--}}
    <tr>
        <td width="340px" class="align-center"><span>Quien entrega:</span></td>
        <td width="340px" class="align-center"><span>Quien recibe:</span></td>
    </tr>
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
    <tr>
        <td width="340px" class="align-center">{{ strtoupper($bienes_dep->cargo_responsable.' '.$bienes_dep->descripcion) }}</td>
        <td width="340px" class="align-center">{{ strtoupper($unidad->cargo_responsable.' '.$unidad->descripcion) }}</td>
    </tr>
    <tr>
        <td width="340px" class="align-center">{{ strtoupper($bienes_dep->responsable) }}</td>
        <td width="340px" class="align-center">{{ strtoupper($unidad->responsable) }}</td>
    </tr>
    <tr>
        <td width="340px" class="align-center"><strong>Resolucion N°:</strong>{{ strtoupper($bienes_dep->resolucion) }}</td>
        <td width="340px" class="align-center"><strong>Resolucion N°:</strong>{{ $unidad->resolucion }}</td>
    </tr>

</table>
</body>
</html>

