@extends('layouts.app')

@section('content')

    <h1 class="page-header">Tipos de Resolución</h1>

    <div class="row">

        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                                class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                                class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                       data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
                <h4 class="panel-title">Listado de Tipos de Resolución</h4>
            </div>

            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="pull-right m-r-15">
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                                Nuevo
                            </a>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered" style="margin-bottom: 300px">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Alias</th>
                            <th>Descripción</th>
                            <th>¿Para Vacaciones?</th>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($resolution_types as $resolution_type)
                            <tr>
                                <td>{{ $resolution_type->name }}</td>
                                <th>{{ $resolution_type->alias }}</th>
                                <td>{{ $resolution_type->description }}</td>
                                <td>{{ $resolution_type->flag_vacations == true ? 'Si' : 'No' }}</td>
                                <td class="text-center">
                                    <div class="btn-group m-r-0 m-b-0">
                                        <a href="javascript:;" data-toggle="dropdown"
                                           class="btn btn-info btn-xs dropdown-toggle">Opciones <span
                                                    class="caret"></span></a>
                                        <ul class="dropdown-menu" style="left: unset; right: 0">
                                            <li><a href="{{ route('editResolutionType', $resolution_type->id) }}">Editar</a></li>
                                            <li class="divider"></li>
                                            <li><a href="{{ route('deleteResolutionType', $resolution_type->id) }}">Eliminar</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{--Modal--}}
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    {{ Form::open(['route' => 'createResolutionType', 'class' => 'form-horizontal', 'method' => 'post']) }}

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Nuevo tipo de resolución</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Nombre</label>
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

                        <div class="form-group{{ $errors->has('alias') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Alias</label>
                            <div class="col-md-8">
                                {{ Form::text('alias', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('alias'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('alias') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Descripción</label>
                            <div class="col-md-8">
                                {{ Form::text('description', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('flag_vacations') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">¿Para Vacaciones?</label>
                            <div class="col-md-8">
                                {{ Form::select('flag_vacations', [false => 'No', true => 'Si'], null, ['class' => 'form-control select2']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('flag_vacations'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('flag_vacations') }}</strong>
                                </span>
                                @endif
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
    </div>

@endsection

@section('scripts')
    <script>

        $(".select2").select2();
        $(document).ready(function() {
            @if ($errors->any())
            $('#myModal').modal('toggle');
            @endif

        })

    </script>
@endsection
