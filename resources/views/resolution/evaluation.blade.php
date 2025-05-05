@extends('layouts.app')

@section('content')

    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('/') }}">Inicio</a></li>
        <li><a href="{{ route('staffManagement') }}">Gestión de Personal</a></li>
        <li class="active">Relaciones laborales individuales y colectivas</li>
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
                    Relaciones laborales individuales y colectivas
                </h4>
            </div>

            <div class="panel-body">

                {{--<form class="form-horizontal">
                    <div class="form-group">
                        <div class="pull-right m-r-15">
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModalcreate">
                                Nuevo
                            </a>
                        </div>
                    </div>
                </form>--}}


                <div class="table-responsive">

                    <h4>Anexos &nbsp
                        <button type="button" class="btn btn-sm btn-default addButton" data-toggle="modal"
                                data-target="#myModal"><i class="fa fa-plus"></i></button>
                    </h4>
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
                                                <li><a href="{{ url($section_annex->file_url) }}" target="_blank">Detalle</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="{{ route('deleteSectionAnnex', $section_annex->id) }}">Eliminar</a>
                                                </li>
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

                    <div id="myModalcreate" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                {{ Form::open(['route' => 'createResolution', 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                                {{ Form::hidden('id_user', $user->id) }}
                                {{ Form::hidden('alias', $section->alias) }}


                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Nueva resolución</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group{{ $errors->has('resolution_number') ? ' has-error' : '' }}">
                                        <label class="col-md-3 control-label">N° Resolución</label>
                                        <div class="col-md-8">
                                            {{ Form::text('resolution_number', null, ['class' => 'form-control', 'style' => '']) }}
                                        </div>
                                        <div class="col-md-offset-3 col-md-8">
                                            @if ($errors->has('resolution_number'))
                                                <span class="help-block">
                                    <strong>{{ $errors->first('resolution_number') }}</strong>
                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('issue_date') ? ' has-error' : '' }}">
                                        <label class="col-md-3 control-label">Fecha de Emisión</label>
                                        <div class="col-md-8">
                                            {{ Form::text('issue_date', null, ['class' => 'form-control', 'id' => 'issue_date','autocomplete' => 'off']) }}
                                        </div>
                                        <div class="col-md-offset-3 col-md-8">
                                            @if ($errors->has('issue_date'))
                                                <span class="help-block">
                                    <strong>{{ $errors->first('issue_date') }}</strong>
                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('issuing_organ') ? ' has-error' : '' }}">
                                        <label class="col-md-3 control-label">Órgano que Expide</label>
                                        <div class="col-md-8">
                                            {{ Form::text('issuing_organ', null, ['class' => 'form-control', 'style' => '']) }}
                                        </div>
                                        <div class="col-md-offset-3 col-md-8">
                                            @if ($errors->has('issuing_organ'))
                                                <span class="help-block">
                                    <strong>{{ $errors->first('issuing_organ') }}</strong>
                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                        <label class="col-md-3 control-label">Fecha de Inicio</label>
                                        <div class="col-md-8">
                                            {{ Form::text('start_date', null, ['class' => 'form-control', 'id' => 'start_date','autocomplete' => 'off']) }}
                                        </div>
                                        <div class="col-md-offset-3 col-md-8">
                                            @if ($errors->has('start_date'))
                                                <span class="help-block">
                                    <strong>{{ $errors->first('start_date') }}</strong>
                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                        <label class="col-md-3 control-label">Fecha de Fin</label>
                                        <div class="col-md-8">
                                            {{ Form::text('end_date', null, ['class' => 'form-control', 'id' => 'end_date','autocomplete' => 'off']) }}
                                        </div>
                                        <div class="col-md-offset-3 col-md-8">
                                            @if ($errors->has('end_date'))
                                                <span class="help-block">
                                    <strong>{{ $errors->first('end_date') }}</strong>
                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label class="col-md-3 control-label">Descripción</label>
                                        <div class="col-md-8">
                                            {{ Form::textarea('description', null, ['class' => 'form-control', 'style' => 'resize:none']) }}
                                        </div>
                                        <div class="col-md-offset-3 col-md-8">
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('constancy_url') ? ' has-error' : '' }}">
                                        <label class="col-md-3 control-label">Constancia</label>
                                        <div class="col-md-8">
                                            {{ Form::file('constancy_url', array('placeholder' => '','class' => 'form-control', 'accept' => 'application/pdf')) }}
                                        </div>
                                        <div class="col-md-offset-3 col-md-8">
                                            @if ($errors->has('constancy_url'))
                                                <span class="help-block">
                                    <strong>{{ $errors->first('constancy_url') }}</strong>
                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                                    <label class="col-md-3 control-label">Tipo</label>
                                    <div class="col-md-8">
                                        {{ Form::text('tipo', null, ['class' => 'form-control', 'style' => '']) }}
                                    </div>
                                    <div class="col-md-offset-3 col-md-8">
                                        @if ($errors->has('tipo'))
                                            <span class="help-block">
                                    <strong>{{ $errors->first('tipo') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('fecha_emision') ? ' has-error' : '' }}">
                                    <label class="col-md-3 control-label">Fecha de emisión</label>
                                    <div class="col-md-8">
                                        {{ Form::text('fecha_emision', null, ['class' => 'form-control', 'id' => 'fecha_emision','autocomplete' => 'off']) }}
                                    </div>
                                    <div class="col-md-offset-3 col-md-8">
                                        @if ($errors->has('fecha_emision'))
                                            <span class="help-block">
                                    <strong>{{ $errors->first('fecha_emision') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('puntaje') ? ' has-error' : '' }}">
                                    <label class="col-md-3 control-label">Puntaje</label>
                                    <div class="col-md-8">
                                        {{ Form::number('puntaje', null, ['class' => 'form-control', 'style' => '']) }}
                                    </div>
                                    <div class="col-md-offset-3 col-md-8">
                                        @if ($errors->has('puntaje'))
                                            <span class="help-block">
                                    <strong>{{ $errors->first('puntaje') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('calificacion') ? ' has-error' : '' }}">
                                    <label class="col-md-3 control-label">Calificación</label>
                                    <div class="col-md-8">
                                        {{ Form::number('calificacion', null, ['class' => 'form-control', 'style' => '']) }}
                                    </div>
                                    <div class="col-md-offset-3 col-md-8">
                                        @if ($errors->has('calificacion'))
                                            <span class="help-block">
                                    <strong>{{ $errors->first('calificacion') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('observaciones') ? ' has-error' : '' }}">
                                    <label class="col-md-3 control-label">Observaciones</label>
                                    <div class="col-md-8">
                                        {{ Form::textarea('observaciones', null, ['class' => 'form-control', 'style' => 'resize:none']) }}
                                    </div>
                                    <div class="col-md-offset-3 col-md-8">
                                        @if ($errors->has('observaciones'))
                                            <span class="help-block">
                                    <strong>{{ $errors->first('observaciones') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('informe_file') ? ' has-error' : '' }}">
                                    <label class="col-md-3 control-label">Informe de desempeño</label>
                                    <div class="col-md-8">
                                        {{ Form::file('informe_file', array('placeholder' => '','class' => 'form-control', 'accept' => 'application/pdf')) }}
                                    </div>
                                    <div class="col-md-offset-3 col-md-8">
                                        @if ($errors->has('informe_file'))
                                            <span class="help-block">
                                    <strong>{{ $errors->first('informe_file') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-offset-3 col-md-6">
                                        <button onclick="" id="submitAll" class="btn btn-info">Guardar</button>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>

                                {{ Form::close() }}

                            </div>

                        </div>

                    </div>


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
                                            @if ($errors->has('file'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('file') }}</strong>
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

        $("#issue_date,#end_date,#fecha_emision,.datepicker").datepicker({
            format:"dd-mm-yyyy",
            language:"es",
            startDate: '1d'
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });


        $( "#start_date" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
            $('#end_date').attr('disabled',false);
            $('#end_date').val("");
            $('#end_date').datepicker('setStartDate', e.date);
        });


    </script>
@endsection