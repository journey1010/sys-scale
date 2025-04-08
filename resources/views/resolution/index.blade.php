@extends('layouts.app')

@section('content')
    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('/') }}">Inicio</a></li>
        <li><a href="{{ route('staffManagement') }}">Gestión de Personal</a></li>
        <li><a href="{{ route($section->alias, $user->id) }}">{{ $section->name }}</a></li>
        <li class="active">{{ $resolution_type->description }}</li>
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
                    <a href="{{ route($section->alias, $user->id) }}" class="btn btn-xs btn-icon btn-circle btn-success"><i class="fa fa-arrow-left"></i></a>

                    Listado de {{ $resolution_type->description or 'ERROR' }}
                </h4>
            </div>

            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="pull-right m-r-15">
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                                Nuevo
                            </a>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered" style="margin-bottom: 300px">
                        <thead>
                        <tr>
                            <th>Número</th>
                            <th>Tipo</th>
                            <th>Fecha de emisión</th>
                            <th>Órgano que expide</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha de término</th>
                            <th>Descripción</th>
                            <th>Constancia</th>
                            {{--<th>Estado de validación</th>--}}
                            <td>Accesos</td>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($resolutions as $resolution)
                            <tr>
                                <td>{{ $resolution->resolution_number }}</td>
                                <td>{{ $resolution_type->name }}</td>
                                <td>{{ $resolution->issue_date }}</td>
                                <td>{{ $resolution->issuing_organ }}</td>
                                <td>{{ $resolution->start_date }}</td>
                                <td>{{ $resolution->end_date }}</td>
                                <td>{{ $resolution->description }}</td>
                                <td>
                                    @if($resolution->constancy_url == "")
                                        <label class="label label-danger">NO ADJUNTO</label>
                                    @else
                                        <a href="{{ url($resolution->constancy_url) }}" target="_blank" class="btn btn-info btn-xs" role="button">Ver</a>
                                    @endif
                                </td>
                                {{--<td>{{ $resolution->state_validation }}</td>--}}
                                <td class="text-center">
                                    <div class="btn-group m-r-0 m-b-0">
                                        <a href="javascript:;" data-toggle="dropdown"
                                           class="btn btn-info btn-xs dropdown-toggle">Opciones <span
                                                    class="caret"></span></a>
                                        <ul class="dropdown-menu" style="left: unset; right: 0">
                                            <li><a href="{{ route('detailResolution', $resolution->id).'?o1='.$arredirect['url1'].'&o2='.$arredirect['url2'].'&o3='.$arredirect['url3'] }}">Detalle</a></li>
                                            <li><a href="{{ route('editResolution', $resolution->id).'?o1='.$arredirect['url1'].'&o2='.$arredirect['url2'].'&o3='.$arredirect['url3'] }}">Editar</a></li>
                                            <li class="divider"></li>
                                            <li><a href="{{ route('deleteResolution', $resolution->id) }}">Eliminar</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">No hay resoluciones para mostrar.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{--Modal--}}
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    {{ Form::open(['route' => 'createResolution', 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                    {{ Form::hidden('id_user', $user->id) }}
                    {{ Form::hidden('alias', $section->alias) }}
                    {{ Form::hidden('id_section', $id_section) }}
                    {{ Form::hidden('id_resolution_type', $resolution_type->id) }}


                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Nueva resolución</h4>
                    </div>
                    <div class="modal-body">
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

                        <div class="form-group{{ $errors->has('issue_date') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Fecha de Emisión</label>
                            <div class="col-md-8">
                                {{ Form::text('issue_date', null, ['class' => 'form-control', 'id' => 'issue_date']) }}
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
                                {{ Form::text('start_date', null, ['class' => 'form-control', 'id' => 'start_date']) }}
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
                                {{ Form::text('end_date', null, ['class' => 'form-control', 'id' => 'end_date']) }}
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
                                {{ Form::textarea('description', null, ['class' => 'form-control', 'style' => 'resize:none']) }}
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
                            <div id="modal_text_work_position"
                                 class="form-group{{ $errors->has('work_position') ? ' has-error' : '' }}">
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

                            <div id="modal_text_workplace"
                                 class="form-group{{ $errors->has('workplace') ? ' has-error' : '' }}">
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
                    </div>

                    @if($section->alias =='careerIndex')
                        <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Tipo</label>
                            <div class="col-md-8">
                                {{ Form::text('tipo', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('tipo'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('tipo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('denominacion_cargo') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Denominacion cargo</label>
                            <div class="col-md-8">
                                {{ Form::text('denominacion_cargo', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('denominacion_cargo'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('denominacion_cargo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('motivo_cese') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Motivo cese</label>
                            <div class="col-md-8">
                                {{ Form::text('motivo_cese', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('motivo_cese'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('motivo_cese') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nivel') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Nivel</label>
                            <div class="col-md-8">
                                {{ Form::text('nivel', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('nivel'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('nivel') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Cargo</label>
                            <div class="col-md-8">
                                {{ Form::text('cargo', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('cargo'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('cargo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dependencia') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Dependencia</label>
                            <div class="col-md-8">
                                {{ Form::text('dependencia', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('dependencia'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('dependencia') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fecha_inicio') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Fecha de Inicio</label>
                            <div class="col-md-8">
                                {{ Form::text('fecha_inicio', null, ['class' => 'form-control', 'id' => 'fecha_inicio']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('fecha_inicio'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('fecha_inicio') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fecha_cese') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Fecha de Fin</label>
                            <div class="col-md-8">
                                {{ Form::text('fecha_cese', null, ['class' => 'form-control', 'id' => 'fecha_cese']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('fecha_cese'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('fecha_cese') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('observaciones') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Observaciones</label>
                            <div class="col-md-8">
                                {{ Form::textarea('observaciones', null, ['class' => 'form-control', 'style' => 'resize:none']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('observaciones'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('observaciones') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                    @elseif($section->alias == 'renuncias')

                    @elseif($section->alias == 'entriesIndex')
                        <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Tipo</label>
                            <div class="col-md-8">
                                {{ Form::text('tipo', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('tipo'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('tipo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('contract_time_years') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Tiempo de Contrato (años)</label>
                            <div class="col-md-8">
                                {{ Form::number('contract_time_years', null, ['class' => 'form-control', 'min' => 1, 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('contract_time_years'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('contract_time_years') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('contract_time_months') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Tiempo de Contrato (meses)</label>
                            <div class="col-md-8">
                                {{ Form::number('contract_time_months', null, ['class' => 'form-control', 'min' => 1,'max' => 12, 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('contract_time_months'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('contract_time_months') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('contract_time_days') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Tiempo de Contrato (días)</label>
                            <div class="col-md-8">
                                {{ Form::number('contract_time_days', null, ['class' => 'form-control', 'min' => 1, 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('contract_time_days'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('contract_time_days') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dependency') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Dependencia</label>
                            <div class="col-md-8">
                                {{ Form::text('dependency', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('dependency'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('dependency') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Categoría</label>
                            <div class="col-md-8">
                                {{ Form::text('category', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('category'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('category') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('charge') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Cargo</label>
                            <div class="col-md-8">
                                {{ Form::text('charge', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('charge'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('charge') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                    @elseif($section->alias == 'displacement')
                        <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Tipo</label>
                            <div class="col-md-8">
                                {{ Form::text('tipo', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('tipo'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('tipo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('charge') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Cargo</label>
                            <div class="col-md-8">
                                {{ Form::text('charge', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('charge'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('charge') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dependencia_origen') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Dependencia de origen</label>
                            <div class="col-md-8">
                                {{ Form::text('dependencia_origen', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('dependencia_origen'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('dependencia_origen') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dependencia_destino') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Dependencia destino</label>
                            <div class="col-md-8">
                                {{ Form::text('dependencia_destino', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('dependencia_destino'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('dependencia_destino') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('displacement_time_years') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Tiempo de desplazamiento (Años)</label>
                            <div class="col-md-8">
                                {{ Form::number('displacement_time_years', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('displacement_time_years'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('displacement_time_years') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('displacement_time_months') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Tiempo de desplazamiento (Meses)</label>
                            <div class="col-md-8">
                                {{ Form::number('displacement_time_months', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('displacement_time_months'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('displacement_time_months') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('displacement_time_days') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Tiempo de desplazamiento (Días)</label>
                            <div class="col-md-8">
                                {{ Form::number('displacement_time_days', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('displacement_time_days'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('displacement_time_days') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                    @elseif($section->alias == 'produccionintelectual')
                        <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Tipo</label>
                            <div class="col-md-8">
                                {{ Form::text('tipo', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('tipo'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('tipo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tipo_trabajo') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Tipo de Trabajo</label>
                            <div class="col-md-8">
                                {{ Form::text('tipo_trabajo', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('tipo_trabajo'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('tipo_trabajo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('titulo_trabajo') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Título de Trabajo</label>
                            <div class="col-md-8">
                                {{ Form::text('titulo_trabajo', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('titulo_trabajo'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('titulo_trabajo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Años</label>
                            <div class="col-md-8">
                                {{ Form::number('year', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('year'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('year') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                    @elseif($section->alias == 'sanctionIndex')
                        <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Tipo</label>
                            <div class="col-md-8">
                                {{ Form::text('tipo', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('tipo'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('tipo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('descripcion_demerito') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Descripción del demérito</label>
                            <div class="col-md-8">
                                {{ Form::text('descripcion_demerito', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('descripcion_demerito'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('descripcion_demerito') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('motivo') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Motivo</label>
                            <div class="col-md-8">
                                {{ Form::text('motivo', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('motivo'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('motivo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dependencia_destino') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Dependencia destino</label>
                            <div class="col-md-8">
                                {{ Form::text('dependencia_destino', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('dependencia_destino'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('dependencia_destino') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tiempo_sin_goce') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Tiempo sin goce</label>
                            <div class="col-md-8">
                                {{ Form::text('tiempo_sin_goce', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('tiempo_sin_goce'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('tiempo_sin_goce') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fecha_termino') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Fecha de término</label>
                            <div class="col-md-8">
                                {{ Form::text('fecha_termino', null, ['class' => 'form-control', 'style' => '', 'id' => 'fecha_termino']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('fecha_termino'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('fecha_termino') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sanction_time_year') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Tiempo de sanción (Años)</label>
                            <div class="col-md-8">
                                {{ Form::number('sanction_time_year', null, ['class' => 'form-control', 'style' => '', 'id' => 'fecha_termino']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('sanction_time_year'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('sanction_time_year') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sanction_time_months') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Tiempo de sanción (Meses)</label>
                            <div class="col-md-8">
                                {{ Form::number('sanction_time_months', null, ['class' => 'form-control', 'style' => '', 'id' => 'fecha_termino']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('sanction_time_months'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('sanction_time_months') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sanction_time_days') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Tiempo de sanción (Dias)</label>
                            <div class="col-md-8">
                                {{ Form::number('sanction_time_days', null, ['class' => 'form-control', 'style' => '', 'id' => 'fecha_termino']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('sanction_time_days'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('sanction_time_days') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                    @elseif($section->alias == 'permitIndex')
                        <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Tipo</label>
                            <div class="col-md-8">
                                {{ Form::text('tipo', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('tipo'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('tipo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('quinquenio') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Quinquenio</label>
                            <div class="col-md-8">
                                {{ Form::text('quinquenio', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('quinquenio'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('quinquenio') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fecha_cumplimiento_quinquenio') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Fecha de cumplimiento del quinquenio</label>
                            <div class="col-md-8">
                                {{ Form::text('fecha_cumplimiento_quinquenio', null, ['class' => 'form-control', 'style' => '', 'id' => 'fecha_cumplimiento_quinquenio']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('fecha_cumplimiento_quinquenio'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('fecha_cumplimiento_quinquenio') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('beneficio_otorgado') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Motivo</label>
                            <div class="col-md-8">
                                {{ Form::text('beneficio_otorgado', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('beneficio_otorgado'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('beneficio_otorgado') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('monto_otorgado') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Monto Otorgado</label>
                            <div class="col-md-8">
                                {{ Form::text('monto_otorgado', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('monto_otorgado'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('monto_otorgado') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                    @elseif($section->alias =='evaluacion')
                        <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Tipo</label>
                            <div class="col-md-8">
                                {{ Form::text('tipo', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('tipo'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('tipo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{--<div class="form-group{{ $errors->has('fecha_emision') ? ' has-error' : '' }}">--}}
                            {{--<label class="col-md-3 control-label">Fecha de emisión</label>--}}
                            {{--<div class="col-md-8">--}}
                                {{--{{ Form::text('fecha_emision', null, ['class' => 'form-control', 'id' => 'fecha_emision']) }}--}}
                            {{--</div>--}}
                            {{--<div class="col-md-offset-3 col-md-8">--}}
                                {{--@if ($errors->has('fecha_emision'))--}}
                                    {{--<span class="help-block">--}}
                                    {{--<strong>{{ $errors->first('fecha_emision') }}</strong>--}}
                                {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group{{ $errors->has('puntaje') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Puntaje</label>
                            <div class="col-md-8">
                                {{ Form::number('puntaje', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('puntaje'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('puntaje') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('calificacion') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Calificion</label>
                            <div class="col-md-8">
                                {{ Form::number('calificacion', null, ['class' => 'form-control', 'style' => '']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('calificacion'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('calificacion') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('observaciones') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Observaciones</label>
                            <div class="col-md-8">
                                {{ Form::textarea('observaciones', null, ['class' => 'form-control', 'style' => 'resize:none']) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('observaciones'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('observaciones') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('informe_file') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Constancia</label>
                            <div class="col-md-8">
                                {{ Form::file('informe_file', array('placeholder' => '','class' => 'form-control', 'accept' => 'application/pdf')) }}
                            </div>
                            <div class="col-md-offset-3 col-md-8">
                                @if ($errors->has('informe_file'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('informe_file') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                    @endif

                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-6">
                            <button onclick="" id="submitAll" class="btn btn-info">Guardar</button>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>

                    {{ Form::close() }}

                </div>

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

        $( "#fecha_cumplimiento_quinquenio" ).datepicker({
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

        $( "#end_date" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
            startDate: '+1d'
        }).on('changeDate', function(){
            $(this).datepicker('hide');
        });


        $( "#fecha_inicio" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
            $('#fecha_cese').attr('disabled',false);
            $('#fecha_cese').val("");
            $('#fecha_cese').datepicker('setStartDate', e.date);
        });

        $( "#fecha_cese" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
            startDate: '+1d'
        }).on('changeDate', function(){
            $(this).datepicker('hide');
        });



        $( "#issue_date" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es"
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });

    </script>

@endsection

@section('styles')
    <style>
        .btn-ctm {
            color: #000;
            font-size: 20px;
            padding: 0;
        }
    </style>
@endsection