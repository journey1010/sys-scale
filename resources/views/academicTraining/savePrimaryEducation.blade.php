@extends('layouts.app')

@section('content')

    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('/') }}">Inicio</a></li>
        <li><a href="{{ route('allStudies', $model->id_user) }}">Formación Académica </a></li>
        <li class="active">Educación Primaria</li>
    </ol>

    <h1 class="page-header">Educación Primaria<small> &nbsp; {{ empty($model->id) ? "Añadir" : "Editar"  }}</small></h1>


    <div class="row">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="{{ url('academic/all_studies/'.$model->id_user) }}" class="btn btn-xs btn-icon btn-circle btn-success"><i class="fa fa-arrow-left"></i></a>
                    {{ $objUser == null ? "" : $objUser->name." ".$objUser->first_surname." ".$objUser->second_surname  }}
                </h4>
            </div>
            <div class="panel-body">
                {{ Form::model($model, ['route' => 'postPrimaryEducation', 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                {{ Form::hidden('id', null, ['class' => '', 'style' => '']) }}
                {{ Form::hidden('id_user', null, ['class' => '', 'style' => '']) }}
                {{ Form::hidden('path_certificate', null, ['class' => '', 'style' => '']) }}
                <div class="form-group {{ $errors->has('name_school') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Centro de Estudios</label>
                    <div class="col-md-8">
                        {{ Form::text('name_school', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('name_school'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name_school') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('id_country') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Ubicacion (País)</label>
                    <div class="col-md-8">
                        {{ Form::text('id_country', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('id_country'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_country') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('id_department') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Ubicacion (Departamento)</label>
                    <div class="col-md-8">
                        {{--<select class="form-control" id="departamentoNacimiento" name="id_department">
                            <option value="" disabled selected>Seleccione departamento</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>--}}
                        {{ Form::text('id_department', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('id_department'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_department') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('id_province') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Ubicación (Provincia)</label>
                    <div class="col-md-8">
                        {{--<select class="form-control" id="provinciaNacimiento" name="id_province" disabled>
                            <option value="" disabled selected>Seleccione provincia</option>
                        </select>--}}
                        {{ Form::text('id_province', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('id_province'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_province') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('id_district') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Ubicación (Distrito)</label>
                    <div class="col-md-8">
                        {{--<select class="form-control" id="distritoNacimiento" name="id_district" disabled>
                            <option value="" disabled selected>Seleccione distrito</option>
                        </select>--}}
                        {{ Form::text('id_district', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('id_district'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_district') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('date_begin') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Inicio (Periodo de Estudios)</label>
                    <div class="col-md-8">
                        {{ Form::text('date_begin', null, ['class' => 'form-control', 'id' => 'date_begin']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('date_begin'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date_begin') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('date_end') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Fin (Periodo de Estudios)</label>
                    <div class="col-md-8">
                        {{ Form::text('date_end', null, ['class' => 'form-control', 'id' => 'date_end']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('date_end'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date_end') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('url_certificate') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Constancia</label>
                    <div class="col-md-8">
                        {!! Form::file('url_certificate', array('placeholder' => '','class' => 'form-control', 'accept' => 'application/pdf')) !!}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if($model->id != null)
                            <br>
                            <a href="{{$model->url_certificate}}" download><i class="fa fa-cloud-download fa-2x"></i></a>
                        @endif
                        @if ($errors->has('url_certificate'))
                            <span class="help-block">
                                <strong>{{ $errors->first('url_certificate') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-3 col-md-6">
                        <a type="button" href="{{ url('academic/all_studies/'.$model->id_user) }}" class="btn btn-primary" >Cancelar</a>
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

        $( "#date_begin" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
            $('#date_end').attr('disabled',false);
            $('#date_end').val("");
            $('#date_end').datepicker('setStartDate', e.date);
        });

        $( "#date_end" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
            startDate: '+1d'
        }).on('changeDate', function(){
            $(this).datepicker('hide');
        });

        @if ($model->date_end == '')
            $('#date_end').attr('disabled',true);
        @endif




        //
//        $('#date_begin').data("DateTimePicker").maxDate(moment());
//        $('#date_end').data("DateTimePicker").maxDate(moment());

//        $("#date_begin").on("dp.change", function (e) {
//            $('#date_end').data("DateTimePicker").minDate($('#date_begin').data("DateTimePicker").date());
//        });

    </script>

    <script>

        /*$(document).ready(function() {
            //PARTE ASINCRONA, NO DESBINDEAR LOS CALLBACKS SI NO SE HACE UN RACE CONDITION EN actualizarProvincia y actualizarDistrito
            //Obtener valores de departamente, provincia y distrito de la BD y llenarlos en el formulario
            {{--valorDepartamentoNacimiento = '{{ $model->id_department }}';--}}
            {{--valorProvinciaNacimiento = '{{ $model->id_province }}';--}}
            {{--valorDistritoNacimiento = '{{ $model->id_district }}';--}}
            if(valorDepartamentoNacimiento != '')
            {
                $('#departamentoNacimiento option:selected').attr('selected', null);
                $('#departamentoNacimiento option[value="' + valorDepartamentoNacimiento +'"]').prop('selected', true);

                actualizarProvincia('departamentoNacimiento', 'provinciaNacimiento', function() {
                    if(valorProvinciaNacimiento != '') {
                        $('#provinciaNacimiento option:selected').attr('selected', null);
                        $('#provinciaNacimiento option[value="' + valorProvinciaNacimiento + '"]').prop("selected", true);
                    }

                    actualizarDistrito('provinciaNacimiento', 'distritoNacimiento', function() {
                        if (valorDistritoNacimiento != '') {
                            $('#distritoNacimiento option:selected').attr('selected', null);
                            $('#distritoNacimiento option[value="' + valorDistritoNacimiento + '"]').prop("selected", true);
                        }
                    });
                });

            }

        });

        //Dropdown dinamico distrito, provincia, departamento
        function actualizarProvincia(selectIdDepartamento, selectIdProvincia, callback)
        {
            $selectDepartamento = $('#' + selectIdDepartamento);
            $('#' + selectIdProvincia).prop('disabled', true);

            $.ajax({
                type: "get",
                {{--url: "{{ route('personalIdentificationGetProvinces') }}",--}}
                data: { id_department: $selectDepartamento.val() },
                async: true,
                success: function (data) {

                    $selectProvincia = $('#' + selectIdProvincia);
                    $selectProvincia.empty();

                    $.each(data, function(key, value) {
                        $selectProvincia.append('<option value="' + value['id'] + '">' + value['name'] + '</option>');
                    });

                    $selectProvincia.prop('disabled', false);
                    if(callback)
                        callback();
                }

            });
        }

        function actualizarDistrito(selectIdProvincia, selectIdDistrito, callback)
        {
            $selectProvincia = $('#' + selectIdProvincia);
            $('#' + selectIdDistrito).prop('disabled', true);

            $.ajax({
                type: "get",
                {{--url: "{{ route('personalIdentificationGetDistricts') }}",--}}
                data: { id_province: $selectProvincia.val() },
                async: true,
                success: function (data) {

                    $selectDistrito = $('#' + selectIdDistrito);
                    $selectDistrito.empty();

                    $.each(data, function(key, value) {
                        $selectDistrito.append('<option value="' + value['id'] + '">' + value['name'] + '</option>');
                    });

                    $selectDistrito.prop('disabled', false);

                    if(callback)
                        callback();
                }

            });

        }

        //Eventos de cambio para actualizar provincias y distritos
        $('#departamentoNacimiento').change( function() {
            actualizarProvincia('departamentoNacimiento', 'provinciaNacimiento',
                function() { actualizarDistrito('provinciaNacimiento', 'distritoNacimiento') });
        });

        $('#provinciaNacimiento').change( function() {
            actualizarDistrito('provinciaNacimiento', 'distritoNacimiento');
        });
*/
    </script>

@endsection