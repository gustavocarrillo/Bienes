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
<div class="col-lg-12 col-md-2">
    {{--<div class="saltopagina"></div>--}}
    <div>
        <h4 style="text-align: center"><strong>DEPARTAMENTO DE BIENES MUNICIPALES</strong></h4>
        <h5 style="text-align: center"><strong>RELACION DEL MOVIMIENTO DE BIENES MUEBLES</strong></h5>
        <p style="text-align: right; font-size: 12px"><strong>Formulario BM-2</strong></p>
        <p></p>
        <table style="font-size: 11px">
            <tr>
                <td>
                    <p>Estado: <strong>Monagas</strong></p>
                    <p>Municipio: <strong>Maturín</strong></p>
                    <p>Dirección: <strong>Calle Azcúe, Edificio Palacio Municipal, Maturín Estado Monagas. </strong></p>
                </td>
                <td style="padding-left: 10px">
                    <p>Dependencia o unidad primaria: <strong>ALCALDÍA DE MATURÍN</strong></p>
                    <p>Servicio:<strong> @if($data['direccion']) {{ $data['direccion']['descripcion'] }} @else {{ $data['departamento']['descripcion'] }} @endif</strong></p>
                    <p>Unida de trabajo o dependencia:<strong>@if($data['direccion']) {{ $data['direccion']['descripcion'] }} @else {{ $data['departamento']['descripcion'] }} @endif</strong></p>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <div class="">
        <div class="">
            <div class="" style="max-width: 1000px">
                <p><strong>PERIODO DE LA CUENTA: {{ $data['periodo'] }}</strong></p>
                <table class="table table-bordered table-condensed" style="font-size: 10px; border: black 1px solid">
                    <thead>
                    <tr>
                        <th colspan="5" style="text-align: center; font-size: 13px"><strong>En el mes de la Cuenta ha ocurrido el siguiente movimiento en los Bienes a cargo de esta Dependencia:</strong></th>
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
                    {{ $n = 1 }}{{ $total_incorp = 0 }}{{ $total_desincorp = 0}}
                    @foreach($data['movimientos'] as $mov)
                        <tr>
                            <td width="5%">{{ $n }}</td>
                            <td width="15%">{{ $mov->_bien->codigo }}</td>
                            <td width="50%">{{ $mov->_bien->descripcion }}</td>
                            <td width="15%">@if($mov->tipo === 1){{ number_format($mov->_bien->valor_actual ,5,',','.') }} <span style="display: none">{{ $total_incorp += $mov->_bien->valor_actual }}</span>@endIf</td>
                            <td width="15%">@if($mov->tipo === 0){{ number_format($mov->_bien->valor_actual ,5,',','.')}} <span style="display: none">{{ $total_desincorp += $mov->_bien->valor_actual }}</span>@endIf</td>
                        </tr>
                        {{ $n++ }}
                    @endforeach
                    <tr style="background-color: #b8e834">
                        <td colspan="3"><strong>SUB TOTALES:</strong></td>
                        <td><strong>{{ number_format($total_incorp ,5,',','.') }}</strong></td>
                        <td><strong>{{ number_format($total_desincorp ,5,',','.') }}</strong></td>
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
</body>
</html>

