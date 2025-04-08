@extends('layouts.app')

@section('content')

    <h1 class="page-header">
        Sección <small>Detalle</small>
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
                <h4 class="panel-title">
                    <a href="{{ url('section/index') }}" class="btn btn-xs btn-icon btn-circle btn-success"><i class="fa fa-arrow-left"></i></a>
                    Detalle de Sección
                </h4>
            </div>

            <div class="panel-body">
                {{ Form::open(['class' => 'form-horizontal', 'method' => 'post']) }}
                <div class="form-group">
                    <label class="col-md-3 control-label">Nombre</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="{{ $section->name or '' }}" disabled />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Alias</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="{{ $section->alias or '' }}" disabled />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Asignaciones</label>
                    <div class="col-md-8">
                        @if(count($assignments) <= 0)
                            <label class="form-group col-md-12">No hay asignaciones para mostrar</label>
                        @endif
                        @foreach($assignments as $assignment)
                        <div class="">
                            <input type="text" class="form-control" value="{{ $assignment or '' }}" disabled />
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3"></label>
                    <div class="col-md-6 col-sm-6">
                        <a type="button" href="{{ url('section/index') }}" class="btn btn-primary" >Listado de secciones</a>
                        <a href="{{ route('editSection', $section->id) }}" class="btn btn-info">Editar</a>
                    </div>
                </div>
                {{ Form::close() }}

            </div>
        </div>
    </div>

@endsection

{{--TODO: Mejorar detail de sección--}}