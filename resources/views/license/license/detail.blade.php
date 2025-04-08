@extends('layouts.app')

@section('content')

    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('/') }}">Inicio</a></li>
        <li><a href="{{ route('staffManagement') }}">Gestión de Personal</a></li>
        <li><a href="{{ route('licenseIndex', ['id' => $resolution->id_user]) }}">Licencias y Vacaciones</a></li>
        <li class="active">Detalle</li>
    </ol>

    <h1 class="page-header">
        Documento de Autorizaci&oacute;n de Licencias <small>Detalle</small>
    </h1>

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
                <h4 class="panel-title">Detalle del Documento</h4>
            </div>

            <div class="panel-body">
                {{ Form::open(['class' => 'form-horizontal', 'method' => 'post']) }}

                <div class="form-group">
                    <label class="col-md-3 control-label">N° Resolución</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="{{ $resolution->resolution_number or '' }}" disabled />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Tipo Resolución</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="{{ $resolution_type->name or '' }}" disabled />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Tipo de Memorando</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="{{ config('constants.memorando')[$resolution->memorando_type] }}" disabled />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Fecha Resolución</label>
                    <div class="col-md-8">
                        <input type="date" class="form-control" value="{{ $resolution->issue_date or '' }}" disabled />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Órgano que Expide</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="{{ $resolution->issuing_organ or '' }}" disabled />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Fecha de Inicio</label>
                    <div class="col-md-8">
                        <input type="date" class="form-control" value="{{ $resolution->start_date or '' }}" disabled />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Fecha de Fin</label>
                    <div class="col-md-8">
                        <input type="date" class="form-control" value="{{ $resolution->end_date or '' }}" disabled />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Descripción</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="{{ $resolution->description or '' }}" disabled />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Constancia</label>
                    <div class="col-md-8">
                        @if($resolution->constancy_url == null)
                            <label class="label label-danger">NO ADJUNTO</label>
                        @else
                            <label class="label label-success">ADJUNTO</label>
                            <a href="{{ url($resolution->constancy_url) }}" target="_blank" class="btn btn-xs btn-default">
                                <i class="fa fa-download"></i>
                            </a>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('remunerations') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Remunerada</label>
                    <div class="col-md-8">
                        <input type="hidden" name="remunerations" value="0">
                        <div class="checkbox">
                            <label>
                                <input id="license_remu" name="remunerations" type="checkbox" value="1" disabled="disabled" {{ ($license->with_remunerations ? 'checked="checked"' : '') }}>
                                ¿Con goce de remuneraci&oacute;n?
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('license_type') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Tipo de Licencia</label>
                    <div class="col-md-8">
                        {!! Form::select('license_type', config('constants.license_license_resolution_type'), $license->license_resolution_type, ['class' => 'form-control','disabled'=>'disabled']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Observaciones</label>
                    <div class="col-md-8">
                        <textarea class="form-control" disabled >{{ $license->comment or '' }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3"></label>
                        <div class="col-md-6 col-sm-6">
                            <a href="{{ route('license.edit.get', ['id' => $license->id]) }}" class="btn btn-info">Editar</a>
                        </div>
                </div>
                {{ Form::close() }}

            </div>
        </div>
    </div>

@endsection