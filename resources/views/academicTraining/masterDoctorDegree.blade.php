@extends('layouts.app')

@section('content')

    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Inicio</a></li>
        <li><a href="javascript:;">Formación académica y capacitación/a></li>
        <li class="active">Maestrías y Doctorados</li>
    </ol>

    <h1 class="page-header">Maestrías y Doctorados<small> &nbsp; Información</small></h1>


    <div class="row">
        @if($listMasterDoctorDegree->isEmpty())
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
                                    {{ Form::label('No presenta Maestrías y/o Doctorados', null, ['class' => 'control-label', 'style' => 'font-size:21px']) }}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @else
            @foreach($listMasterDoctorDegree as $objMasterDoctorDegree)
                @if($objMasterDoctorDegree != null)
                    <div class="col-md-12">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">
                                <h4 class="panel-title">{{ $objUser == null ? "" : $objUser->name  }} - {{$objMasterDoctorDegree->college}}</h4>
                            </div>
                            <div class="panel-body">
                                {{ Form::model($objMasterDoctorDegree, ['class' => 'form-horizontal']) }}
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Centro de Estudios</label>
                                    <div class="col-md-8">
                                        {{ Form::text('college', null, ['class' => 'form-control', 'disabled' => '', 'style' => 'cursor:default']) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Especialidad</label>
                                    <div class="col-md-8">
                                        {{ Form::text('concentration', null, ['class' => 'form-control', 'disabled' => '', 'style' => 'cursor:default']) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Fecha de Expedición</label>
                                    <div class="col-md-8">
                                        {{ Form::text('expedation', null, ['class' => 'form-control', 'disabled' => '', 'style' => 'cursor:default']) }}
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
                                    <label class="col-md-3 control-label">Constancia</label>
                                    <div class="col-md-8">
                                        @if( $objMasterDoctorDegree->url == null || $objMasterDoctorDegree->url == '')
                                            {{ Form::label('No presenta', null, ['class' => 'control-label','style' => 'font-weight:100;padding-left:8px']) }}
                                        @else
                                            <a href="{{ $objMasterDoctorDegree->url }}" class="btn btn-default btn-sm" download><i class="fa fa-download"></i> &nbsp; Descargar</a>
                                        @endif
                                    </div>
                                </div>
                                {{--<div class="form-group">
                                    <label class="col-md-3 control-label">Estado de Validación</label>
                                    <div class="col-md-8">
                                        {{ Form::label('', $objMasterDoctorDegree->state, ['class' => 'control-label','style' => 'font-weight:100;padding-left:8px']) }}
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