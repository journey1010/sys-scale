@extends('layouts.app')
@section('styles')
    <link href="{{ asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/DataTables/extensions/Buttons/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <style>
        #data-table_filter{
            display: none;
        }

        .ui-helper-hidden {
            display: none;
        }
        .ui-helper-hidden-accessible {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        .ui-menu {
            list-style: none;
            padding: 2px;
            margin: 0;
            display: block;
            outline: none;
        }
        .ui-menu .ui-menu {
            margin-top: -3px;
            position: absolute;
        }
        .ui-widget {
            font-family: segoe ui,Arial,sans-serif;
            font-size: 1.1em;
        }
        .ui-widget .ui-widget {
            font-size: 1em;
        }
        .ui-widget input,
        .ui-widget select,
        .ui-widget textarea,
        .ui-widget button {
            font-family: segoe ui,Arial,sans-serif;
            font-size: 1em;
        }
        .ui-widget-content {
            background-color: #83B0F5;
            color: #312e25;
        }
        .ui-widget-content a {
            color: #312e25;
        }
        .ui-menu-item:hover{
            background-color: #6EA6FC !important;
        }
        .ui-menu-icons {
            position: relative;
        }
        .ui-menu-icons .ui-menu-item a {
            position: relative;
            padding-left: 2em;
        }

    </style>
@endsection
@section('content')

    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('/') }}">Inicio</a></li>
        <li class="active">Gestión de Personal</li>
    </ol>
    <h1 class="page-header">Gestión de Personal <small></small></h1>

    <div class="row">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
                <h4 class="panel-title">Listado del Personal</h4>
            </div>
            <form class="form-horizontal">
                <div class="form-group" style="margin-left: 0px;margin-right: 0px;margin-bottom: 0px">
                    <div class="pull-right m-r-15" style="padding-top: 20px;">
                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal">
                            Nuevo
                        </a>
                    </div>
                </div>
            </form>

            <div class="panel-body">
                <div style="margin-bottom: 8px; ">
                    <label class="control-label h4">Buscar Nombres, Apellidos o Usuario:</label>
                    {{ Form::text('filter', null, ['id' => 'text-filter', 'class' => 'form-control', 'style' => 'width:30%;']) }}
                </div>

                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered" style="margin-bottom: 300px !important;">
                        <thead>
                        <tr>
                            <th>Nombre Completo</th>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th style="text-align: center;">Legajo escalafonario</th>
                            <th style="text-align: center;">Editar</th>
                            <th style="text-align: center;">Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model->users as $user)
                            <tr>
                                <td>{{ $user->name }} {{ $user->first_surname }} {{ $user->second_surname }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center">

                                    {{--<a href="{{ route('entriesIndex', $user->id) }}"> Gestionar</a>--}}

                                    <div class="btn-group m-r-0 m-b-0">
                                        <a href="javascript:;" data-toggle="dropdown" class="btn btn-xs btn-info dropdown-toggle">Gestionar <span class="caret"></span></a>
                                        <ul class="dropdown-menu" style="left: unset; right: 0">
                                            <li><a href="{{ route('personalIdentificationIndex', $user->id) }}">Identificación Personal</a></li>
                                            <li><a href="{{ route('allStudies', $user->id) }}">Formación Académica</a></li>
                                            <li><a href="{{ route('entriesIndex', $user->id) }}">Ingreso o Reingreso</a></li>
                                            <li><a href="{{ route('careerIndex', $user->id) }}">Trayectoria Laboral</a></li>
                                            <li><a href="{{ route('getAssignments', $user->id) }}">Asignaciones e incentivos temporales, retenciones judiciales y pagos indebidos</a></li>
                                            <li><a href="{{ route('renuncias', $user->id) }}">Renuncia y Liquidación</a></li>
                                            <li><a href="{{ route('displacement', $user->id) }}">Desplazamiento de personal</a></li>
                                            <li><a href="{{ route('retirementIndex',$user->id) }}">Retiro y régimen pensionario</a></li>
                                            <li><a href="{{ route('permitIndex',$user->id) }}">Premios y estímulos</a></li>
                                            {{--<li><a href="{{ route('sanctionIndex',$user->id) }}">Sanciones</a></li>--}}
                                            <li><a href="{{ route('licenseIndex', [ 'id' => $user->id] ) }}">Licencias y Vacaciones</a></li>
                                            <li><a href="{{ route('evaluacion', $user->id) }}">Documentos de Evaluaciones</a></li>
                                            <li><a href="{{ route('produccionintelectual', $user->id) }}">Documentos de Producción Intelectual</a></li>
                                            <li><a href="{{ route('otherIndex', $user->id) }}">Otros</a></li>
                                        </ul>
                                    </div>
                                </td>
                                <td class="text-center"> <button class="btn btn-success edit-user" data-values="{{ $user->id }},{{ $user->name }},{{ $user->first_surname }},{{ $user->second_surname }},{{ $user->email }},{{ $user->username }},{{ $user->profileEnable }}" value="{{ $user->id }}"><i class="fa fa-edit"></i> Editar</button> </td>
                                <td class="text-center"> <button class="btn btn-success delete-user" data-values="Eliminar" data-id="{{ $user->id }}"><i class="fa fa-trash"></i> Eliminar</button> </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                {{ Form::open(['route' => 'addUser', 'class' => 'form-horizontal', 'method' => 'post']) }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Nuevo Personal</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Nombres</label>
                        <div class="col-md-8">
                            {{ Form::text('name', null, ['class' => 'form-control', 'style' => '']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('first_surname') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Apellido Paterno</label>
                        <div class="col-md-8">
                            {{ Form::text('first_surname', null, ['class' => 'form-control', 'style' => '']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('first_surname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_surname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('second_surname') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Apellido Materno</label>
                        <div class="col-md-8">
                            {{ Form::text('second_surname', null, ['class' => 'form-control', 'style' => '']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('second_surname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('second_surname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Correo</label>
                        <div class="col-md-8">
                            {{ Form::text('email', null, ['class' => 'form-control', 'style' => '']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Usuario</label>
                        <div class="col-md-8">
                            {{ Form::text('username', null, ['class' => 'form-control', 'style' => '']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Contraseña</label>
                        <div class="col-md-8">
                            {{ Form::text('password', null, ['class' => 'form-control', 'style' => '']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    {{--<div class="form-group{{ $errors->has('profileEnable') ? ' has-error' : '' }}">--}}
                        {{--<label class="col-md-3 control-label">Activo</label>--}}
                        {{--<div class="col-md-8">--}}
                            {{--{{ Form::checkbox('profileEnable', true) }}--}}
                        {{--</div>--}}
                        {{--<div class="col-md-offset-3 col-md-8">--}}
                            {{--@if ($errors->has('profileEnable'))--}}
                                {{--<span class="help-block">--}}
                                    {{--<strong>{{ $errors->first('profileEnable') }}</strong>--}}
                                {{--</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-6">
                            {{ Form::submit('Guardar', ['class' => 'btn btn-info', 'style' => '']) }}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>

                {{ Form::close() }}
            </div>

        </div>

    </div>
    <div id="myModalEdit" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                {{ Form::open(['route' => 'editUser', 'class' => 'form-horizontal', 'method' => 'post']) }}
                {!! Form::hidden('invisible_update',null , array('id' => 'invisible_update')) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar datos del Personal</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Nombres</label>
                        <div class="col-md-8">
                            {{ Form::text('name', null, ['class' => 'form-control','id' => 'name_update', 'style' => '']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('first_surname') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Apellido Paterno</label>
                        <div class="col-md-8">
                            {{ Form::text('first_surname', null, ['class' => 'form-control','id' => 'first_surname_update', 'style' => '']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('first_surname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_surname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('second_surname') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Apellido Materno</label>
                        <div class="col-md-8">
                            {{ Form::text('second_surname', null, ['class' => 'form-control','id' => 'second_surname_update', 'style' => '']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('second_surname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('second_surname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Correo</label>
                        <div class="col-md-8">
                            {{ Form::text('email', null, ['class' => 'form-control','id' => 'email_update', 'style' => '']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Usuario</label>
                        <div class="col-md-8">
                            {{ Form::text('username', null, ['class' => 'form-control','id' => 'username_update', 'style' => '']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Contraseña</label>
                        <div class="col-md-8">
                            {{ Form::text('password', null, ['class' => 'form-control', 'style' => '']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    {{--<div class="form-group{{ $errors->has('profileEnable') ? ' has-error' : '' }}">--}}
                        {{--<label class="col-md-3 control-label">Activo</label>--}}
                        {{--<div class="col-md-8">--}}
                            {{--{{ Form::checkbox('profileEnable', null,false ,['id'=>'asap']) }}--}}
                        {{--</div>--}}
                        {{--<div class="col-md-offset-3 col-md-8">--}}
                            {{--@if ($errors->has('profileEnable'))--}}
                                {{--<span class="help-block">--}}
                                    {{--<strong>{{ $errors->first('profileEnable') }}</strong>--}}
                                {{--</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-6">
                            {{ Form::submit('Guardar', ['class' => 'btn btn-info', 'style' => '']) }}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>

                {{ Form::close() }}
            </div>

        </div>

    </div>

@endsection

@section('scripts')
    <script src="{{ asset('assets/plugins/DataTables/media/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/extensions/Buttons/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/extensions/Buttons/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/extensions/Buttons/js/vfs_fonts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>

    {{--Scripts para prueba de Menu Click Derecho--}}
    {{--<link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/south-street/jquery-ui.min.css" rel="stylesheet" type="text/css" />--}}
    {{--<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>--}}
    {{--<script src="//cdn.datatables.net/colreorder/1.1.2/js/dataTables.colReorder.min.js"></script>--}}
    {{--<script src="//cdn.datatables.net/plug-ins/725b2a2115b/api/fnFilterClear.js"></script>--}}
    {{--<script src="//cdn.jsdelivr.net/jquery.ui-contextmenu/1.7.0/jquery.ui-contextmenu.min.js"></script>--}}
    {{--Fin Script Prueba--}}



<script>

        var table = $("#data-table").DataTable({
            "language": {
                "sProcessing": "Procesando...",
                // "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "No existen registros creados",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                // "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
            },
            'bFilter': true, //Desactivar o Activar Filtro
            "bInfo": false, //Desactivar Informacion
            "bLengthChange": false, //Desactivar Filtro por numero de columnas
            "jQueryUI": true,
            "dom": 'l<"H"Rf>t<"F"ip>'
        })

        //Inicio de Prueba para Click Derecho
        // $(document).contextmenu({
        //     delegate: ".dataTable td",
        //     menu: [
        //         {title: "Filter", cmd: "filter", uiIcon: "ui-icon-volume-off ui-icon-filter"},
        //         {title: "Remove filter", cmd: "nofilter", uiIcon: "ui-icon-volume-off ui-icon-filter"}
        //     ],
        //     select: function(event, ui) {
        //         var celltext = ui.target.text();
        //         var colvindex = ui.target.parent().children().index(ui.target);
        //         var colindex = $('table thead tr th:eq('+colvindex+')').data('column-index');
        //         switch(ui.cmd){
        //             case "filter":
        //                 table
        //                     .column( colindex )
        //                     .search( '^' + celltext + '$', true )
        //                     .draw();
        //                 break;
        //             case "nofilter":
        //                 table
        //                     .search('')
        //                     .columns().search('')
        //                     .draw();
        //                 break;
        //         }
        //     },
        //     beforeOpen: function(event, ui) {
        //         var $menu = ui.menu,
        //             $target = ui.target,
        //             extraData = ui.extraData;
        //         ui.menu.zIndex(9999);
        //     }
        // });
        //Fin Prueba

        $(document).ready(function() {
            @if ($errors->any())
            $('#myModal').modal('toggle');
            @endif


            $('#data-table').on("click", ".delete-user", function() {
                var id = $(this).data('id');
                swal({
                    title: '¡ Atención !',
                    text: "¿Se encuentra seguro de eliminar al usuario?",
                    type: "warning",
                    confirmButtonText: "Sí, estoy seguro!",
                    cancelButtonText: "Cancelar",
                    showCancelButton: true,
                    closeOnConfirm: false
                }).then(function() {
                    var url = '{{ url('delete/staff_management') }}';

                    $.ajax({
                        type: "GET",
                        url: url + '/' + id,
                        success: function (data) {
                            setTimeout(function () {
                                location.reload();
                            }, 350);
                        }
                    });

                },function(dismiss) {
                   // button.prop("disabled",false);
                });
            });

            $('#data-table').on("click", ".edit-user", function() {
                var dat = $(this).data('values');
                dat = dat.split(",");
                this.blur();
                $("#invisible_update").val(dat[0]);
                $("#name_update").val(dat[1]);
                $("#first_surname_update").val(dat[2]);
                $("#second_surname_update").val(dat[3]);
                $("#email_update").val(dat[4]);
                $("#username_update").val(dat[5]);

                if(dat[6]*1 > 0){
                    $("#asap").prop("checked",true);
                    $("#asap").val(true);
                }else{
                    $("#asap").prop("checked",false);
                    $("#asap").val(false);
                }
                var button = $(this);
                var name = button.data('name');
                button.prop("disabled",true);
                button.blur();

                $('#myModalEdit').modal({
                    show: true
                });
                button.removeAttr("disabled");
                button.prop('disabled', false);
            });


        })

        $('#text-filter').on('keyup',function(){
            table.search($(this).val()).draw();
        });

        // jQuery('#data-table_filter').children('label').css('float','right');

    </script>
@endsection
