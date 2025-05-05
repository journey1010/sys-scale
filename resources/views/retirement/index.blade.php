@extends('layouts.app')

@section('content')

    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('/') }}">Inicio</a></li>
        <li><a href="{{ route('staffManagement') }}">Gestión de Personal</a></li>
        <li class="active">Retiro y Régimen Pensionario</li>
    </ol>

    @include('template.partials.subMenuUser')

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
                <h4 class="panel-title">
                    <a href="{{ url('staff_management') }}" class="btn btn-xs btn-icon btn-circle btn-success"><i class="fa fa-arrow-left"></i></a>
                    Retiro y Régimen Pensionario
                </h4>
            </div>

            <div class="panel-body">

                <div class="table-responsive">

                    <h4>Anexos &nbsp<button type="button" class="btn btn-sm btn-default addButton" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></button></h4>
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th class="col-md-2">Nombre</th>
                            <th class="col-md-3">Descripción</th>
                            <th class="col-md-2">Numero de doc.</th>
                            <th class="col-md-2">Fecha</th>
                            <th>Vínculo</th>
                        </tr>
                        </thead>

                        <tbody>
                            @if($section_annexes != null)
                                @forelse($section_annexes as $section_annex)
                                    <tr>
                                        <td>{{ $section_annex->name }}</td>
                                        <td>{{ $section_annex->description }}</td>
                                        <td>{{ $section_annex->number_doc }}</td>
                                        <td>{{ $section_annex->date }}</td>
                                        <td class="text-center">
                                            <div class="btn-group m-r-0 m-b-0">
                                                <a href="javascript:;" data-toggle="dropdown"
                                                   class="btn btn-info btn-xs dropdown-toggle">Opciones <span
                                                            class="caret"></span></a>
                                                <ul class="dropdown-menu" style="left: unset; right: 0">
                                                    <li><a href="{{ url($section_annex->file_url) }}" target="_blank">Detalle</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="{{ route('deleteSectionAnnex', $section_annex->id) }}">Eliminar</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No hay anexos para mostrar.</td>
                                    </tr>
                                @endforelse
                            @endif
                        </tbody>
                    </table>

                    {{--Modal--}}
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">

                                {{ Form::open(['route' => 'createSectionAnnex', 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                                {{ Form::hidden('id_section', $model->section_id) }}
                                {{ Form::hidden('id_user', $model->user_id) }}

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Nuevo anexo</h4>
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

                                    <div class="form-group{{ $errors->has('number_doc') ? ' has-error' : '' }}">
                                        <label class="col-md-3 control-label">Número de Documento</label>
                                        <div class="col-md-8">
                                            {{ Form::text('number_doc', null, ['class' => 'form-control', 'style' => '']) }}
                                        </div>
                                        <div class="col-md-offset-3 col-md-8">
                                            @if ($errors->has('number_doc'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('number_doc') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label class="col-md-3 control-label">Descripción</label>
                                        <div class="col-md-8">
                                            {{ Form::textarea('description', null, ['class' => 'form-control', 'style' => '']) }}
                                        </div>
                                        <div class="col-md-offset-3 col-md-8">
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                        <label class="col-md-3 control-label">Fecha</label>
                                        <div class="col-md-8">
                                            {{ Form::text('date', null, ['class' => 'form-control datepicker', 'style' => '','autocomplete' => 'off']) }}
                                        </div>
                                        <div class="col-md-offset-3 col-md-8">
                                            @if ($errors->has('date'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('file_url') ? ' has-error' : '' }}">
                                        <label class="col-md-3 control-label">Archivo</label>
                                        <div class="col-md-8">
                                            {{ Form::file('file_url', array('placeholder' => '','class' => 'form-control', 'accept' => '*/*')) }}
                                        </div>
                                        <div class="col-md-offset-3 col-md-8">
                                            @if ($errors->has('file_url'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('file_url') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-offset-3 col-md-6">
                                            {{ Form::submit('Añadir', ['class' => 'btn btn-info', 'style' => '']) }}
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

            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script>

        $(".datepicker").datepicker({
            format:"dd-mm-yyyy",
            language:"es",
            endDate: '1d'
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });

    </script>
@endsection