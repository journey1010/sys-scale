@extends('layouts.app')

@section('content')

    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('/') }}">Inicio</a></li>
        <li><a href="{{ route('allStudies', $model->id_user) }}">Formación académica y capacitación</a></li>
        <li class="active">Diplomados y/o Especializaciones</li>
    </ol>

    <h1 class="page-header">Diplomados y/o Especializaciones<small> &nbsp; {{ empty($model->id) ? "Añadir" : "Editar"  }}</small></h1>


    <div class="row">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">{{ $objUser == null ? "" : $objUser->name." ".$objUser->first_surname." ".$objUser->second_surname  }}</h4>
            </div>
            <div class="panel-body">
                {{ Form::model($model, ['route' => 'postPostgraduateInformation', 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                {{ Form::hidden('id', null, ['class' => '', 'style' => '']) }}
                {{ Form::hidden('id_user', null, ['class' => '', 'style' => '']) }}
                {{ Form::hidden('path_certificate', null, ['class' => '', 'style' => '']) }}
                <div class="form-group {{ $errors->has('name_school') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Centro de Estudios</label>
                    <div class="col-md-8">
                        {{ Form::text('name_school', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('name_school'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('name_school') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('concentration') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Especialidad</label>
                    <div class="col-md-8">
                        {{ Form::text('concentration', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('concentration'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('concentration') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('date_expedition_pi') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Expedición </label>
                    <div class="col-md-8">
                        {{ Form::text('date_expedition_pi', null, ['class' => 'form-control', 'id' => 'date_expedition_pi']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('date_expedition_pi'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('date_expedition_pi') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('hours') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Hours </label>
                    <div class="col-md-8">
                        {{ Form::number('hours', null, ['class' => 'form-control', 'min' => '0'] ) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('hours'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('hours') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('date_begin_pi') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Inicio (Periodo de Estudios)</label>
                    <div class="col-md-8">
                        {{ Form::text('date_begin_pi', null, ['class' => 'form-control', 'id' => 'date_begin']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('date_begin_pi'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('date_begin_pi') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('date_end_pi') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Fin (Periodo de Estudios)</label>
                    <div class="col-md-8">
                        {{ Form::text('date_end_pi', null, ['class' => 'form-control', 'id' => 'date_end']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('date_end_pi'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('date_end_pi') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('url_certificate') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Constancia</label>
                    <div class="col-md-8">
                        {{ Form::file('url_certificate', array('placeholder' => '','class' => 'form-control', 'accept' => 'application/pdf')) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if($model->id != null)
                            <br>
                            <a href="{{$model->url_certificate}}" download><i class="fa fa-cloud-download fa-2x"></i></a>
                        @endif
                        @if ($errors->has('url_certificate'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('url_certificate') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-3 col-md-6">
                        {{ Form::submit('Añadir', ['class' => 'btn btn-info', 'style' => '']) }}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        $( "#date_begin" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
            $('#date_end').attr('disabled',false);
            $('#date_end').val("");
            $('#date_end').datepicker('setStartDate', e.date);
        });

        $( "#date_end,#date_expedition_pi" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
        }).on('changeDate', function(){
            $(this).datepicker('hide');
        });
        @if ($model->date_end == '')
            $('#date_end').attr('disabled',true);
        @endif

    </script>

@endsection