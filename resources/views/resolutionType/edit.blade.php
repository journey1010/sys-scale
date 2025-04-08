@extends('layouts.app')

@section('content')

    <h1 class="page-header">Tipo de Resolución <small>Editar</small></h1>

    <div class="row">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
                <h4 class="panel-title">
                    <a href="{{ url('resolution_type/index') }}" class="btn btn-xs btn-icon btn-circle btn-success"><i class="fa fa-arrow-left"></i></a>
                    Edición de Tipo de Resolución
                </h4>
            </div>
            <div class="panel-body">
                {{ Form::model($model, ['route' => 'updateResolutionType', 'class' => 'form-horizontal', 'method' => 'post']) }}

                {{ Form::hidden('id_resolution_type', $model->id) }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Nombre</label>
                    <div class="col-md-8">
                        {{ Form::text('name', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('alias') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Alias</label>
                    <div class="col-md-8">
                        {{ Form::text('alias', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('alias'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('alias') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Descripción</label>
                    <div class="col-md-8">
                        {{ Form::text('description', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('description'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('flag_vacations') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">¿Para Vacaciones?</label>
                    <div class="col-md-8">
                        {{ Form::select('flag_vacations', [false => 'No', true => 'Si'], null, ['class' => 'form-control select2']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('flag_vacations'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('flag_vacations') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-3 col-md-6">
                        <a type="button" href="{{ url('resolution_type/index') }}" class="btn btn-primary" >Cancelar</a>
                        {{ Form::submit('Guardar', ['class' => 'btn btn-info', 'style' => '']) }}
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(".select2").select2();
    </script>
@endsection
{{--TODO: Agregar cambio dinámico si se necesitan campos adicionales--}}