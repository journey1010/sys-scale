@extends('layouts.app')

@section('content')

    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('/') }}">Inicio</a></li>
        <li><a href="{{ route('allStudies', $model->id_user) }}">Formación Académica </a></li>
        <li class="active">Educación Superior</li>
    </ol>

    <h1 class="page-header">Educación Superior<small> &nbsp; {{ empty($model->id) ? "Añadir" : "Editar"  }}</small></h1>


    <div class="row">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="{{ url('academic/all_studies/'.$model->id_user) }}" class="btn btn-xs btn-icon btn-circle btn-success"><i class="fa fa-arrow-left"></i></a>
                    {{ $objUser == null ? "" : $objUser->name." ".$objUser->first_surname." ".$objUser->second_surname  }}
                </h4>
            </div>
            <div class="panel-body">
                {{ Form::model($model, ['route' => 'postUniversityEducation', 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                {{ Form::hidden('id', null, ['class' => '', 'style' => '']) }}
                {{ Form::hidden('id_user', null, ['class' => '', 'style' => '']) }}
                {{ Form::hidden('path_certificate', null, ['class' => '', 'style' => '']) }}
                <div class="form-group {{ $errors->has('name_university') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Centro de Estudios</label>
                    <div class="col-md-8">
                        {{ Form::text('name_university', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('name_university'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name_university') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('id_country_ue') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Ubicacion (País)</label>
                    <div class="col-md-8">
                        {{ Form::text('id_country_ue', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('id_country_ue'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_country_ue') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('id_department_ue') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Ubicacion (Departamento)</label>
                    <div class="col-md-8">
                        {{ Form::text('id_department_ue', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('id_department_ue'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_department_ue') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('id_province_ue') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Provincia (Ubicación)</label>
                    <div class="col-md-8">
                        {{ Form::text('id_province_ue', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('id_province_ue'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_province_ue') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('id_district_ue') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Distrito (Ubicación)</label>
                    <div class="col-md-8">
                        {{ Form::text('id_district_ue', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('id_district_ue'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_district_ue') }}</strong>
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
                <div class="form-group {{ $errors->has('date_begin_ue') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Inicio (Periodo de Estudios)</label>
                    <div class="col-md-8">
                        {{ Form::text('date_begin_ue', null, ['class' => 'form-control', 'id' => 'date_begin']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('date_begin_ue'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date_begin_ue') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('date_end_ue') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Fin (Periodo de Estudios)</label>
                    <div class="col-md-8">
                        {{ Form::text('date_end_ue', null, ['class' => 'form-control', 'id' => 'date_end']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('date_end_ue'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date_end_ue') }}</strong>
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

        $( "#date_end" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
            startDate: '+1d'
        }).on('changeDate', function(){
            $(this).datepicker('hide');
        });
        @if ($model->date_end_ue == '')
            $('#date_end').attr('disabled',true);
        @endif

    </script>

@endsection