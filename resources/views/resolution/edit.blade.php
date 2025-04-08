@extends('layouts.app')

@section('content')

    <h1 class="page-header">Resolución <small>Editar</small></h1>

    <div class="row">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
                <h4 class="panel-title">
                    <a href="{{ url('resolution/list/'.$arredirect['url1'].'/'.$arredirect['url2'].'/'.$arredirect['url3']) }}" class="btn btn-xs btn-icon btn-circle btn-success"><i class="fa fa-arrow-left"></i></a>
                    Edición de Resolución
                </h4>
            </div>
            <div class="panel-body">
                {{ Form::model($model, ['route' => 'updateResolution', 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}

                {{ Form::hidden('id_resolution', $model->id) }}
                {{ Form::hidden('constancy_path', $model->constancy_path) }}

                <div class="form-group{{ $errors->has('resolution_number') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">N° Resolución</label>
                    <div class="col-md-8">
                        {{ Form::text('resolution_number', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('resolution_number'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('resolution_number') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('id_resolution_type') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Tipo Resolución</label>
                    <div class="col-md-8">
                        {{ Form::select('id_resolution_type', $resolution_type_table, $model->id_resolution_type,['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('id_resolution_type'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('id_resolution_type') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('issue_date') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Emisión</label>
                    <div class="col-md-8">
                        {{ Form::text('issue_date',date('d-m-Y', strtotime($model->issue_date)),['class' => 'form-control','id' => 'issue_date']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('issue_date'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('issue_date') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('issuing_organ') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Órgano que Expide</label>
                    <div class="col-md-8">
                        {{ Form::text('issuing_organ', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('issuing_organ'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('issuing_organ') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Inicio</label>
                    <div class="col-md-8">
                        {{ Form::text('start_date',date('d-m-Y', strtotime($model->start_date)), ['class' => 'form-control','id' => 'start_date']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('start_date'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('start_date') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Fin</label>
                    <div class="col-md-8">
                        {{ Form::text('end_date', (is_null($model->end_date)) ? null : date('d-m-Y', strtotime($model->end_date)) , ['class' => 'form-control','id' => 'end_date']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('end_date'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('end_date') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Descripción</label>
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

                @if($resolution_type->flag_fields == true)
                    <div id="contenedorAdicional">
                        <div id="modal_text_work_position" class="form-group{{ $errors->has('work_position') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Cargo</label>
                            <div class="col-md-8">
                                {{ Form::text('work_position', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('work_position'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('work_position') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div id="modal_text_workplace" class="form-group{{ $errors->has('workplace') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Centro de Trabajo</label>
                            <div class="col-md-8">
                                {{ Form::text('workplace', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('workplace'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('workplace') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

                <div class="form-group{{ $errors->has('constancy_url') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Constancia</label>
                    <div class="col-md-8">
                        {{ Form::file('constancy_url', array('placeholder' => '','class' => 'form-control', 'accept' => 'application/pdf')) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('constancy_url'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('constancy_url') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-3 col-md-6">
                        <a type="button" href="{{ url('resolution/list/'.$arredirect['url1'].'/'.$arredirect['url2'].'/'.$arredirect['url3']) }}" class="btn btn-primary" > Cancelar</a>

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

        $(document).ready(function () {
            @if ($errors->any())
            $('#myModal').modal('toggle');
            @endif

        })

    </script>

    <script>

        $( "#issue_date,#end_date" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es"
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });


        $( "#start_date" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
            $('#end_date').attr('disabled',false);
            $('#end_date').val("");
            $('#end_date').datepicker('setStartDate', e.date);
        });

    </script>

@endsection

{{--TODO: Agregar cambio dinámico si se necesitan campos adicionales--}}