@extends('layouts.app')
@section('styles')
    <link href="{{ asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/DataTables/extensions/Buttons/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
@endsection
@section('content')

    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('/') }}">Inicio</a></li>
        <li><a href="{{ route('reports') }}">Reportes</a></li>
        <li class="active">Laborales</li>
    </ol>
    <h1 class="page-header">Reportes Laborales <small></small></h1>

    <div class="row">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
                <h4 class="panel-title">Listado de Reportes</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Nro. de Usuarios por R&eacute;gimen Laboral</h4>
                        <div class="table-responsive">
                            <table id="data-table2" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Descripci&oacute;n</th>
                                    <th>Cantidad</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employment_regime as $item)
                                    <tr>
                                        <td>{{  config('constants.employment_regime')[$item->employment_regime] }}</td>
                                        <td class="text-center">
                                            {{ $item->total }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>Nro. de Usuarios por R&eacute;gimen Pensionario</h4>
                        <div class="table-responsive">
                            <table id="data-table3" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Descripci&oacute;n</th>
                                    <th>Cantidad</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pension_regime as $item)
                                    <tr>
                                        <td>{{ config('constants.pension_regime')[$item->pension_regime] }}</td>
                                        <td class="text-center">
                                            {{ $item->total }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>Nro. de Usuarios por Sistema Pensionario</h4>
                        <div class="table-responsive">
                            <table id="data-table4" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Descripci&oacute;n</th>
                                    <th>Cantidad</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pension_system as $item)
                                    <tr>
                                        <td>{{ $item->pension_system }}</td>
                                        <td class="text-center">
                                            {{ $item->total }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h4>Listado de Personal</h4>
                        <div class="table-responsive">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Nombre Completo</th>
                                    <th>R&eacute;gimen laboral</th>
                                    <th>R&eacute;gimen Pensionario</th>
                                    <th>Sistema pensionario</th>
                                    <th>Fecha de afiliaci&oacute;n</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $item)
                                    <tr>
                                        <td>{{ $item->complete_name }}</td>
                                        <td>{{ ($item->employment_regime != null ? config('constants.employment_regime')[$item->employment_regime] : 'No asignado') }}</td>
                                        <td>{{ ($item->pension_regime != null ? config('constants.pension_regime')[$item->pension_regime] : 'No asignado') }}</td>
                                        <td>{{ ($item->pension_system != null ? $item->pension_system : 'No asignado') }}</td>
                                        <td>{{ ($item->affiliation_date != null ? date('d/m/Y', strtotime($item->affiliation_date)) : 'No asignado') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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


    <script>
        var handleDataTableButtons = function() {
                "use strict";
                0 !== $("#data-table").length && $("#data-table").DataTable({
                    "language": {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "No existe personal registrado",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        buttons: {
                            copyTitle: 'Copiado al clipboard',
                            copySuccess: {
                                _: '%d filas copiadas',
                                1: '1 fila copiada'
                            }
                        }
                    },
                    dom: "Bfrtip",
                    buttons: [{
                        extend: "copy",
                        text: "Copiar",
                        className: "btn-sm"
                    }, {
                        extend: "csv",
                        className: "btn-sm",
                        charset: 'UTF-8',
                        bom: true
                    }, {
                        extend: "excel",
                        className: "btn-sm",
                        charset: 'UTF-8',
                        bom: true
                    }, {
                        extend: "pdf",
                        className: "btn-sm",
                        charset: 'UTF-8',
                        bom: true
                    }, {
                        extend: "print",
                        text: "Imprimir",
                        className: "btn-sm"
                    }],
                    responsive: !0,
                    "bInfo": false,
                });

                0 !== $("#data-table2").length && $("#data-table2").DataTable({
                    "language": {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "No existen registros creados",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        buttons: {
                            copyTitle: 'Copiado al clipboard',
                            copySuccess: {
                                _: '%d filas copiadas',
                                1: '1 fila copiada'
                            }
                        }
                    },
                    dom: "Bfrtip",
                    buttons: [{
                        extend: "copy",
                        text: "Copiar",
                        className: "btn-sm"
                    }, {
                        extend: "csv",
                        className: "btn-sm",
                        charset: 'UTF-8',
                        bom: true
                    }, {
                        extend: "excel",
                        className: "btn-sm",
                        charset: 'UTF-8',
                        bom: true
                    }, {
                        extend: "pdf",
                        className: "btn-sm",
                        charset: 'UTF-8',
                        bom: true
                    }, {
                        extend: "print",
                        text: "Imprimir",
                        className: "btn-sm"
                    }],
                    responsive: !0,
                    "bInfo": false,
                });

                0 !== $("#data-table3").length && $("#data-table3").DataTable({
                    "language": {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "No existen registros creados",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        buttons: {
                            copyTitle: 'Copiado al clipboard',
                            copySuccess: {
                                _: '%d filas copiadas',
                                1: '1 fila copiada'
                            }
                        }
                    },
                    dom: "Bfrtip",
                    buttons: [{
                        extend: "copy",
                        text: "Copiar",
                        className: "btn-sm"
                    }, {
                        extend: "csv",
                        className: "btn-sm",
                        charset: 'UTF-8',
                        bom: true
                    }, {
                        extend: "excel",
                        className: "btn-sm",
                        charset: 'UTF-8',
                        bom: true
                    }, {
                        extend: "pdf",
                        className: "btn-sm",
                        charset: 'UTF-8',
                        bom: true
                    }, {
                        extend: "print",
                        text: "Imprimir",
                        className: "btn-sm"
                    }],
                    responsive: !0,
                    "bInfo": false,
                })

                0 !== $("#data-table4").length && $("#data-table4").DataTable({
                    "language": {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "No existen registros creados",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        buttons: {
                            copyTitle: 'Copiado al clipboard',
                            copySuccess: {
                                _: '%d filas copiadas',
                                1: '1 fila copiada'
                            }
                        }
                    },
                    dom: "Bfrtip",
                    buttons: [{
                        extend: "copy",
                        text: "Copiar",
                        className: "btn-sm"
                    }, {
                        extend: "csv",
                        className: "btn-sm",
                        charset: 'UTF-8',
                        bom: true
                    }, {
                        extend: "excel",
                        className: "btn-sm",
                        charset: 'UTF-8',
                        bom: true
                    }, {
                        extend: "pdf",
                        className: "btn-sm",
                        charset: 'UTF-8',
                        bom: true
                    }, {
                        extend: "print",
                        text: "Imprimir",
                        className: "btn-sm"
                    }],
                    responsive: !0,
                    "bInfo": false,
                })
            },
            TableManageButtons = function() {
                "use strict";
                return {
                    init: function() {
                        handleDataTableButtons()
                    }
                }
            }();

        $(document).ready(function() {
            TableManageButtons.init();
        });

    </script>
@endsection