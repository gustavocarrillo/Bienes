<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sistema de Gestion de Bienes Municipales</title>
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

    <!-- JQuery DataTable Css -->
    <link href="{{ asset("plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css") }}" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="{{ asset("plugins/sweetalert/sweetalert.css") }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset("css/style.css") }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset("css/themes/all-themes.css") }}" rel="stylesheet" />
</head>

<body class="theme-red">
<!-- Page Loader -->
@include('partials.page-loader')
<!-- #END# Page Loader -->

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<!-- Search Bar -->
@include('partials.searchbar')
<!-- #END# Search Bar -->

<!-- Top Bar -->
@include('partials.navbar')
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        @include('partials.user-info')
        <!-- #User Info -->

        <!-- Menu -->
        @include('partials.menu')
        <!-- #Menu -->

        <!-- Footer -->
        @include('partials.footer')
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    @include('partials.right-sidebar')
    <!-- #END# Right Sidebar -->
</section>

<section class="content">
    <div class="container-fluid">
        @yield('contenido')
    </div>
</section>

<!-- Jquery Core Js -->
<script src="{{ asset("plugins/jquery/jquery.min.j") }}s"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset("plugins/bootstrap/js/bootstrap.js") }}"></script>

<!-- Select Plugin Js -->
<script src="{{ asset("plugins/bootstrap-select/js/bootstrap-select.js") }}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{ asset("plugins/jquery-slimscroll/jquery.slimscroll.js") }}"></script>

<!-- Jquery Validation Plugin Css -->
<script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>

<!-- Input Mask Plugin Js -->
<script src="{{ asset('plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>

<!-- Input Mask Plugin Js Extension -->
<script src="{{ asset('plugins/jquery-inputmask/inputmask/inputmask.numeric.extensions.js') }}"></script>

<!-- Bootstrap Notify Plugin Js -->
<script src="{{ asset("plugins/bootstrap-notify/bootstrap-notify.js") }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset("plugins/node-waves/waves.js") }}"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset("plugins/jquery-datatable/jquery.dataTables.js") }}"></script>
<script src="{{ asset("plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js") }}"></script>
<script src="{{ asset("plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js") }}"></script>
<script src="{{ asset("plugins/jquery-datatable/extensions/export/buttons.flash.min.js") }}"></script>
<script src="{{asset("plugins/jquery-datatable/extensions/export/jszip.min.js")}}"></script>
<script src="{{ asset("plugins/jquery-datatable/extensions/export/pdfmake.min.js") }}"></script>
<script src="{{ asset("plugins/jquery-datatable/extensions/export/vfs_fonts.js") }}"></script>
<script src="{{asset("plugins/jquery-datatable/extensions/export/buttons.html5.min.js")}}"></script>
<script src="{{ asset("plugins/jquery-datatable/extensions/export/buttons.print.min.js") }}"></script>

<!-- SweetAlert Plugin Js -->
<script src="{{ asset("plugins/sweetalert/sweetalert.min.js") }}"></script>

<!-- Custom Js -->
<script src="{{ asset("js/admin.js") }}"></script>
<script src="{{ asset("js/pages/ui/notifications.js") }}"></script>
<script src="{{ asset("js/pages/forms/form-validation.js") }}"></script>
<script src="{{ asset("js/pages/tables/jquery-datatable.js") }}"></script>

<!-- Demo Js -->
<script src="{{ asset("js/demo.js") }}"></script>



@yield('js')

</body>

</html>