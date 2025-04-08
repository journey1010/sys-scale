<div id="addSuspensionVacationModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            {{ Form::open(['route' => 'postCreateSuspensionVacation', 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
            {{ Form::hidden('id_user', $model->user_id) }}
            {{ Form::hidden('id_section', $model->section_id) }}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar Suspensi&oacute;n de Vacaciones</h4>
            </div>
            <div class="modal-body">
                <div class="form-group{{ $errors->has('resolution_number') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Memorando</label>
                    <div class="col-md-8">
                        {{ Form::text('resolution_number', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('resolution_number'))
                            <span class="help-block"><strong>{{ $errors->first('resolution_number') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('issue_date') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Emisión</label>
                    <div class="col-md-8">
                        {{ Form::text('issue_date', null, ['class' => 'form-control', 'id' => 'issue_date1','autocomplete' => 'off']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('issue_date'))
                            <span class="help-block"><strong>{{ $errors->first('issue_date') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('resolution_type') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Tipo de Resoluci&oacute;n</label>
                    <div class="col-md-8">
                        {!! Form::select('resolution_type', $resolution_types, null, ['class' => 'form-control','required'=>'required']) !!}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('resolution_type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('resolution_type') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('memorando_type') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Tipo de Memorando</label>
                    <div class="col-md-8">
                        <select name="memorando_type" id="memorando_type" class="form-control" required="required">
                            <option value="1">Memorando</option>
                            <option value="2">Memorando Multiple</option>
                            <option value="3">Oficio</option>
                            <option value="4">Oficio Multiplo</option>
                        </select>
                        {{--                        {!! Form::select('memorando_type', $resolution_types, null, ['class' => 'form-control','required'=>'required']) !!}--}}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('memorando_type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('memorando_type') }}</strong>
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
                            <span class="help-block"><strong>{{ $errors->first('issuing_organ') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Inicio</label>
                    <div class="col-md-8">
                        {{ Form::text('start_date', null, ['class' => 'form-control', 'id' => 'start_date1','autocomplete' => 'off']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('start_date'))
                            <span class="help-block"><strong>{{ $errors->first('start_date') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Fin</label>
                    <div class="col-md-8">
                        {{ Form::text('end_date', null, ['class' => 'form-control', 'id' => 'end_date1','autocomplete' => 'off']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('end_date'))
                            <span class="help-block"><strong>{{ $errors->first('end_date') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Descripción</label>
                    <div class="col-md-8">
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'style' => 'height: 100px;']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('description'))
                            <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
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
                            <span class="help-block"><strong>{{ $errors->first('constancy_url') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('license_type') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Resoluci&oacute;n de licencias</label>
                    <div class="col-md-8">
                        {!! Form::select('license_type', config('constants.vacation_license_resolution_type'), null, ['class' => 'form-control','required'=>'required']) !!}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('license_type'))
                            <span class="help-block"><strong>{{ $errors->first('license_type') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('suspension_type') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Documentos de suspensiones vacaciones</label>
                    <div class="col-md-8">
                        {!! Form::select('suspension_type', config('constants.vacation_suspension_document_type_B'), null, ['class' => 'form-control','required'=>'required']) !!}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('suspension_type'))
                            <span class="help-block"><strong>{{ $errors->first('suspension_type') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Observación</label>
                    <div class="col-md-8">
                        {{ Form::textarea('comment', null, ['class' => 'form-control', 'style' => 'height: 100px;']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('comment'))
                            <span class="help-block">
                                                    <strong>{{ $errors->first('comment') }}</strong>
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

            {{ Form::close() }}
        </div>
    </div>
</div>
