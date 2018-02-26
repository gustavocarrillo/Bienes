<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign Up | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset("favicon.ico") }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset("plugins/bootstrap/css/bootstrap.css") }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset("plugins/node-waves/waves.css") }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset("plugins/animate-css/animate.css") }}" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset("css/style.css") }}" rel="stylesheet">
</head>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">Sistema de gestion de <b>Bienes Municipales</b></a>
            <small>Alcaldia de Maturín</small>
        </div>

        <div class="card">
            <div class="body">
                <form id="registro" method="POST" action="{{ route("registrar") }}">
                    {{ csrf_field() }}
                    <div class="msg">Registro de Nuevo Usuario</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person_outline</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Nombre y Apellido" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Nombre de Usuario" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Contraseña" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password_confirmation" minlength="6" placeholder="Confirmar Contraseña" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">supervisor_account</i>
                        </span>
                        <div class="form-line">
                            <select class="form-control show-tick" required>
                                <option value="" selected>Seleccione un tipo de Usuario</option>
                                <option value="consultas">Consultas</option>
                                <option value="admin">Administrador</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">REGISTRARSE</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="{{ route("login") }}">Ya tienes un usuario creado?</a>
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

    <!-- Jquery Core Js -->
    <script src="{{ asset("plugins/jquery/jquery.min.js") }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset("plugins/bootstrap/js/bootstrap.js") }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset("plugins/node-waves/waves.js") }}"></script>

    <!-- Validation Plugin Js -->
    <script src="{{ asset("plugins/jquery-validation/jquery.validate.js") }}"></script>
    <script src="{{ asset("plugins/jquery-validation/localization/messages_es.js") }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset("js/admin.js") }}"></script>
    <script src="{{ asset("js/pages/examples/registro.js") }}"></script>
</body>

</html>