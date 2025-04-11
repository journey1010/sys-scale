<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Escalafon | Login</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <link href="{{ asset('images/goreMainLogoWhite.ico') }}" rel="icon">

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="{{ asset('assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style-responsive.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/theme/default.css') }}" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>
    <!-- ================== END BASE JS ================== -->

    <link href="{{ asset('css/layout.css') }}" rel="stylesheet" />
    @if(config('constants.general.tema') != 1)
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    @endif

</head>
<body class="pace-top bg-white">
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div class="container d-flex justify-content-center align-items-center " style="min-height: 100vh; min-height: 100vh; display: flex; align-items: center; justify-content: center;">
    <div>
        <div class="center-content text-center">
            @yield('content') <!-- El contenido dinámico estará centrado -->
        </div>
    </div>
</div>


<!-- ================== BEGIN BASE JS ================== -->
<script src="{{ asset('assets/plugins/jquery/jquery-1.9.1.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery/jquery-migrate-1.1.0.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<!--[if lt IE 9]>
<script src="{{ asset('assets/crossbrowserjs/html5shiv.js') }}"></script>
<script src="{{ asset('assets/crossbrowserjs/respond.min.js') }}"></script>
<script src="{{ asset('assets/crossbrowserjs/excanvas.min.js') }}"></script>
<![endif]-->
<script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-cookie/jquery.cookie.js') }}"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{ asset('assets/js/apps.min.js') }}"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
    });
</script>
</body>

</html>