@extends('layouts.app')

@section('content')

    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Inicio</a></li>
        <li><a href="javascript:;">Formación Académica</a></li>
        <li class="active">Título Profesional</li>
    </ol>

    <h1 class="page-header">Título Profesional<small> &nbsp; Información</small></h1>


    <div class="row">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">{{ $objUser == null ? "" : $objUser->name." ".$objUser->first_surname." ".$objUser->second_surname  }}</h4>
            </div>
            <div class="panel-body">
                @if($objProfessionalTitle == null)
                    {{ Form::model($objProfessionalTitle, ['class' => 'form-horizontal']) }}
                    <div class="form-group">
                        <label class="col-md-5 control-label"></label>
                        <div class="col-md-7">
                            {{ Form::label('No presenta título profesional', null, ['class' => 'control-label', 'style' => 'font-size:21px']) }}
                        </div>
                    </div>
                    {!! Form::close() !!}
                @else
                    {{ Form::model($objProfessionalTitle, ['class' => 'form-horizontal']) }}
                    <div class="form-group">
                        <label class="col-md-3 control-label">Especialidad</label>
                        <div class="col-md-8">
                            {{ Form::text('concentration', null, ['class' => 'form-control', 'disabled' => '', 'style' => 'cursor:default']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Centro de Estudios</label>
                        <div class="col-md-8">
                            {{ Form::text('college', null, ['class' => 'form-control', 'disabled' => '', 'style' => 'cursor:default']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">País</label>
                        <div class="col-md-8">
                            {{ Form::text('pais', null, ['class' => 'form-control', 'disabled' => '', 'style' => 'cursor:default']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Departamento</label>
                        <div class="col-md-8">
                            {{ Form::text('departamento', null, ['class' => 'form-control', 'disabled' => '', 'style' => 'cursor:default']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Provincia</label>
                        <div class="col-md-8">
                            {{ Form::text('provincia', null, ['class' => 'form-control', 'disabled' => '', 'style' => 'cursor:default']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Distrito</label>
                        <div class="col-md-8">
                            {{ Form::text('distrito', null, ['class' => 'form-control', 'disabled' => '', 'style' => 'cursor:default']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Fecha de Inicio (Periodo de Estudios)</label>
                        <div class="col-md-8">
                            {{ Form::text('fechainicio', null, ['class' => 'form-control', 'disabled' => '', 'style' => 'cursor:default']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Fecha de Fin (Periodo de Estudios)</label>
                        <div class="col-md-8">
                            {{ Form::text('fechafin', null, ['class' => 'form-control', 'disabled' => '', 'style' => 'cursor:default']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Número de registro de título</label>
                        <div class="col-md-8">
                            {{ Form::text('number_register_title', null, ['class' => 'form-control', 'disabled' => '', 'style' => 'cursor:default']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Fecha de registro Título</label>
                        <div class="col-md-8">
                            {{ Form::text('date_register_title', null, ['class' => 'form-control', 'disabled' => '', 'style' => 'cursor:default']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Constancia</label>
                        <div class="col-md-8">
                            @if( $objProfessionalTitle->url == null || $objProfessionalTitle->url == '')
                                {{ Form::label('No presenta', null, ['class' => 'control-label','style' => 'font-weight:100;padding-left:8px']) }}
                            @else
                                <a href="{{ $objProfessionalTitle->url }}" class="btn btn-default btn-sm" download><i class="fa fa-download"></i> &nbsp; Descargar</a>
                            @endif
                        </div>
                    </div>
                    {{--<div class="form-group">
                        <label class="col-md-3 control-label">Estado de Validación</label>
                        <div class="col-md-8">
                            {{ Form::label('', $objProfessionalTitle->state, ['class' => 'control-label','style' => 'font-weight:100;padding-left:8px']) }}
                        </div>
                    </div>--}}

                    @if(Auth::user()->hasRole('admin'))
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3"></label>
                            <div class="col-md-6 col-sm-6">
                                <a href="{{ route('saveProfessionalTitle',$objProfessionalTitle->id_user, $objProfessionalTitle->id ) }}" class="btn btn-primary">Editar</a>
                            </div>
                        </div>
                    @endif
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection