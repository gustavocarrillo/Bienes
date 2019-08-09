<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
    <title>Document</title>
    <!-- Bootstrap Core Css -->
{{--    <link href="{{ asset("plugins/bootstrap/css/bootstrap.css") }}" rel="stylesheet">--}}
{{--    <link href="{{ asset("css/style.css") }}" rel="stylesheet">--}}
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
<div class="">
    <div style="text-align: justify">
        <h3 style="text-align: center">Alcaldía Bolivariana del Municipio Maturín Estado Monagas</h3>
        <br>
        <h4 style="text-align: right">ACTA DE ASIGNACIÓN DE BIENES (INVENTARIO)</h4>
        <br>
        {{--{{ dd($bienes_dep) }}--}}

        <p>Yo, <strong>{{ $bienes_dep->responsable }}</strong>, en mi carácter de <strong>Jefe Dpto. Bienes Municipales  </strong><strong>Resolución N°{{ $bienes_dep->resolucion }}</strong>,
            adscrita a la <strong>Dirección de Administración</strong> de la Alcaldía del Municipio Maturín,
            hago constar que en esta fecha <strong>{{ date('d-m-Y',strtotime(today())) }}</strong> se realizó  inventario a la  <strong>{{ $unidad->descripcion }}</strong> de la Alcaldía del Municipio Maturín,
            dicha inspección se pudo constatar la cantidad de  ({{ $count }}) Bienes Muebles, por un
            valor de BS {{ strtolower($totalLetras) }} ({{ number_format($total ,5,',','.') }}, BS), según se  detalla en el inventario anexo.
        </p>
        <p>El Departamento de Bienes Públicos le hace   entrega del Inventario realizado  al
            funcionario/a <strong>{{ $unidad->responsable }}</strong>, titular de la cédula de identidad <strong>N° {{ $unidad->cedula_responsable }}</strong>,
            <strong>Resolución nro. {{ $unidad->resolucion }}</strong>, la <strong>{{ $unidad->descripcion }}</strong>, quien declara
            “Recibo el Bien o Bienes Municipales especificados en el inventario e identificados
            con sus <strong>respectivas etiquetas anexo</strong>, en buenas condiciones  de uso y conservación,
            para ser utilizado(s) por mi persona, dentro de las Instalaciones de la Alcaldía del Municipio
            Maturín o fuera de su recinto, cuando sea requerido o autorizado para ello, únicamente
            para el desempeño de mis funciones como. En virtud de la presente asignación, en mi condición
            de  Uso y custodio de los bienes descritos en el inventario, me comprometo a cumplir las siguientes cláusulas:
        </p>
        <p><strong>PRIMERA:</strong> Utilizar los bienes bajo mi custodia de manera responsable y tomar las medidas
            de resguardo necesarias para evitar el deterioro acelerado, hurto, robo, extravío
            o pérdida de los mismos. <strong>SEGUNDA:</strong> Mostrar los bienes en custodia al personal de la Alcaldía del Municipio
            Maturín encargado de realizar los inventarios o auditorias, cuando lo requieran.
            <strong>TERCERA</strong>: No instalar a los equipos de informática dispositivos, programas o aplicaciones
            no autorizadas por la Dirección de Tecnología e Informática de la Alcaldía del Municipio Maturín.
            <strong>CUARTA:</strong> En caso de fallas o defectos en el funcionamiento del bien, me comprometo a notificarlo,
            dentro de las cuarenta y ocho (48) horas siguientes, a la Dirección de Tecnología e Informática,
            Departamento de Servicios Generales o Departamento de Contabilidad, según sea el caso, para la
            evaluación, reparación o desincorporación del bien. <strong>QUINTA</strong>: En caso de robo, hurto,
            apropiación indebida, extravío o pérdida de algún bien municipal asignado en la presente Acta,
            deberé formular la denuncia ante el Cuerpo de Investigaciones Científicas, Penales y Criminalísticas (CICPC)
            y notificarlo al Responsable Patrimonial Primario mediante informe detallado, con indicación de las
            circunstancias de modo, tiempo y lugar del hecho ocurrido, para que se inicien los procedimientos a que
            haya lugar. <strong>SEXTA</strong>: Quedo en cuenta que la negligencia o impericia en el manejo de los bienes, así como
            la omisión o retardo en las notificaciones antes mencionadas, podrá generar responsabilidades disciplinarias,
            administrativas, penales o civiles, de acuerdo a lo establecido en la Ley Orgánica de la Contraloría
            General de la República y Sistema Nacional de Control Fiscal, la Ley Contra la Corrupción,
            la Ley Orgánica de Bienes Públicos y demás leyes que regulan la materia.
        </p>
        <p>Se hacen Dos  (2) ejemplares de un mismo tenor y a un solo efecto, en Maturín, Estado Monagas,
            a los {{ $fecha }}.
        </p>
        {{--        <p>Nota. El listado de Inventario debe ser Colocado en un lugar Visibles con carácter obligatorio.</p>
                <p>Cabe señalar que el inventario de la Dirección de Catastro Municipal, está distribuido de la
                    siguiente manera: Dirección 141 Bienes, Dpto. Mantenimiento Vial  13 Bienes, Dpto.
                </p>--}}

        <p><strong>Nota: el listado de inventario debe ser colocado en un lugar visible con carácter obligatorio.</strong></p>
    </div>
    <div class="saltopagina"></div>
    <div style="font-size: 10px">
        <h3 style="text-align: center"><strong>DEPARTAMENTO DE BIENES MUNICIPALES</strong></h3>
        <h4 style="text-align: center"><strong>INVENTARIO DE BIENES MUNICIPALES</strong></h4>
        <p style="text-align: right"><strong>Formulario BM-1</strong></p>
        <p></p>
        <p>Entidad propietaria: <strong>ALCALDÍA DE MATURÍN</strong></p>
        <p>Servicio:<strong> @if($unidad->_direccion) {{ $unidad->_direccion->descripcion }} @else {{ $unidad->descripcion }} @endif</strong></p>
        <p>Unida de trabajo o dependencia:<strong> @if($unidad->_direccion) {{ $unidad->descripcion }} @else {{ $unidad->descripcion }} @endif</strong></p>
        <p>Dirección o lugar: <strong>Calle Azcúe, Edificio Palacio Municipal, Maturín Estado Monagas. </strong></p>
    </div>
    <br>
    <div class="">
        <div class="">
            <div class="" style="">
                <table class="data" style="width: 100%">
                    <thead>
                    <tr>
                        <th>N°</th>
                        <th>Fecha</th>
                        <th>Codigo</th>
                        <th>Descripcion</th>
                        <th>Valor Unit.</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{ $n = 1 }}
                    @foreach($data as $bien)
                        <tr>
                            <td width="4%">{{ $n }}</td>
                            <td width="10%">{{ date('d-m-Y',strtotime($bien->fecha_incorp)) }}</td>
                            <td width="14%">{{ $bien->codigo }}</td>
                            <td width="58%">{{ $bien->descripcion }}</td>
                            {{--
                                                        <td>{{ $bien->count }}</td>
                            --}}
                            <td width="14%">{{ number_format($bien->valor_actual ,6,',','.') }}</td>
                            {{--
                                                        <td>{{ $bien->valor_actual * $bien->count }}</td>
                            --}}
                        </tr>
                        {{ $n++ }}
                        {{--
                                                {{ $total += $bien->valor_actual }}
                        --}}
                        {{--{{ $total+= ($bien->valor_actual * $bien->count )}}--}}
                    @endforeach
                    <tr style="background-color: #b8e834">
                        <td colspan="4"><strong>TOTAL:</strong></td>
                        <td><strong>{{ number_format($total ,6,',','.')}}</strong></td>
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
<table class="firma" style="">
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

