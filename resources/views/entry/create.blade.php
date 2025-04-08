@extends('layouts.app')

@section('content')
    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('/') }}">Inicio</a></li>
        <li><a href="{{ route('staffManagement') }}">Gestión de Personal</a></li>
        <li><a href="{{ route('entriesIndex', $model->id_user) }}">Ingresos y Reingresos</a></li>
        <li class="active">Crear</li>
    </ol>
    <h1 class="page-header">Ingresos y Reingresos <small>Crear</small></h1>

    <div class="row">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
                <h4 class="panel-title">Creación de Resolucion</h4>
            </div>
            <div class="panel-body">
                {{ Form::model($model, ['route' => 'entriesCreatePost', 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                {{ Form::hidden('id_user', null, ['class' => '', 'style' => '']) }}
                <div class="form-group{{ $errors->has('resolutionNumber') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">N° Resolución</label>
                    <div class="col-md-8">
                        {{ Form::text('resolutionNumber', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('resolutionNumber'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('resolutionNumber') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('resolutionType') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Tipo Resolución</label>
                    <div class="col-md-8">
                        {{ Form::text('resolutionType', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('resolutionType'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('resolutionType') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('issueDate') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Emisión</label>
                    <div class="col-md-8">
                        {{ Form::text('issueDate', null, ['class' => 'form-control', 'id' => 'issueDate']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('issueDate'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('issueDate') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('issuingOrgan') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Organo que Expide</label>
                    <div class="col-md-8">
                        {{ Form::text('issuingOrgan', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('issuingOrgan'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('issuingOrgan') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Organo que Expide</label>
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
                <div class="form-group{{ $errors->has('startDate') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Inicio</label>
                    <div class="col-md-8">
                        {{ Form::text('startDate', null, ['class' => 'form-control', 'id' => 'startDate']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('startDate'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('startDate') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('endDate') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Fin</label>
                    <div class="col-md-8">
                        {{ Form::text('endDate', null, ['class' => 'form-control', 'id' => 'endDate']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('endDate'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('endDate') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('constancyUrl') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Constancia</label>
                    <div class="col-md-8">
                        {!! Form::file('constancyUrl', array('placeholder' => '','class' => 'form-control', 'accept' => 'application/pdf')) !!}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('constancyUrl'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('constancyUrl') }}</strong>
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
        $( document ).ready(function() {
            $('#issueDate').datepicker({
                'format':'yyyy-mm-dd',
            });

            $('#startDate').datepicker({
                'format':'yyyy-mm-dd',
            });

            $('#endDate').datepicker({
                'format':'yyyy-mm-dd',
            });
        });
    </script>
@endsection