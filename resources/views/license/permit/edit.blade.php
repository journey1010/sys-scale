@extends('layouts.app')

@section('content')
    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('/') }}">Inicio</a></li>
        <li><a href="{{ route('staffManagement') }}">Gestión de Personal</a></li>
        <li><a href="{{ route('licenseIndex', ['id' => $resolution->id_user]) }}">Licencias y Vacaciones</a></li>
        <li class="active">Editar</li>
    </ol>

    <h1 class="page-header"> Documento de Autorizaci&oacute;n de Permiso <small>Editar</small></h1>

    <div class="row">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
                <h4 class="panel-title">
                    <a href="{{ route('licenseIndex', ['id' => $resolution->id_user]) }}" class="btn btn-xs btn-icon btn-circle btn-success"><i class="fa fa-arrow-left"></i></a>
                    Edición de Resolución
                </h4>
            </div>

            <div class="panel-body">
                {{ Form::open(['route' => 'permit.edit.post', 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}

                {{ Form::hidden('id_resolution', $resolution->id) }}
                {{ Form::hidden('id_license', $license->id) }}
                {{ Form::hidden('constancy_path', $resolution->constancy_path) }}

                <div class="form-group{{ $errors->has('resolution_number') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Memorando</label>
                    <div class="col-md-8">
                        {{ Form::text('resolution_number', $resolution->resolution_number, ['class' => 'form-control', 'style' => '']) }}
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
                        {{ Form::select('id_resolution_type', $resolution_types, $resolution->id_resolution_type,['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('id_resolution_type'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('id_resolution_type') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('memorando_type') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Tipo de Memorando</label>
                    <div class="col-md-8">
                        {{ Form::select('id_resolution_type', $resolution_types, $resolution->id_resolution_type,['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('memorando_type'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('memorando_type') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('issue_date') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Emisión</label>
                    <div class="col-md-8">
                        {{ Form::select('memorando_type',[ 1 => 'Memorando', 2 => 'Memorando Multiple', 3 => 'Oficio', 4 => 'Oficio Multiple' ], $resolution->memorando_type,['class' => 'form-control', 'id' => 'memorando_type','required' => true]) }}
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
                        {{ Form::text('issuing_organ', $resolution->issuing_organ, ['class' => 'form-control', 'style' => '']) }}
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
                        {{ Form::text('start_date', is_null($resolution->start_date) ? null : \Carbon\Carbon::parse($resolution->start_date)->format('d-m-Y'), ['class' => 'form-control', 'id' => 'start_date']) }}
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
                        {{ Form::text('end_date', is_null($resolution->end_date) ? null : \Carbon\Carbon::parse($resolution->end_date)->format('d-m-Y'), ['class' => 'form-control', 'id' => 'end_date']) }}
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
                        {{ Form::textarea('description', $resolution->description, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('description'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

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

                <div class="form-group{{ $errors->has('remunerations') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Remunerada</label>
                    <div class="col-md-8">
                        <input type="hidden" name="remunerations" value="0">
                        <div class="checkbox">
                            <label>
                                <input id="license_remu" name="remunerations" type="checkbox" value="1" {{ ($license->with_remunerations ? 'checked="checked"' : '') }}>
                                ¿Con goce de remuneraci&oacute;n?
                            </label>
                        </div>
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('remunerations'))
                            <span class="help-block"><strong>{{ $errors->first('remunerations') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('permit_type') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Tipo de Licencia</label>
                    <div class="col-md-8">
                        @if($license->with_remunerations)
                            {!! Form::select('permit_type', config('constants.permit_license_resolution_type_A'), $license->permit_reason, ['class' => 'form-control', 'id' => 'permit_type']) !!}
                        @else
                            {!! Form::select('permit_type', config('constants.permit_license_resolution_type_B'), $license->permit_reason, ['class' => 'form-control', 'id' => 'permit_type']) !!}
                        @endif
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('permit_type'))
                            <span class="help-block"><strong>{{ $errors->first('permit_type') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Observación</label>
                    <div class="col-md-8">
                        {{ Form::textarea('comment', $license->comment, ['class' => 'form-control', 'style' => 'height: 100px;']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('comment'))
                            <span class="help-block"><strong>{{ $errors->first('comment') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-3 col-md-6">
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
        $('#license_remu').change(function() {
            if(this.checked) {
                $("#permit_type").html("<option value='1'>Por enfermedad</option><option value='2'>Por gravidez</option><option value='3'>Por capacitaci&oacute;n oficializada</option><option value='4'>Por citaci&oacute;n expresa</option><option value='5'>Por funci&oacute;n edil</option><option value='6'>Por docencia o estudios universitarios</option><option value='7'>Por representatividad sindical</option><option value='8'>Por lactancia</option><option value='9'>Por refrigerio</option><option value='10'>Descanso por onom&aacute;stico</option><option value='11'>A cuenta de vacaciones</option><option value='12'>Otros</option>");
            } else {
                $("#permit_type").html("<option value='13'>Por motivos particulares</option><option value='14'>Por capactitaci&oacute;n no oficializada</option><option value='15'>Otros</option>");
            }
        });

        $( "#end_date,#issue_date" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es"
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });


        $( "#start_date" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es"
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
            $('#end_date').attr('disabled',false);
            $('#end_date').val("");
            $('#end_date').datepicker('setStartDate', e.date);
        });


    </script>
@endsection