@extends('layouts.app')

@section('content')

    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Inicio</a></li>
        <li><a href="javascript:;">Formación Académica</a></li>
        <li class="active">Diplomados y/o especializaciones</li>
    </ol>

    <h1 class="page-header">Diplomados y/o especializaciones<small> &nbsp; Información</small></h1>


    <div class="row">
        @if($listPostGraduate->isEmpty())
            <div class="col-md-12">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">{{ $objUser == null ? "" : $objUser->name." ".$objUser->first_surname." ".$objUser->second_surname  }}</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-8" style="padding-left: 45px;">
                                    {{ Form::label('No presenta Diplomados y/o Especializaciones', null, ['class' => 'control-label', 'style' => 'font-size:21px']) }}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @else
            @foreach($listPostGraduate as $objPostGraduate)
                @if($objPostGraduate != null)
                    <div class="col-md-12">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">
                                <h4 class="panel-title">{{ $objUser == null ? "" : $objUser->name  }} - {{$objPostGraduate->college }}</h4>
                            </div>
                            <div class="panel-body">
                                {{ Form::model($objPostGraduate, ['class' => 'form-horizontal']) }}
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
                                    <label class="col-md-3 control-label">Fecha de Expedición</label>
                                    <div class="col-md-8">
                                        {{ Form::text('fechainicio', null, ['class' => 'form-control', 'disabled' => '', 'style' => 'cursor:default']) }}
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
                                    <label class="col-md-3 control-label">Horas</label>
                                    <div class="col-md-8">
                                        {{ Form::text('hours', null, ['class' => 'form-control', 'disabled' => '', 'style' => 'cursor:default']) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Constancia</label>
                                    <div class="col-md-8">
                                        @if( $objPostGraduate->url == null || $objPostGraduate->url == '')
                                            {{ Form::label('No presenta', null, ['class' => 'control-label','style' => 'font-weight:100;padding-left:8px']) }}
                                        @else
                                            <a href="{{ $objPostGraduate->url }}" class="btn btn-default btn-sm" download><i class="fa fa-download"></i> &nbsp; Descargar</a>
                                        @endif
                                    </div>
                                </div>
                                {{--<div class="form-group">
                                    <label class="col-md-3 control-label">Estado de Validación</label>
                                    <div class="col-md-8">
                                        {{ Form::label('', $objPostGraduate->state, ['class' => 'control-label','style' => 'font-weight:100;padding-left:8px']) }}
                                    </div>
                                </div>--}}

                                @if(Auth::user()->hasRole('admin'))
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3"></label>
                                        <div class="col-md-6 col-sm-6">
                                            <a href="{{url('#')}}" class="btn btn-primary">Editar</a>
                                        </div>
                                    </div>
                                @endif
                                {!! Form::close() !!}
                            </div><br>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>

@endsection

@section('scripts')

@endsection