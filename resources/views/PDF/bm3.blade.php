<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{--<meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap Core Css -->
    <link href="{{ asset("plugins/bootstrap/css/bootstrap.css") }}" rel="stylesheet">
    <link href="{{ asset("css/style.css") }}" rel="stylesheet">--}}
    <style>
        .saltopagina{page-break-after:always;}

        table.data , table.data th, table.data td {
            font-size: 9px;
            border: 1px solid black;
            border-collapse: collapse;
        }

        table.firma {
            text-align: center;
            font-size: 11px;
        }

    </style>
</head>
<body style="background-color: white">
<div class="col-lg-12 col-md-2">
    {{--<div class="saltopagina"></div>--}}
    <div>
        <h4 style="text-align: center"><strong>DEPARTAMENTO DE BIENES MUNICIPALES</strong></h4>
        <h5 style="text-align: center"><strong>RELACION DE BIENES MUEBLES FALTANTES</strong></h5>
        <p style="text-align: right; font-size: 12px"><strong>Formulario BM-3</strong></p>
        <p></p>
        <table style="font-size: 11px">
            <tr>
                <td>
                    <p>Estado: <strong>Monagas</strong></p>
                    <p>Municipio: <strong>Maturín</strong></p>
                    <p>Dirección: <strong>Calle Azcúe, Edificio Palacio Municipal, Maturín Estado Monagas. </strong></p>
                </td>
                <td style="padding-left: 60px">
                    <p>Dependencia o unidad primaria: <strong>ALCALDÍA DE MATURÍN</strong></p>
                    <p>Servicio:<strong> @if(isset($data['direccion'])) {{ $data['direccion']['descripcion'] }} @else {{ $data['departamento']['_direccion']['descripcion'] }} @endif</strong></p>
                    <p>Unida de trabajo o dependencia:<strong>@if(isset($data['direccion'])) {{ $data['direccion']['descripcion'] }} @else {{ $data['departamento']['descripcion'] }} @endif</strong></p>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <div class="">
        <div class="">
            <div class="data" style="">
{{--                <p><strong>PERIODO DE LA CUENTA: {{ $data['periodo'] }}</strong></p>--}}
                <table class="data" style="width: 100%">
                    <thead>
                    <tr>
{{--
                        <th colspan="4" style="text-align: center; font-size: 13px"><strong>En el mes de la Cuenta ha ocurrido el siguiente movimiento en los Bienes a cargo de esta Dependencia:</strong></th>
--}}
                        <th colspan="4" style="font-size: 13px"><strong>Periodo: {{ $data['periodo'] }}</strong></th>
                    </tr>
                    <tr>
                        <th>N°</th>
                        <th>Codigo</th>
                        <th>Descripcion</th>
                        <th>Valor (Bs)</th>
{{--                        <th>Desincorporaciones (Bs)</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $n = 1;
                    @endphp

                    @foreach($data['bienes'] as $bien)
                        <tr>
                            <td width="5%">{{ $n }}</td>
                            <td width="15%">{{ $bien->codigo }}</td>
                            <td width="50%">{{ $bien->descripcion }}</td>
                            <td width="15%">{{ $bien->valor_actual }}</td>
{{--                            <td width="15%"></td>--}}
                        </tr>

                        @php
                            $n++;
                        @endphp

                    @endforeach
                    <tr style="background-color: #b8e834">
                        <td colspan="3"><strong>TOTAL:</strong></td>
                        <td><strong>{{ number_format($data['total'] ,6,',','.') }}</strong></td>
                    </tr>
                    </tbody>
                </table>
                <div style="margin-top: 10px;position: relative">
                    <table class="" style="font-size: 11px; border: black 1px solid; width: 500px; position: absolute; top: 0; left: 0">
                        <tr>
                            <td>Observación: {{ $data['observacion'] }}</td>
                        </tr>
                        <tr>
                            <td>Constancia: {{ $data['constancia'] }}</td>
                        </tr>
                    </table>

                    <table class="table table-bordered table-condensed" style="font-size: 11px; border: black 1px solid; width: 400px; position: absolute; top: 0; right: 0">
                        <tr>
                            <td>Faltante determinado por: <strong>Departamento de Bienes</strong></td>
                        </tr>
                        <tr>
                            <td>Cargo que desempeña: <strong>Personal de Bienes</strong></td>
                        </tr>
                        <tr>
                            <td>Dependencia de la cual esta adscrito: <strong>Dirección de Administracion</strong></td>
                        </tr>
                        <tr>
                            <td style="height: 70px">Firma del Jefe de unidad de trabajo</td>
                        </tr>
                    </table>
                </div>
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

