@extends('layouts.app')

@section('content')

    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('/') }}">Inicio</a></li>
        <li><a href="{{ route('allStudies', $model->id_user) }}">Formación académica y capacitación</a></li>
        <li class="active">Colegiatura</li>
    </ol>

    <h1 class="page-header">Colegiatura<small> &nbsp; {{ empty($model->id) ? "Añadir" : "Editar"  }}</small></h1>


    <div class="row">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">{{ $objUser == null ? "" : $objUser->name." ".$objUser->first_surname." ".$objUser->second_surname  }}</h4>
            </div>
            <div class="panel-body">
                {{ Form::model($model, ['route' => 'postTuitionInformation', 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                {{ Form::hidden('id', null, ['class' => '', 'style' => '']) }}
                {{ Form::hidden('id_user', null, ['class' => '', 'style' => '']) }}
                {{ Form::hidden('path_certificate', null, ['class' => '', 'style' => '']) }}
                <div class="form-group {{ $errors->has('number_tuition') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">N° de Colegiatura</label>
                    <div class="col-md-8">
                        {{ Form::text('number_tuition', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('number_tuition'))
                            <span class="help-block">
                                <strong>{{ $errors->first('number_tuition') }}</strong>
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