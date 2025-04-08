@extends('layouts.app')

@section('content')

    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('/') }}">Inicio</a></li>
        <li class="active">Gestión de Condición Laboral</li>
    </ol>
    <h1 class="page-header">Gestión de Condición Laboral <small></small></h1>

    <div class="row">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
                <h4 class="panel-title">Listado de Condiciones Laborales</h4>
            </div>
            <form class="form-horizontal">
                <div class="form-group" style="margin-left: 0px;margin-right: 0px;margin-bottom: 0px">
                    <div class="pull-right m-r-15" style="padding-top: 20px;">
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                            Nuevo
                        </a>
                    </div>
                </div>
            </form>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="table_laborconditional" class="table table-striped table-bordered" style="margin-bottom: 300px">
                        <thead>
                        <tr>
                            <th>Nombre de condición</th>
                            <th>Fecha de creación</th>
                            <th style="text-align: center;">Editar</th>
                            <th style="text-align: center;">Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $item)
                            <tr>
                                <td> {{ $item->name }} </td>
                                <td> {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:m:s') }} </td>
                                <td class="text-center"> <button class="btn btn-success editar" data-name="{{ $item->name }}" value="{{ $item->id }}"><i class="icon-magnifier-add"></i> Editar</button> </td>
                                <td class="text-center"> <button class="btn btn-success eliminar" data-name="{{ $item->name }}" value="{{ $item->id }}"><i class="fa fa-trash"></i> Eliminar</button> </td>
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

                {{ Form::open(['route' => 'savelaborconditional', 'class' => 'form-horizontal', 'method' => 'post']) }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Nueva Condici&oacute;n Laboral</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Nombres</label>
                        <div class="col-md-8">
                            {{ Form::text('name', null, ['class' => 'form-control', 'style' => '']) }}
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-6">
                            {{ Form::submit('Guardar', ['class' => 'btn btn-info', 'style' => '']) }}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>

                {{ Form::close() }}
            </div>

        </div>

    </div>





    <div id="myModal2" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                {{ Form::open(['route' => 'updatelaborconditional', 'class' => 'form-horizontal', 'method' => 'post']) }}

                {!! Form::hidden('invisible_update',null , array('id' => 'invisible_update')) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar datos de Condici&oacute;n Laboral</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Nombres</label>
                        <div class="col-md-8">
                            {{ Form::text('name', null, ['class' => 'form-control','id' => 'name_update', 'style' => '']) }}
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-6">
                            {{ Form::submit('Guardar', ['class' => 'btn btn-info', 'style' => '']) }}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>

                {{ Form::close() }}
            </div>

        </div>

    </div>


@endsection

@section('scripts')
    <script>

        $(document).ready(function() {
            @if ($errors->any())
            $('#myModal').modal('toggle');
            @endif

        });


        $('#table_laborconditional').on("click", ".editar", function() {
            this.blur();
            var button = $(this);
            var name = button.data('name');
            button.prop("disabled",true);
            button.blur();

            $("#invisible_update").val($(this).val());
            $("#name_update").val(name);

            $('#myModal2').modal({
                show: true
            });
            button.removeAttr("disabled");
            button.prop('disabled', false);
        });




        $('#table_laborconditional').on("click", ".eliminar", function() {
            this.blur();
            var button = $(this);
            var name = button.data('name');
            var id = $(this).val();
            button.prop("disabled",true);
            button.blur();

            swal({
                title: '¡ Atención !',
                text: "¿Se encuentra seguro de eliminar?",
                type: "warning",
                confirmButtonText: "Sí, estoy seguro!",
                cancelButtonText: "Cancelar",
                showCancelButton: true,
                closeOnConfirm: false
            }).then(function() {
                var url = '{{ url('depcon/deletelaborconditional') }}';

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
                button.prop("disabled",false);
            });
        });


    </script>
@endsection
