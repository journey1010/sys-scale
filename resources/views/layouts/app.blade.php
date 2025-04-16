<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Escalafon | Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="Jsanchez" name="author" />


    <link href="{{ asset('images/favicon-'.config('constants.temas')[config('constants.general.tema')].'.ico') }}" rel="icon">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style-responsive.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/theme/default.css') }}" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="{{ asset('assets/plugins/jquery-jvectormap/jquery-jvectormap.css') }}" rel="stylesheet" />
{{--    <link href="{{ asset('assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" />--}}
    <link href="{{ asset('assets/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/sweetalert/sweetalert2.css') }}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <link href="{{ asset('css/layout.css') }}" rel="stylesheet" />

    @if(config('constants.general.tema') != 1)
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    @endif
    @yield('styles')
    <style>
        @if(config('constants.general.tema') == 8)
            #content{
            margin-top: 45px;
        }
        @endif
    </style>

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>
    <!-- ================== END BASE JS ================== -->
</head>
<body>
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-default navbar-fixed-top">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin mobile sidebar expand / collapse button -->
            <div class="navbar-header navh-tu">

                @if(config('constants.general.tema') == 1)
                    <a href="{{ route('/') }}" class="navbar-brand" style="display: inline-flex"> <img src="{{ asset('images/logo.png') }}" class="img-logo"/> <b style="margin-right: 8px">Escalafon</b>      Admin</a>
                @elseif(config('constants.general.tema') == 2)
                    <a href="{{ route('/') }}" class="navbar-brand"> <img src="{{ asset('images/uncp.svg') }}" class="img-logo"/></a>
                @elseif(config('constants.general.tema') == 3)
                    <a href="{{ route('/') }}" class="navbar-brand" style="text-align: center;"> <img src="{{ asset('images/akdemic.svg') }}" class="img-logo" style="width: 150px;margin: 8px auto;"/></a>
                @elseif(config('constants.general.tema') == 4)
                    <a href="{{ route('/') }}" class="navbar-brand" style="text-align: center;"> <img src="{{ asset('images/unica-login.png') }}" class="img-logo" style="width: 150px;margin: 8px auto;"/></a>
                @elseif(config('constants.general.tema') == 5)
                    <a href="{{ route('/') }}" class="navbar-brand" style="text-align: center;"> <img src="{{ asset('images/undac.svg') }}" class="img-logo" style="width: 150px;margin: 8px auto;"/></a>
                @elseif(config('constants.general.tema') == 6)
                    <a href="{{ route('/') }}" class="navbar-brand" style="text-align: center;"> <img src="{{ asset('images/unheval.png') }}" class="img-logo" style="width: 150px;margin: 8px auto;"/></a>
                @elseif(config('constants.general.tema') == 7)
                    <a href="{{ route('/') }}" class="navbar-brand" style="text-align: center;"> <img src="{{ asset('images/unfv/logo.png') }}" class="img-logo" style="width: 150px;margin: 8px auto;margin-top: 0px;"/></a>
                @elseif(config('constants.general.tema') == 8)
                    <a href="{{ route('/') }}" class="navbar-brand" style="text-align: center;"> <img src="{{ asset('images/logo-upal.png') }}" class="img-logo" style="width: 150px;margin: 8px auto;margin-top: 0px;"/></a>
                @endif

                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- end mobile sidebar expand / collapse button -->

            <!-- begin header navigation right -->
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form class="navbar-form full-width">
                        <div class="form-group">
                        </div>
                    </form>
                </li>
                {{--<li>
                    <div class="dropdown dropdown-akdemic" style="float:right;border-left:0px;padding: 11px 0px;">
                        <a href="javascript: void(0);" class="" data-toggle="dropdown" aria-expanded="false">
                    <span class="akdemic-avatar" href="javascript:void(0);" style="height:30px;background-color:transparent;border-color:transparent">
                        <img src="{{ asset('images/akdemic/akdemic.svg') }}" alt="Akdemic" style="height:30px;vertical-align: baseline;">
                    </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right akdemic-menu akdemic-box" aria-labelledby="" role="menu">
                            <span class="akdemic-label">Campus virtual</span>
                            <div class="row">
                                <div class="col-md-4 col-xs-4">
                                    <a href="https://laurassia.akdemic.com/" class="app-link">
                                        <img src="{{ asset('images/akdemic/laurassia.svg') }}" alt="" />
                                    </a>
                                </div>
                                <div class="col-md-4 col-xs-4">
                                    <a href="https://quibuk.akdemic.com/akdemic/login" class="app-link">
                                        <img src="{{ asset('images/akdemic/biblioteca.svg') }}" alt="" />
                                    </a>
                                </div>
                                <div class="col-md-4 col-xs-4">
                                    <a href="http://intranet.akdemic.com/akdemic/login" class="app-link">
                                        <img src="{{ asset('images/akdemic/intranet.svg') }}" alt="" />
                                    </a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-xs-4">
                                    <a href="http://matricula.akdemic.com/akdemic/login" class="app-link">
                                        <img src="{{ asset('images/akdemic/matricula.svg') }}" alt="" />
                                    </a>
                                </div>
                                <div class="col-md-4 col-xs-4">
                                    <a href="https://bolsa.akdemic.com/akdemic/login" class="app-link">
                                        <img src="{{ asset('images/akdemic/bolsa.svg') }}" alt="" />
                                    </a>
                                </div>
                                <div class="col-md-4 col-xs-4">
                                    <a href="http://bitportal.azurewebsites.net/dev~PagosEnLineaDemo/Index-2.0" class="app-link">
                                        <img src="{{ asset('images/akdemic/pagos.svg') }}" alt="" />
                                    </a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-xs-4">
                                    <a href="https://investigacion.akdemic.com/akdemic/login" class="app-link">
                                        <img src="{{ asset('images/akdemic/investigacion.svg') }}" alt="" />
                                    </a>
                                </div>
                                <div class="col-md-4 col-xs-4">
                                    <a href="https://escalafon.akdemic.com/akdemic/login" class="app-link">
                                        <img src="{{ asset('images/akdemic/escalafon.svg') }}" alt="" />
                                    </a>
                                </div>
                                <div class="col-md-4 col-xs-4">
                                    <a href="https://gdocentes.akdemic.com/akdemic/login" class="app-link">
                                        <img src="{{ asset('images/akdemic/docentes.svg') }}" alt="" />
                                    </a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-xs-4">
                                    <a href="https://mesadeparte.akdemic.com/akdemic/login" class="app-link">
                                        <img src="{{ asset('images/akdemic/mesa.svg') }}" alt="" />
                                    </a>
                                </div>
                                <div class="col-md-4 col-xs-4">
                                    <a href="https://antiplagio.akdemic.com/akdemic/login" class="app-link">
                                        <img src="{{ asset('images/akdemic/antiplagio.svg') }}" alt="" />
                                    </a>
                                </div>
                                <div class="col-md-4 col-xs-4">
                                    <a href="https://gdocentes.akdemic.com/akdemic/login" class="app-link">
                                        <img src="{{ asset('images/akdemic/asistencia.svg') }}" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-6 akdemic-link-border">
                                    <a href="https://extranet.akdemic.com/" class="akdemic-link">
                                        Portal
                                    </a>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <a href="https://helpdesk.akdemic.com/akdemic/login" class="akdemic-link">
                                        Ayuda
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>--}}

                <li class="dropdown navbar-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<span class="user-image online">
								<img src="{{ asset('assets/img/user-13.jpg') }}" alt="" />
							</span>
                        <span class="hidden-xs">{{ Auth::user()->name }}</span> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu animated fadeInLeft">
                        <li class="arrow"></li>
                        {{--<li><a href="#">Perfil</a></li>--}}
                        {{--<li><a href="#">Configuración</a></li>--}}
                        {{--<li class="divider"></li>--}}
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                Cerrar Sesion
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- end header navigation right -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end #header -->

    <!-- begin #sidebar -->
    <div id="sidebar" class="sidebar">
        <!-- begin sidebar scrollbar -->
        <div data-scrollbar="true" data-height="100%">
            <!-- begin sidebar user -->
            <ul class="nav">
                <li class="nav-profile">
                    <div class="image">
                        <a href="javascript:;"><img src="{{ asset('assets/img/user-13.jpg') }}" alt="" /></a>
                    </div>
                    <div class="info">
                        {{ Auth::user()->name }}
                        <small>Software Developer</small>
                    </div>
                </li>
            </ul>
            <!-- end sidebar user -->
            <!-- begin sidebar nav -->
            <ul class="nav">
                <li class="nav-header">Menu</li>

                @include('template.partials.menu')

                <!-- begin sidebar minify button -->
                {{--<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="ion-ios-arrow-left"></i> <span>Collapse</span></a></li>--}}
                <!-- end sidebar minify button -->
            </ul>
            <!-- end sidebar nav -->
        </div>
        <!-- end sidebar scrollbar -->
    </div>
    <div class="sidebar-bg"></div>
    <!-- end #sidebar -->

    <!-- begin #content -->
    <div id="content" class="content">

        @yield('content')

    </div>
    <!-- end #content -->

    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-primary btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
</div>
<!-- end page container -->

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
{{--<script src="{{ asset('assets/plugins/gritter/js/jquery.gritter.js') }}"></script>--}}
<script src="{{ asset('assets/plugins/flot/jquery.flot.min.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/jquery.flot.time.min.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/jquery.flot.resize.min.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/jquery.flot.pie.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sparkline/jquery.sparkline.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
{{--<script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>--}}
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/moment/es.js') }}"></script>
{{--<script src="{{ asset('assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/dashboard.min.js') }}"></script>--}}
<script src="{{ asset('assets/js/apps.min.js') }}"></script>
<script src="{{ asset('assets/plugins/parsley/dist/parsley.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert/sweetalert2.js') }}"></script>

<script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/select2/js/i18n/es.js') }}" type="text/javascript"></script>
@include('sweet::alert')
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
    });
</script>


@yield('scripts')

</body>

</html>
