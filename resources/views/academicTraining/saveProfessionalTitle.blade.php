@extends('layouts.app')

@section('content')

    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('/') }}">Inicio</a></li>
        <li><a href="{{ route('allStudies', $model->id_user) }}">Formación Académica </a></li>
        <li class="active">Título Profesional</li>
    </ol>

    <h1 class="page-header">Título Profesional<small> &nbsp; {{ empty($model->id_user) ? "Añadir" : "Editar"  }}</small></h1>


    <div class="row">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="{{ url('academic/all_studies/'.$model->id_user) }}" class="btn btn-xs btn-icon btn-circle btn-success"><i class="fa fa-arrow-left"></i></a>
                    {{ $objUser == null ? "" : $objUser->name." ".$objUser->first_surname." ".$objUser->second_surname  }}
                </h4>
            </div>
            <div class="panel-body">
                {{ Form::model($model, ['route' => 'postProfessionalTitle', 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                {{ Form::hidden('id', null, ['class' => '', 'style' => '']) }}
                {{ Form::hidden('id_user', null, ['class' => '', 'style' => '']) }}
                {{ Form::hidden('path_certificate', null, ['class' => '', 'style' => '']) }}
                <div class="form-group {{ $errors->has('name_college') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Centro de Estudios</label>
                    <div class="col-md-8">
                        {{ Form::text('name_college', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('name_college'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name_college') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('id_country_pt') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Ubicacion (País)</label>
                    <div class="col-md-8">
                        {{ Form::text('id_country_pt', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('id_country_pt'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_country_pt') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('id_department_pt') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Ubicacion (Departamento)</label>
                    <div class="col-md-8">
                        {{ Form::text('id_department_pt', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('id_department_pt'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_department_pt') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('id_province_pt') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Provincia (Ubicación)</label>
                    <div class="col-md-8">
                        {{ Form::text('id_province_pt', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('id_province_pt'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_province_pt') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('id_district_pt') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Distrito (Ubicación)</label>
                    <div class="col-md-8">
                        {{ Form::text('id_district_pt', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('id_district_pt'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_district_pt') }}</strong>
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
                <div class="form-group {{ $errors->has('number_register_title') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Número de Registro de Título</label>
                    <div class="col-md-8">
                        {{ Form::text('number_register_title', null, ['class' => 'form-control', 'id' => 'number_register_title']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('number_register_title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('number_register_title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('date_register_title_pt') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Registro de Título</label>
                    <div class="col-md-8">
                        {{ Form::text('date_register_title_pt', null, ['class' => 'form-control', 'id' => 'date_register_title']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('date_register_title_pt'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date_register_title_pt') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('date_begin_pt') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Inicio (Periodo de Estudios)</label>
                    <div class="col-md-8">
                        {{ Form::text('date_begin_pt', null, ['class' => 'form-control', 'id' => 'date_begin']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('date_begin_pt'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date_begin_pt') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('date_end_pt') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Fin (Periodo de Estudios)</label>
                    <div class="col-md-8">
                        {{ Form::text('date_end_pt', null, ['class' => 'form-control', 'id' => 'date_end']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('date_end_pt'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date_end_pt') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('mention') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Mención</label>
                    <div class="col-md-8">
                        {{ Form::text('mention', null, ['class' => 'form-control', 'id' => 'date_end']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('mention'))
                            <span class="help-block">
                                <strong>{{ $errors->first('mention') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('url_certificate') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Constancia</label>
                    <div class="col-md-8">
                        {!! Form::file('url_certificate', array('placeholder' => '','class' => 'form-control', 'accept' => 'application/pdf')) !!}
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
                        <a type="button" href="{{ url('academic/all_studies/'.$model->id_user) }}" class="btn btn-primary" >Cancelar</a>
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

        $( "#date_begin" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
            $('#date_end').attr('disabled',false);
            $('#date_end').val("");
            $('#date_end').datepicker('setStartDate', e.date);
        });


        $("#date_register_title ,#date_end").datepicker({
            format:"dd-mm-yyyy",
            language:"es"
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });


    </script>


@endsection