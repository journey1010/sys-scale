@extends('layouts.app')

@section('content')

    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('/') }}">Inicio</a></li>
        <li><a href="{{ route('staffManagement') }}">Gestión de Personal</a></li>
        <li class="active">Licencias y Vacaciones</li>
    </ol>

    @include('template.partials.subMenuUser')

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
                    <a href="{{ url('staff_management') }}" class="btn btn-xs btn-icon btn-circle btn-success"><i class="fa fa-arrow-left"></i></a>
                    Licencias y vacaciones
                </h4>
            </div>

            <div class="panel-body">

                <div class="">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <h4>Tipos de licencias</h4>
                                {{--<h4>Listado de documentos de Licencias y Vacaciones</h4>--}}
                            </div>
                            <div class="col-xs-6">
                                <div class="pull-right">
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" style="margin-bottom: 115px;">
                            <thead>
                            <tr>
                                <th>Descripción</th>
                                <th>Vínculo</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!$model->resolutions->isEmpty())
                                @foreach($model->resolutions as $resolution)
                                    <tr>
                                        <td>{{ $resolution->description }}</td>
                                        <td>
                                            <a href="{{ route('getResolutions', [$resolution->id , $model->user_id, $resolution->section_id]) }}" class="btn btn-info btn-xs">ver</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="2" class="text-center">No hay Resoluciones para mostrar.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>

                    <h4>Documentos de Autorizaci&oacute;n de Vacaciones &nbsp<button type="button" class="btn btn-sm btn-default addButton" data-toggle="modal" data-target="#addVacationModal"><i class="fa fa-plus"></i></button></h4>

                        {{--<div style="padding-bottom: 5px"> D&iacute;as restantes (2017) : {{ $actual }} d&iacute;as </div>--}}
                        {{--<div style="padding-bottom: 5px"> Vacaciones acumuladas ({{ \Carbon\Carbon::now()->year - 1 }} - {{ \Carbon\Carbon::now()->year }}) : {{ $acumulative }} d&iacute;as </div>--}}


                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered" style="margin-bottom: 115px;">
                            <thead>
                            <tr>
                                <th class="col-md-1">Periodo</th>
                                <th class="col-md-1">N° Días</th>
                                <th>Fechas</th>
                                <th>Memorando</th>
                                {{--<th>Fecha Resoluci&oacute;n</th>--}}
                                {{--<th>Vacaciones</th>--}}
                                <th>Res. de licencias a cuenta</th>
                                <th>Doc. autoritativo de vacaciones</th>
                                {{--<th>Observaciones</th>--}}
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($vacation_authorizations as $licences)
                                <tr>
                                    <td>{{ $licences->anio }}</td>
                                    <td>{{ $licences->number_days }}</td>
                                    <td>{{ $licences->date_start }} - {{ $licences->date_end }}</td>
                                    <td>{{ config('constants.memorando')[$licences->memorando_type] }}</td>
                                    {{--{{ $licences->resolution_number }}--}}
{{--                                    <td>{{ config('constants.vacation_memorandum_type')[$licences->memorandum_type] }}</td>--}}
                                    <td>{{ config('constants.vacation_license_resolution_type')[$licences->license_resolution_type] }}</td>
                                    <td>{{ config('constants.vacation_suspension_document_type')[$licences->suspension_document_type] }}</td>
                                    {{--<td>{{ $licences->comment }}</td>--}}
                                    <td class="text-center">
                                        <div class="btn-group m-r-0 m-b-0">
                                            <a href="javascript:;" data-toggle="dropdown"
                                               class="btn btn-info btn-xs dropdown-toggle">Opciones <span
                                                        class="caret"></span></a>
                                            <ul class="dropdown-menu" style="left: unset; right: 0">
                                                <li><a href="{{ route('vacation.detail.get', ['id' => $licences->id]) }}">Detalle</a></li>
                                                <li><a href="{{ route('vacation.edit.get', ['id' => $licences->id]) }}">Editar</a></li>
                                                <li class="divider"></li>
                                                <li><a href="javascript:deleteVacation('{{ $licences->id }}')" data-id="{{ $licences->id }}">Eliminar</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No hay licencias para mostrar.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <h4>Documentos de Autorizaci&oacute;n de Licencias &nbsp<button type="button" class="btn btn-sm btn-default addButton" data-toggle="modal" data-target="#addLicenseModal"><i class="fa fa-plus"></i></button></h4>
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered" style="margin-bottom: 115px;">
                            <thead>
                            <tr>
                                <th class="col-md-1">N° Días</th>
                                <th>Fechas</th>
                                <th>Memorando</th>
                                {{--<th>Fecha Resoluci&oacute;n</th>--}}
                                <th>Con remuneraci&oacute;n</th>
                                <th>Tipo</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($licence_authorizations as $licences)
                                <tr>
                                    <td>{{ $licences->number_days }}</td>
                                    <td>{{ $licences->date_start }} - {{ $licences->date_end }}</td>
                                    <td>{{ config('constants.memorando')[$licences->memorando_type] }}</td>
{{--                                    <td>{{ $licences->resolution_number }}</td>--}}
                                    <td>{{ ($licences->with_remunerations == true ? 'Si' : 'No') }}</td>
                                    <td>{{ config('constants.license_license_resolution_type')[$licences->license_resolution_type] }}</td>
                                    <td class="text-center">
                                        <div class="btn-group m-r-0 m-b-0">
                                            <a href="javascript:;" data-toggle="dropdown"
                                               class="btn btn-info btn-xs dropdown-toggle">Opciones <span
                                                        class="caret"></span></a>
                                            <ul class="dropdown-menu" style="left: unset; right: 0">
                                                <li><a href="{{ route('license.detail.get', ['id' => $licences->id]) }}">Detalle</a></li>
                                                <li><a href="{{ route('license.edit.get', ['id' => $licences->id]) }}">Editar</a></li>
                                                <li class="divider"></li>
                                                <li><a href="javascript:deleteLicense('{{ $licences->id }}')" data-id="{{ $licences->id }}">Eliminar</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No hay licencias para mostrar.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <h4>Documentos de Autorizaci&oacute;n de Permisos &nbsp<button type="button" class="btn btn-sm btn-default addButton" data-toggle="modal" data-target="#addPermitModal"><i class="fa fa-plus"></i></button></h4>
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered" style="margin-bottom: 115px;"s>
                            <thead>
                            <tr>
                                <th class="col-md-1">N° Días</th>
                                <th>Fechas</th>
                                <th>Memorando</th>
                                {{--<th>Fecha Resoluci&oacute;n</th>--}}
                                <th>Con remuneraci&oacute;n</th>
                                <th>Motivo</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($permit_authorizations as $licences)
                                <tr>
                                    <td>{{ $licences->number_days }}</td>
                                    <td>{{ $licences->date_start }} - {{ $licences->date_end }}</td>
                                    <td>{{ config('constants.memorando')[$licences->memorando_type] }}</td>
{{--                                    <td>{{ $licences->resolution_number }}</td>--}}
                                    <td>{{ ($licences->with_remunerations == true ? 'Si' : 'No') }}</td>
                                    <td>{{ config('constants.permit_license_resolution_type')[$licences->permit_reason] }}</td>
                                    <td class="text-center">
                                        <div class="btn-group m-r-0 m-b-0">
                                            <a href="javascript:;" data-toggle="dropdown"
                                               class="btn btn-info btn-xs dropdown-toggle">Opciones <span
                                                        class="caret"></span></a>
                                            <ul class="dropdown-menu" style="left: unset; right: 0">
                                                <li><a href="{{ route('permit.detail.get', ['id' => $licences->id]) }}">Detalle</a></li>
                                                <li><a href="{{ route('permit.edit.get', ['id' => $licences->id]) }}">Editar</a></li>
                                                <li class="divider"></li>
                                                <li><a href="javascript:deletePermit('{{ $licences->id }}')" data-id="{{ $licences->id }}">Eliminar</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No hay licencias para mostrar.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <h4>Documentos de Suspensiones de vacaciones &nbsp<button type="button" class="btn btn-sm btn-default addButton" data-toggle="modal" data-target="#addSuspensionVacationModal"><i class="fa fa-plus"></i></button></h4>

                    {{--<div style="padding-bottom: 5px"> D&iacute;as restantes (2017) : {{ $actual }} d&iacute;as </div>--}}
                    {{--<div style="padding-bottom: 5px"> Vacaciones acumuladas ({{ \Carbon\Carbon::now()->year - 1 }} - {{ \Carbon\Carbon::now()->year }}) : {{ $acumulative }} d&iacute;as </div>--}}

                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered" style="margin-bottom: 115px;">
                            <thead>
                            <tr>
                                <th class="col-md-1">Periodo</th>
                                <th class="col-md-1">N° Días</th>
                                <th>Fechas</th>
                                <th>Memorando</th>
                                {{--<th>Fecha Resoluci&oacute;n</th>--}}
                                {{--<th>Vacaciones</th>--}}
                                <th>Res. de licencias a cuenta</th>
                                <th>Doc. autoritativo de vacaciones</th>
                                {{--<th>Observaciones</th>--}}
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($suspension_vacation_authorizations as $licences)
                                <tr>
                                    <td>{{ $licences->anio }}</td>
                                    <td>{{ $licences->number_days }}</td>
                                    <td>{{ $licences->date_start }} - {{ $licences->date_end }}</td>
                                    <td>{{ config('constants.memorando')[$licences->memorando_type] }}</td>
                                    {{--{{ $licences->resolution_number }}--}}
                                    {{--                                    <td>{{ config('constants.vacation_memorandum_type')[$licences->memorandum_type] }}</td>--}}
                                    <td>{{ config('constants.vacation_license_resolution_type')[$licences->license_resolution_type] }}</td>
                                    <td>{{ config('constants.vacation_suspension_document_type')[$licences->suspension_document_type] }}</td>
                                    {{--<td>{{ $licences->comment }}</td>--}}
                                    <td class="text-center">
                                        <div class="btn-group m-r-0 m-b-0">
                                            <a href="javascript:;" data-toggle="dropdown"
                                               class="btn btn-info btn-xs dropdown-toggle">Opciones <span
                                                        class="caret"></span></a>
                                            <ul class="dropdown-menu" style="left: unset; right: 0">
                                                <li><a href="{{ route('suspensionvacation.detail.get', ['id' => $licences->id]) }}">Detalle</a></li>
                                                <li><a href="{{ route('suspensionvacation.edit.get', ['id' => $licences->id]) }}">Editar</a></li>
                                                <li class="divider"></li>
                                                <li><a href="javascript:deleteSuspensionVacation('{{ $licences->id }}')" data-id="{{ $licences->id }}">Eliminar</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No hay licencias para mostrar.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <h4>Documentos de Licencias Especiales &nbsp<button type="button" class="btn btn-sm btn-default addButton" data-toggle="modal" data-target="#addSpecialLicenseModal"><i class="fa fa-plus"></i></button></h4>
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered" style="margin-bottom: 115px;">
                            <thead>
                            <tr>
                                <th class="col-md-1">N° Días</th>
                                <th>Fechas</th>
                                <th>Memorando</th>
                                {{--<th>Fecha Resoluci&oacute;n</th>--}}
                                <th>Con remuneraci&oacute;n</th>
                                <th>Tipo</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($special_licence_authorizations as $licences)
                                <tr>
                                    <td>{{ $licences->number_days }}</td>
                                    <td>{{ $licences->date_start }} - {{ $licences->date_end }}</td>
                                    <td>{{ config('constants.memorando')[$licences->memorando_type] }}</td>
                                    {{--                                    <td>{{ $licences->resolution_number }}</td>--}}
                                    <td>{{ ($licences->with_remunerations == true ? 'Si' : 'No') }}</td>
                                    <td>{{ config('constants.license_license_resolution_type')[$licences->license_resolution_type] }}</td>
                                    <td class="text-center">
                                        <div class="btn-group m-r-0 m-b-0">
                                            <a href="javascript:;" data-toggle="dropdown"
                                               class="btn btn-info btn-xs dropdown-toggle">Opciones <span
                                                        class="caret"></span></a>
                                            <ul class="dropdown-menu" style="left: unset; right: 0">
                                                <li><a href="{{ route('speciallicense.detail.get', ['id' => $licences->id]) }}">Detalle</a></li>
                                                <li><a href="{{ route('speciallicense.edit.get', ['id' => $licences->id]) }}">Editar</a></li>
                                                <li class="divider"></li>
                                                <li><a href="javascript:deleteSpecialLicense('{{ $licences->id }}')" data-id="{{ $licences->id }}">Eliminar</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No hay licencias para mostrar.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <h4>Anexos &nbsp<button type="button" class="btn btn-sm btn-default addButton" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></button></h4>
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th class="col-md-8">Descripción del documento</th>
                                <th>Vínculo</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if($section_annexes != null)
                                @forelse($section_annexes as $section_annex)
                                    <tr>
                                        <td>{{ $section_annex->name }}</td>
                                        <td class="text-center">
                                            <div class="btn-group m-r-0 m-b-0">
                                                <a href="javascript:;" data-toggle="dropdown"
                                                   class="btn btn-info btn-xs dropdown-toggle">Opciones <span
                                                            class="caret"></span></a>
                                                <ul class="dropdown-menu" style="left: unset; right: 0">
                                                    <li><a href="{{ url($section_annex->file_url) }}" target="_blank">Detalle</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="{{ route('deleteSectionAnnex', $section_annex->id) }}">Eliminar</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center">No hay anexos para mostrar.</td>
                                    </tr>
                                @endforelse
                            @endif
                            </tbody>
                        </table>
                    </div>



                    {{--Modal--}}
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">

                                {{ Form::open(['route' => 'createSectionAnnex', 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                                {{ Form::hidden('id_section', $model->section_id) }}
                                {{ Form::hidden('id_user', $model->user_id) }}

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Nuevo anexo</h4>
                                </div>

                                <div class="modal-body">
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

                                    <div class="form-group{{ $errors->has('number_doc') ? ' has-error' : '' }}">
                                        <label class="col-md-3 control-label">Número de Documento</label>
                                        <div class="col-md-8">
                                            {{ Form::text('number_doc', null, ['class' => 'form-control', 'style' => '']) }}
                                        </div>
                                        <div class="col-md-offset-3 col-md-8">
                                            @if ($errors->has('number_doc'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('number_doc') }}</strong>
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

                                    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                        <label class="col-md-3 control-label">Fecha</label>
                                        <div class="col-md-8">
                                            {{ Form::text('date', null, ['class' => 'form-control datepicker', 'style' => '','autocomplete' => 'off']) }}
                                        </div>
                                        <div class="col-md-offset-3 col-md-8">
                                            @if ($errors->has('date'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('file_url') ? ' has-error' : '' }}">
                                        <label class="col-md-3 control-label">Archivo</label>
                                        <div class="col-md-8">
                                            {{ Form::file('file_url', array('placeholder' => '','class' => 'form-control', 'accept' => '*/*')) }}
                                        </div>
                                        <div class="col-md-offset-3 col-md-8">
                                            @if ($errors->has('file_url'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('file_url') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-offset-3 col-md-6">
                                            {{ Form::submit('Añadir', ['class' => 'btn btn-info', 'style' => '']) }}
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                    @include('license.vacation.register')
                    @include('license.license.register')
                    @include('license.permit.register')
                    @include('license.suspension_vacation.register')
                    @include('license.special_license.register')

                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/custom.js') }}"></script>

    <script>



        $("#end_date1,#end_date2,#end_date3,.datepicker").datepicker({
            format:"dd-mm-yyyy",
            language:"es",
            startDate: '1d'
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });


        $( "#start_date1,#issue_date1" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
            $('#end_date1').attr('disabled',false);
            $('#end_date1').val("");
            $('#end_date1').datepicker('setStartDate', e.date);
        });

        $( "#start_date2,#issue_date2" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
            $('#end_date2').attr('disabled',false);
            $('#end_date2').val("");
            $('#end_date2').datepicker('setStartDate', e.date);
        });

        $( "#start_date3,#issue_date3" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
            $('#end_date3').attr('disabled',false);
            $('#end_date3').val("");
            $('#end_date3').datepicker('setStartDate', e.date);
        });

        function deleteVacation(id) {
            swal({
                title: '¿Desea eliminar el documento?',
                text: "Una vez eliminado no podrá recuperarlo",
                type: "warning",
                confirmButtonText: "Si",
                cancelButtonText: " No",
                showCancelButton: true
            }).then(function() {
                var url = '{{ url('license/vacation/delete') }}';
                post(url, {id: id, user: '{{ $model->user_id }}' });
            },function(dismiss) {
            });
        }

        function deleteSuspensionVacation(id) {
            swal({
                title: '¿Desea eliminar el documento?',
                text: "Una vez eliminado no podrá recuperarlo",
                type: "warning",
                confirmButtonText: "Si",
                cancelButtonText: " No",
                showCancelButton: true
            }).then(function() {
                var url = '{{ url('license/suspension_vacation/delete') }}';
                post(url, {id: id, user: '{{ $model->user_id }}' });
            },function(dismiss) {
            });
        }

        $('#license_remu').change(function() {
            if(this.checked) {
                $("#license_type").html("<option value='1'>Por enfermedad</option><option value='2'>Por gravidez</option><option value='3'>Por fallecimiento de c&oacute;nyuge, padres, hijos o hermanos</option><option value='4'>Por capacitaci&oacute;n oficializada</option><option value='5'>Por citacion expresa: judicial, militar y policial</option><option value='6'>Por funcion edil</option></option><option value='6'>Año Sabatico</option></option><option value='6'>Realizacion de actividades como miembro de comisiones educativas de alto nivel</option>");
            } else {
                $("#license_type").html("<option value='7'>Por motivos particulares</option><option value='8'>Por capactitaci&oacute;n no oficializada</option></option><option value='6'>Por desempeño de funciones en otras instituciones o universidades nacionales y extranjeros</option>");
            }
        });

        $('#suspension_license_remu').change(function() {
            if(this.checked) {
                $("#suspension_license_type").html("<option value='1'>Por paternidad Ley 29409 modificado por la Ley 30807</option><option value='2'>Por enfermedad grave o terminal o sufra, accidente de hijo, padre o madre, padres Ley 30012 cónyuge o conviviente</option><option value='3'>La Ley que concede el derecho de licencia al trabajador de la actividad pública y privada para la asistencia médica y la terapia de rehabilitación de personas con discapacidad, Ley N° 30119</option><option value='4'>Excepcional por enfermedad</option>");
            } else {
                $("#suspension_license_type").html("<option value='7'>Por motivos particulares</option><option value='8'>Por capactitaci&oacute;n no oficializada</option></option><option value='6'>Por desempeño de funciones en otras instituciones o universidades nacionales y extranjeros</option>");
            }
        });

        function deleteLicense(id) {
            swal({
                title: '¿Desea eliminar el documento?',
                text: "Una vez eliminado no podrá recuperarlo",
                type: "warning",
                confirmButtonText: "Si",
                cancelButtonText: " No",
                showCancelButton: true
            }).then(function() {
                var url = '{{ url('license/license/delete') }}';
                post(url, {id: id, user: '{{ $model->user_id }}' });
            },function(dismiss) {
            });
        }

        function deleteSpecialLicense(id) {
            swal({
                title: '¿Desea eliminar el documento?',
                text: "Una vez eliminado no podrá recuperarlo",
                type: "warning",
                confirmButtonText: "Si",
                cancelButtonText: " No",
                showCancelButton: true
            }).then(function() {
                var url = '{{ url('license/special_license/delete') }}';
                post(url, {id: id, user: '{{ $model->user_id }}' });
            },function(dismiss) {
            });
        }

        $('#permit_remu').change(function() {
            if(this.checked) {
                $("#permit_type").html("<option value='1'>Por enfermedad</option><option value='2'>Por gravidez</option><option value='3'>Por fallecimiento de c&oacute;nyuge, padres, hijos o hermanos</option><option value='4'>Por capacitaci&oacute;n oficializada</option><option value='5'>Por citacion expresa: judicial, militar y policial</option><option value='6'>Por funcion edil</option></option><option value='6'>Año Sabatico</option></option><option value='6'>Realizacion de actividades como miembro de comisiones educativas de alto nivel</option>");
            } else {
                $("#permit_type").html("<option value='7'>Por motivos particulares</option><option value='8'>Por capactitaci&oacute;n no oficializada</option></option><option value='6'>Por desempeño de funciones en otras instituciones o universidades nacionales y extranjeros</option>");
            }
        });
        function deletePermit(id) {
            swal({
                title: '¿Desea eliminar el documento?',
                text: "Una vez eliminado no podrá recuperarlo",
                type: "warning",
                confirmButtonText: "Si",
                cancelButtonText: " No",
                showCancelButton: true
            }).then(function() {
                var url = '{{ url('license/permit/delete') }}';
                post(url, {id: id, user: '{{ $model->user_id }}' });
            },function(dismiss) {
            });
        }
    </script>

@endsection