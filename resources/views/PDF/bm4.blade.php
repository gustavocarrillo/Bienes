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
        <h5 style="text-align: center"><strong>RESUMEN DE LA CUENTA DE BIENES MUEBLES </strong></h5>
        <h5 style="text-align: center"><strong>EN CADA UNIDAD DE TRABAJO</strong></h5>
        <p style="text-align: right; font-size: 12px"><strong>Formulario BM-4</strong></p>
        <p></p>
        <table style="font-size: 11px">
            <tr>
                <td>
                    <p>Estado: <strong>Monagas</strong></p>
                    <p>Municipio: <strong>Maturín</strong></p>
                    {{--<p>Dirección: <strong>Calle Azcúe, Edificio Palacio Municipal, Maturín Estado Monagas. </strong></p>--}}
                </td>
            </tr>
        </table>
    </div>
    <div class="">
        <div class="">
            <div class="" style="max-width: 1000px">
                <p><strong>CORRESPONDIENTE AL MES DE: {{ strtoupper($data['mes']) }}</strong> <span class="pull-right"><strong>AÑO: {{ $data['ano'] }}</strong></span></p>
                <table class="table table-bordered table-condensed" style="font-size: 10px; border: black 1px solid">
                    <thead>
                        <tr>
                            <th></th>
                            <th>EXISTENCIA INICIAL</th>
                            <th>INCORPORACION</th>
                            <th>DESINCORPORACION</th>
                            <th>EXISTENCIA FINAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>EXISTENCIA ANTERIOR</td>
                            <td>{{ number_format($data['existenciaAnterior'] ,5,',','.') }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>INCORPORACION EN EL MES DE LA CUENTA </td>
                            <td></td>
                            <td>{{ number_format($data['incorporacion'] ,5,',','.') }}</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                DESINCOPORACIONES EN EL MES DE LA CUENTA POR TODOS
                                LOS CONCEPTOS, CON EXCEPCION DE 60 "FALTANTE POR INVESTIGAR
                            </td>
                            <td></td>
                            <td></td>
                            <td>{{ number_format($data['desincorporacion'] ,5,',','.') }}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                DESINCOPORACIONES EN EL MES DE LA CUENTA POR EL
                                CONCEPTOS 60 "FALTANTE POR INVESTIGAR
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>EXISTENCIA FINAL </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ number_format($data['total'] ,5,',','.') }}</td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tr>
                        <td style="padding-left: 10px">
                            <p>RESUMEN DE CUENTA DE LA DIRECCION: <strong>{{ $data['direccion']['descripcion'] }}</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left: 10px">
                            <p>FIRMA DEL JEFE RESPONSABLE DE LA UNIDAD DE TRABAJO O DEPARTAMENTO</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
{{--<div class="saltopagina"></div>--}}
</body>
</html>

