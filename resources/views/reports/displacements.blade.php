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
        <li class="active">Desplazamientos</li>
    </ol>
    <h1 class="page-header">Reporte de Desplazamientos <small></small></h1>

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
            <div class="panel-body">
                {{--<h4>Listado de Vacaciones Autorizadas</h4>--}}
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Apellidos</th>
                            <th>Nombres</th>
                            <th>Depend. origen</th>
                            <th>Depend. destino</th>
                            <th>Fecha desplazam.</th>
                            <th>Motivo desplazam.</th>
                            <th>Documento</th>
                            <th>Condici&oacute;n</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($displacements as $item)
                            <tr>
                                <td>{{ $item->surname }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->dependencia_origen }}</td>
                                <td>{{ $item->dependencia_destino }}</td>
                                <td>{{ date('d/m/Y', strtotime($item->start_date)) }}</td>
                                <td>{{ $item->tipo }}</td>
                                <td>{{ $item->resolution_number }}</td>
                                <td>{{ $item->condition }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
                    },{
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