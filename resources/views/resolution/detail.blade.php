@extends('layouts.app')

@section('content')

    <h1 class="page-header">
        Resolución <small>Detalle</small>
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
                    <a href="{{ url('resolution/list/'.$arredirect['url1'].'/'.$arredirect['url2'].'/'.$arredirect['url3']) }}" class="btn btn-xs btn-icon btn-circle btn-success"><i class="fa fa-arrow-left"></i></a>
                    Detalle de Resolución
                </h4>
            </div>

            <div class="panel-body">
                {{ Form::open(['class' => 'form-horizontal', 'method' => 'post']) }}
                <div class="form-group">
                    <label class="col-md-3 control-label">N° Folio</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="#" disabled />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">N° Resolución</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="{{ $resolution->resolution_number or '' }}" disabled />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Tipo Resolución</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="{{ $resolution_type->name or '' }}" disabled />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Fecha Resolución</label>
                    <div class="col-md-8">
                        <input type="date" class="form-control" value="{{ $resolution->issue_date or '' }}" disabled />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Descripción</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="{{ $resolution->description or '' }}" disabled />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Órgano que Expide</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="{{ $resolution->issuing_organ or '' }}" disabled />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Constancia</label>
                    <div class="col-md-8">
                        @if($resolution->constancy_url == null)
                            <label class="label label-danger">NO ADJUNTO</label>
                        @else
                            <label class="label label-success">ADJUNTO</label>
                            <a href="{{ url($resolution->constancy_url) }}" target="_blank" class="btn btn-xs btn-default">
                                <i class="fa fa-download"></i>
                            </a>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3"></label>
                        <div class="col-md-6 col-sm-6">
                            <a type="button" href="{{ url('resolution/list/'.$arredirect['url1'].'/'.$arredirect['url2'].'/'.$arredirect['url3']) }}" class="btn btn-primary" > Listado de Resoluciones de encargo</a>
                            <a href="{{ route('editResolution', ['id_resolution' => $resolution->id]).'/?o1='.$arredirect['url1'].'&o2='.$arredirect['url2'].'&o3='.$arredirect['url3'] }}" class="btn btn-info">Editar</a>
                        </div>
                </div>
                {{ Form::close() }}

            </div>
        </div>
    </div>

@endsection