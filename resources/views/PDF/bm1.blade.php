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

</head>
<body style="background-color: white">
    <div class="align-center">
        <h4>Departamento de Bienes Municipales</h4>
        <h4>Inventarion de Bienes Muebles</h4>
    </div>
    <br>
    <br>
    <div class="col-lg-6 col-md-6">
        <div>
            <p><strong>Entidad propietaria: ALCALDIA DE MATURIN</strong></p>
            <p><strong>Servicio: @if($data->_direccion) {{ $data->_direccion->descripcion }} @else {{ $data->descripcion }} @endif</strong></p>
            <p><strong>Unida de trabajo o dependencia: @if($data->_direccion) {{ $data->descripcion }} @else {{ $data->_direccion->descripcion }} @endif</strong></p>
            <p><strong>Dirección o lugar: Calle Azcúe, Edificio Palacio Municipal, Maturín Estado Monagas. </strong></p>
        </div>
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
                            <th width="15%">Valor Unit.</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{ $total = 0 }}
                        {{ $n = 1 }}
                        @foreach($data->bienes as $bien)
                            <tr>
                                <td width="3%">{{ $n }}</td>
                                <td width="5%">{{ date('d-m-Y',strtotime($bien->fecha_incorp)) }}</td>
                                <td width="10%">{{ $bien->codigo }}</td>
                                <td width="30%">{{ $bien->descripcion }}</td>
                                <td width="5%">{{ $bien->valor_actual }}</td>
                            </tr>
                            {{ $n++ }}
                            {{ $total+= $bien->valor_actual}}
                        @endforeach
                            <tr style="background-color: #b8e834">
                                <td colspan="4"><strong>TOTAL:</strong></td>
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
        <table>
            <tr>
                <td width="340px" class="align-center">DEPARTAMENTO DE BIENES</td>
                <td width="340px" class="align-center">@if($data->_direccion) {{ $data->_direccion->descripcion }} @else {{ $data->descripcion }} @endif</td>
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
                <td width="340px" class="align-center">_______________________</td>
                <td width="340px" class="align-center">_______________________</td>
            </tr>
            <tr>
                <td width="340px" class="align-center">{{ strtoupper($bienes_dep->responsable) }}</td>
                <td width="340px" class="align-center">@if($data->_direccion) {{ $data->_direccion->responsable }} @else {{ $data->responsable }} @endif</td>
            </tr>
            <tr>
                <td width="340px" class="align-center">{{ strtoupper($bienes_dep->resolucion) }}</td>
                <td width="340px" class="align-center">@if($data->_direccion) {{ $data->_direccion->resolucion }} @else {{ $data->resolucion }} @endif</td>
            </tr>
        </table>
    </div>
</body>
</html>

