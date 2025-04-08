@extends('layouts.app')

@section('content')

    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('/') }}">Inicio</a></li>
        <li><a href="{{ route('allStudies', $model->id_user) }}">Formación Académica </a></li>
        <li class="active">Maestría y/o Doctorado</li>
    </ol>

    <h1 class="page-header">Maestría y/o Doctorado<small> &nbsp; {{ empty($model->id) ? "Añadir" : "Editar"  }}</small></h1>


    <div class="row">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">{{ $objUser == null ? "" : $objUser->name." ".$objUser->first_surname." ".$objUser->second_surname  }}</h4>
            </div>
            <div class="panel-body">
                {{ Form::model($model, ['route' => 'postMasterDoctorDegree', 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
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
                <div class="form-group {{ $errors->has('date_expedition_md') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Expedición </label>
                    <div class="col-md-8">
                        {{ Form::text('date_expedition_md', null, ['class' => 'form-control', 'id' => 'date_expedition_md']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('date_expedition_md'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date_expedition_md') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('date_begin_md') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Inicio (Periodo de Estudios)</label>
                    <div class="col-md-8">
                        {{ Form::text('date_begin_md', null, ['class' => 'form-control', 'id' => 'date_begin_md']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('date_begin_md'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date_begin_md') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('date_end_md') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Fin (Periodo de Estudios)</label>
                    <div class="col-md-8">
                        {{ Form::text('date_end_md', null, ['class' => 'form-control', 'id' => 'date_end_md']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('date_end_md'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date_end_md') }}</strong>
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
                        {{ Form::submit('Guardar', ['class' => 'btn btn-info', 'style' => '']) }}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>

        $( "#date_begin_md" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
            $('#date_end_md').attr('disabled',false);
            $('#date_end_md').val("");
            $('#date_end_md').datepicker('setStartDate', e.date);
        });

        $( "#date_end_md,#date_expedition_md" ).datepicker({
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