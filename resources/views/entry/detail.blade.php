@extends('layouts.app')

@section('content')
    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('/') }}">Inicio</a></li>
        <li><a href="{{ route('staffManagement') }}">Gestión de Personal</a></li>
        <li><a href="{{ route('entriesIndex', $model->id_user) }}">Incorporación</a></li>
        <li class="active">Detalle</li>
    </ol>
    <h1 class="page-header">Incorporación<small>Detalle</small></h1>

    <div class="row">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
                <h4 class="panel-title">Detalle de Resolucion</h4>
            </div>
            <div class="panel-body">
                {{ Form::model($model, ['class' => 'form-horizontal', 'method' => 'post']) }}
                <div class="form-group">
                    <label class="col-md-3 control-label">N° Resolución</label>
                    <div class="col-md-8">
                        {{ Form::text('resolutionNumber', null, ['class' => 'form-control', 'disabled' => '', 'style' => 'cursor:default']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Tipo Resolución</label>
                    <div class="col-md-8">
                        {{ Form::text('resolutionType', null, ['class' => 'form-control', 'disabled' => '', 'style' => 'cursor:default']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Fecha de Emisión</label>
                    <div class="col-md-8">
                        {{ Form::text('issueDate', null, ['class' => 'form-control', 'disabled' => '', 'style' => 'cursor:default']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Organo que Expide</label>
                    <div class="col-md-8">
                        {{ Form::text('issuingOrgan', null, ['class' => 'form-control', 'disabled' => '', 'style' => 'cursor:default']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Descripción</label>
                    <div class="col-md-8">
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'disabled' => '', 'style' => 'cursor:default']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Fecha de Inicio</label>
                    <div class="col-md-8">
                        {{ Form::text('startDate', null, ['class' => 'form-control', 'disabled' => '', 'style' => 'cursor:default']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Fecha de Fin</label>
                    <div class="col-md-8">
                        {{ Form::text('endDate', null, ['class' => 'form-control', 'disabled' => '', 'style' => 'cursor:default']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Constancia</label>
                    <div class="col-md-8">
                        <a href="{{ $model->constancyUrl }}" target="_blank" class="btn btn-xs btn-default">
                            <i class="fa fa-download"></i>
                        </a>

                    </div>
                </div>

                @if(Auth::user()->hasRole('admin'))
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3"></label>
                        <div class="col-md-6 col-sm-6">
                            <a href="{{ route('entriesEdit', $model->id_user) }}" class="btn btn-info">Editar</a>
                        </div>
                    </div>
                @endif
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection