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
                    <a href="{{ url('section/detail/'.$model->id) }}" class="btn btn-xs btn-icon btn-circle btn-success"><i class="fa fa-arrow-left"></i></a>
                    Detalle de Sección
                </h4>
            </div>

            <div class="panel-body">
                {{ Form::model($model, ['route' => 'updateSection', 'class' => 'form-horizontal', 'method' => 'post']) }}

                {{ Form::hidden('id_section', $model->id) }}

                <div class="form-group">
                    <label class="col-md-3 control-label">Nombre</label>
                    <div class="col-md-8">
                        <label class="control-label" style="text-align:left">{{$model->name}}</label>
                    </div>
                </div>

                {{--<div class="form-group">
                    <label class="col-md-3 control-label">Alias</label>
                    <div class="col-md-8">
                        {{ Form::text('alias', null, ['class' => 'form-control']) }}
                    </div>
                </div>--}}

                <div class="form-group">
                    <label class="col-md-3 control-label">Asignaciones</label>
                    <div class="col-md-9">
                        <button type="button" class="btn btn-default addButton" id="agregarAsignacionBoton"><i class="fa fa-plus"></i></button>
                    </div>
                    {{--<div class="col-md-8">--}}
                        {{--@foreach($assignments as $assignment)--}}
                            {{--<div class="col-md-10">--}}
                                {{--<input type="text" class="form-control" value="{{ $assignment or '' }}" disabled />--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                </div>

                <div class="form-group" id="listaAsignaciones">
                    <!--Aqui van las asignaciones-->
                </div>

                <div class="form-group">
                    <div class="col-md-offset-3 col-md-6">
                        <a type="button" href="{{ url('section/detail/'.$model->id) }}" class="btn btn-primary" >Cancelar</a>
                        {{ Form::submit('Guardar', ['class' => 'btn btn-info', 'style' => '']) }}
                    </div>
                </div>

                {{ Form::close() }}

                <!-- Template de asignación -->
                <!--No cambiar las clases asignacion, aliasAsignacion, agregarAsignacionBoton, removerAsignacionBoton-->
                <div class="form-group asignacion hide" id="asignacionTemplate">
                    <label class="col-md-3 control-label"></label>

                    <div class="col-md-8">
                        <label class="col-md-1 control-label">Alias</label>
                        <div class="col-md-3">
                            {{ Form::hidden('', -1, ['class' => 'idAsignacion']) }}
                            {{ Form::select('', $resolution_types_table, null, ['class' => 'form-control idAsignacionSeleccionada']) }}
                        </div>

                        <div class="col-md-1">
                            <button type="button" class="btn btn-default removerAsignacionBoton"><i
                                        class="fa fa-minus"></i></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>

        var asignacionIndex;

        $(document).ready(function() {
            //Funcionalidad de agregado y borrado dinamico para lista de asignaciones
            asignacionIndex = -1;

            $('#agregarAsignacionBoton')
            // Add button click handler
                .on('click', function () {
                    agregarAsignacion();
                });

            $('#listaAsignaciones')
            // Remove button click handler
                .on('click', '.removerAsignacionBoton', function () {
                    var $row = $(this).parents('.form-group');

                    //Remove element containing the fields
                    $row[0].remove();
                    asignacionIndex--;

                    //Actualizar en cascada los indices del arreglo de asignaciones
                    var $asignaciones = $('.asignacion', '#listaAsignaciones');
                    for (i = 0; i < $asignaciones.length; i++) {
                        var $asignacion = $($asignaciones[i]);

                        $asignacion.attr('data-asignacion-index', i);
                        $asignacion.find('.idAsignacion').attr('name', 'assignment[' + i + '][id]').end()
                            .find('.idAsignacionSeleccionada').attr('name', 'assignment[' + i + '][idSelected]').end();
                    }
                });

            //Rellenar campos de asignaciones de BD
            @if($assignments != null)
                @foreach($assignments as $assignment)
                agregarAsignacion('{{$assignment->id_resolution_type}}', '{{$assignment->id_resolution_type}}');
                @endforeach
            @endif

        });

        function agregarAsignacion(id, idSeleccionado)
        {
            asignacionIndex++;
            var $template = $('#asignacionTemplate'),
                $clone    = $template
                    .clone()
                    .removeClass('hide')
                    .removeAttr('id')
                    .attr('data-asignacion-index', asignacionIndex)
                    .appendTo($('#listaAsignaciones'));


            // Update the name attributes
            $clone.find('.idAsignacion').attr('name','assignment[' + asignacionIndex + '][id]').end()
                .find('.idAsignacionSeleccionada').attr('name','assignment[' + asignacionIndex + '][idSelected]').end();

            if(id != null && id != '')
                $clone.find('.idAsignacion').val(id).end();

            if(idSeleccionado != null && idSeleccionado != '')
                $clone.find('.idAsignacionSeleccionada').val(idSeleccionado).end();

        }

    </script>
@endsection

{{--TODO: Finalizar edit de sección--}}