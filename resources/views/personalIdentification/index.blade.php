@extends('layouts.app')

@section('content')

    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('/') }}">Inicio</a></li>
        <li><a href="{{ route('staffManagement') }}">Gestión de Personal</a></li>
        <li class="active">Información personal y familiar</li>
    </ol>

    @include('template.partials.subMenuUser')

    <div class="row">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                </div>
                <h4 class="panel-title">
                    <a href="{{ url('staff_management') }}" class="btn btn-xs btn-icon btn-circle btn-success"><i class="fa fa-arrow-left"></i></a>
                    Información personal y familiar
                </h4>
            </div>

            {!! Form::open(array('id' => 'form-solicitud','enctype'=>'multipart/form-data','class'=>'form-horizontal','route' => array('personalIdentificationSubmit'))) !!}
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-xs-6">
                            <h4>Listado de documentos de Filiación</h4>
                        </div>
                        <div class="col-xs-6 text-right">
                            <a href="{{ url('staff_management')}}" class="btn btn-success">
                                Cancelar
                            </a>
                            <input type="submit"  class="btn btn-primary" role="button" value="Guardar y Actualizar"/>
                            <a href="{{ route('personalIdentificationSheet') }}/{{ $id }}" class="btn btn-success">
                                Ver ficha de datos
                            </a>
                        </div>
                    </div>
                </form>
                {!! Form::hidden('invisible', $Afill->id, array('id' => 'invisible_id')) !!}
                <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Documento</th>
                                    <th>Estado</th>
                                    <th>Constancia</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr class="separator-row" style="display: contents; text-align: center;">
                                <td colspan="3" style="height: 20px; background-color: #ddd;">DATOS PERSONALES</td>
                            </tr>
                            <tr style="background-color:rgb(4, 51, 30);">
                                <td>Foto tamaño carnet</td>
                                @if(is_null($Afill->foto_size_carnet))
                                    <th><label class="label label-danger">NO ADJUNTO </label></th>
                                    <td>{{ Form::file('foto_size_carnet', array('placeholder' => '','class' => 'form-control-file','accept' => 'images/*')) }}</td>
                                @else
                                    <th><label class="label label-success">ADJUNTO </label></th>
                                    <td>
                                        <div class="col-md-3">
                                            <a href="{{ url($Afill->foto_size_carnet) }}" target="_blank" class="btn btn-xs btn-default">
                                                Descargar <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            {{ Form::file('foto_size_carnet', array('placeholder' => '','class' => 'form-control-file','accept' => 'images/*')) }}
                                        </div>
                                    </td>
                                @endif
                            </tr>

                            <tr>
                                <td>Documento de Identidad</td>
                                @if(is_null($Afill->presentatio_document))
                                    <th><label class="label label-danger">NO ADJUNTO </label></th>
                                    <td>{{ Form::file('presentatio_document', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}</td>
                                @else
                                    <th><label class="label label-success">ADJUNTO </label></th>
                                    <td>
                                        <div class="col-md-3">
                                            <a href="{{ url($Afill->presentatio_document) }}" target="_blank" class="btn btn-xs btn-default">
                                                Descargar <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            {{ Form::file('presentatio_document', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}
                                        </div>
                                    </td>
                                @endif
                            </tr>

                            <tr>
                                <td>Copia legalizada de título de nacionalidad</td>
                                @if(is_null($Afill->title_nationalized))
                                    <th><label class="label label-danger">NO ADJUNTO </label></th>
                                    <td>{{ Form::file('title_nationalized', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}</td>
                                @else
                                    <th><label class="label label-success">ADJUNTO </label></th>
                                    <td>
                                        <div class="col-md-3">
                                            <a href="{{ url($Afill->title_nationalized) }}" target="_blank" class="btn btn-xs btn-default">
                                                Descargar <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            {{ Form::file('title_nationalized', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}
                                        </div>
                                    </td>
                                @endif
                            </tr>

                            <tr>
                                <td>Visa de residencia en el país</td>
                                @if(is_null($Afill->country_visa))
                                    <th><label class="label label-danger">NO ADJUNTO </label></th>
                                    <td>{{ Form::file('country_visa', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}</td>
                                @else
                                    <th><label class="label label-success">ADJUNTO </label></th>
                                    <td>
                                        <div class="col-md-3">
                                            <a href="{{ url($Afill->country_visa) }}" target="_blank" class="btn btn-xs btn-default">
                                                Descargar <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            {{ Form::file('country_visa', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}
                                        </div>
                                    </td>
                                @endif
                            </tr>

                            <tr class="separator-row">
                                <td colspan="3" style="height: 20px; background-color: #ddd;"></td>
                            </tr>


                            <tr>
                                <td>Certificado de antecedentes penales</td>
                                @if(is_null($Afill->judicial_certificate))
                                    <th><label class="label label-danger">NO ADJUNTO </label></th>
                                    <td>{{ Form::file('judicial_certificate', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}</td>
                                @else
                                    <th><label class="label label-success">ADJUNTO </label></th>
                                    <td>
                                        <div class="col-md-3">
                                            <a href="{{ url($Afill->judicial_certificate) }}" target="_blank" class="btn btn-xs btn-default">
                                                Descargar <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            {{ Form::file('judicial_certificate', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}
                                        </div>
                                    </td>
                                @endif
                            </tr>

                            <tr>
                                <td>Declaración jurada de Bienes y Rentas (Funcionarios y/o Servidores que manejan fondos del estado)</td>
                                @if(is_null($Afill->declaration_sworn_goods))
                                    <th><label class="label label-danger">NO ADJUNTO </label></th>
                                    <td>{{ Form::file('declaration_sworn_goods', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}</td>
                                @else
                                    <th><label class="label label-success">ADJUNTO </label></th>
                                    <td>
                                        <div class="col-md-3">
                                            <a href="{{ url($Afill->declaration_sworn_goods) }}" target="_blank" class="btn btn-xs btn-default">
                                                Descargar <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            {{ Form::file('declaration_sworn_goods', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}
                                        </div>
                                    </td>
                                @endif
                            </tr>

                            <tr>
                                <td>Certificado de antecedentes policiales</td>
                                @if(is_null($Afill->police_certificate))
                                    <th><label class="label label-danger">NO ADJUNTO </label></th>
                                    <td>{{ Form::file('police_certificate', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}</td>
                                @else
                                    <th><label class="label label-success">ADJUNTO </label></th>
                                    <td>
                                        <div class="col-md-3">
                                            <a href="{{ url($Afill->police_certificate) }}" target="_blank" class="btn btn-xs btn-default">
                                                Descargar <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            {{ Form::file('police_certificate', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}
                                        </div>
                                    </td>
                                @endif
                            </tr>

                            <tr>
                                <td>Declaración Jurada de bienes y rentas</td>
                                @if(is_null($Afill->dni_legalized))
                                    <th><label class="label label-danger">NO ADJUNTO </label></th>
                                    <td>{{ Form::file('dni_legalized', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}</td>
                                @else
                                    <th><label class="label label-success">ADJUNTO </label></th>
                                    <td>
                                        <div class="col-md-3">
                                            <a href="{{ url($Afill->dni_legalized) }}" target="_blank" class="btn btn-xs btn-default">
                                                Descargar <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            {{ Form::file('dni_legalized', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}
                                        </div>
                                    </td>
                                @endif
                            </tr>

                            <tr>
                                <td>Declaración Jurada de no tener impedimentos para ser designado funcionario público o directivo público de libre designación y remoción</td>
                                @if(is_null($Afill->marriage_certificate_nationality))
                                    <th><label class="label label-danger">NO ADJUNTO </label></th>
                                    <td>{{ Form::file('marriage_certificate_nationality', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}</td>
                                @else
                                    <th><label class="label label-success">ADJUNTO </label></th>
                                    <td>
                                        <div class="col-md-3">
                                            <a href="{{ url($Afill->marriage_certificate_nationality) }}" target="_blank" class="btn btn-xs btn-default">
                                                Descargar <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            {{ Form::file('marriage_certificate_nationality', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}
                                        </div>
                                    </td>
                                @endif
                            </tr>

                            <tr class="separator-row">
                                <td colspan="3" style="height: 20px; background-color: #ddd;"></td>
                            </tr>
                            
                            <tr>
                                <td>Partida de Matrimonio</td>
                                @if(is_null($Afill->marriage_certificate))
                                    <th><label class="label label-danger">NO ADJUNTO </label></th>
                                    <td>{{ Form::file('marriage_certificate', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}</td>
                                @else
                                    <th><label class="label label-success">ADJUNTO </label></th>
                                    <td>
                                        <div class="col-md-3">
                                            <a href="{{ url($Afill->marriage_certificate) }}" target="_blank" class="btn btn-xs btn-default">
                                                Descargar  <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            {{ Form::file('marriage_certificate', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}
                                        </div>
                                    </td>
                                @endif
                            </tr>

                            <tr>
                                <td>Constancia judicial o notarial de convivencia</td>
                                @if(is_null($Afill->notarial_of_coexistence))
                                    <th><label class="label label-danger">NO ADJUNTO </label></th>
                                    <td>{{ Form::file('notarial_of_coexistence', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}</td>
                                @else
                                    <th><label class="label label-success">ADJUNTO </label></th>
                                    <td>
                                        <div class="col-md-3">
                                            <a href="{{ url($Afill->notarial_of_coexistence) }}" target="_blank" class="btn btn-xs btn-default">
                                                Descargar  <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            {{ Form::file('notarial_of_coexistence', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}
                                        </div>
                                    </td>
                                @endif
                            </tr>

                            <tr class="separator-row">
                                <td colspan="3" style="height: 20px; background-color: #ddd;"></td>
                            </tr>

                            <tr>
                                <td>Información de impedimentos e inhabilitaciones</td>
                                @if(is_null($Afill->job_app))
                                    <th><label class="label label-danger">NO ADJUNTO </label></th>
                                    <td>{{ Form::file('job_app', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}</td>
                                @else
                                    <th><label class="label label-success">ADJUNTO </label></th>
                                    <td>
                                        <div class="col-md-3">
                                            <a href="{{ url($Afill->job_app) }}" target="_blank" class="btn btn-xs btn-default">
                                                Descargar <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            {{ Form::file('job_app', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}
                                        </div>
                                    </td>
                                @endif
                            </tr>

                            <tr>
                                <td>Copia del documento Nacional de identidad del cónyugue o conviviente</td>
                                @if(is_null($Afill->nationality_document))
                                    <th><label class="label label-danger">NO ADJUNTO </label></th>
                                    <td>{{ Form::file('nationality_document', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}</td>
                                @else
                                    <th><label class="label label-success">ADJUNTO </label></th>
                                    <td>
                                        <div class="col-md-3">
                                            <a href="{{ url($Afill->nationality_document) }}" target="_blank" class="btn btn-xs btn-default">
                                                Descargar <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            {{ Form::file('nationality_document', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}
                                        </div>
                                    </td>
                                @endif
                            </tr>

                            <!--<tr>
                                <td>Certificado domiciliario</td>
                                @if(is_null($Afill->home_certificate))
                                    <th><label class="label label-danger">NO ADJUNTO </label></th>
                                    <td>{{ Form::file('home_certificate', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}</td>
                                @else
                                    <th><label class="label label-success">ADJUNTO </label></th>
                                    <td>
                                        <div class="col-md-3">
                                            <a href="{{ url($Afill->home_certificate) }}" target="_blank" class="btn btn-xs btn-default">
                                                Descargar <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            {{ Form::file('home_certificate', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}
                                        </div>
                                    </td>
                                @endif
                            </tr>



                            <tr>
                                <td>Certificado de Salud</td>
                                @if(is_null($Afill->health_certificate))
                                    <th><label class="label label-danger">NO ADJUNTO </label></th>
                                    <td>{{ Form::file('health_certificate', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}</td>
                                @else
                                    <th><label class="label label-success">ADJUNTO </label></th>
                                    <td>
                                        <div class="col-md-3">
                                            <a href="{{ url($Afill->health_certificate) }}" target="_blank" class="btn btn-xs btn-default">
                                                Descargar <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            {{ Form::file('health_certificate', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}
                                        </div>
                                    </td>
                                @endif
                            </tr>



                            <tr>
                                <td>Copia del Autogenerado por ESSALUD</td>
                                @if(is_null($Afill->copy_essalud))
                                    <th><label class="label label-danger">NO ADJUNTO </label></th>
                                    <td>{{ Form::file('copy_essalud', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}</td>
                                @else
                                    <th><label class="label label-success">ADJUNTO </label></th>
                                    <td>
                                        <div class="col-md-3">
                                            <a href="{{ url($Afill->copy_essalud) }}" target="_blank" class="btn btn-xs btn-default">
                                                Descargar <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            {{ Form::file('copy_essalud', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}
                                        </div>
                                    </td>
                                @endif
                            </tr>

                            <tr>
                                <td>Documento oficial que acredite ser miembro de las fuerzas armadas</td>
                                @if(is_null($Afill->document_fap))
                                    <th><label class="label label-danger">NO ADJUNTO </label></th>
                                    <td>{{ Form::file('document_fap', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}</td>
                                @else
                                    <th><label class="label label-success">ADJUNTO </label></th>
                                    <td>
                                        <div class="col-md-3">
                                            <a href="{{ url($Afill->document_fap) }}" target="_blank" class="btn btn-xs btn-default">
                                                Descargar <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            {{ Form::file('document_fap', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}
                                        </div>
                                    </td>
                                @endif
                            </tr>

                            <tr>
                                <td>Currículo Vitae</td>
                                @if(is_null($Afill->cv))
                                    <th><label class="label label-danger">NO ADJUNTO </label></th>
                                    <td>{{ Form::file('cv', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}</td>
                                @else
                                    <th><label class="label label-success">ADJUNTO </label></th>
                                    <td>
                                        <div class="col-md-3">
                                            <a href="{{ url($Afill->cv) }}" target="_blank" class="btn btn-xs btn-default">
                                                Descargar <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            {{ Form::file('cv', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}
                                        </div>
                                    </td>
                                @endif
                            </tr>


                            <tr>
                                <td>Partida de nacimiento o bautizo legalizado</td>
                                @if(is_null($Afill->birth_certificate))
                                    <th><label class="label label-danger">NO ADJUNTO </label></th>
                                    <td>{{ Form::file('birth_certificate', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}</td>
                                @else
                                    <th><label class="label label-success">ADJUNTO </label></th>
                                    <td>
                                        <div class="col-md-3">
                                            <a href="{{ url($Afill->birth_certificate) }}" target="_blank" class="btn btn-xs btn-default">
                                                Descargar <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            {{ Form::file('birth_certificate', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}
                                        </div>
                                    </td>
                                @endif
                            </tr> -->

                            <tr>
                                <td>Copia del documento de identidad de los hijos</td>
                                @if(is_null($Afill->children_document))
                                    <th><label class="label label-danger">NO ADJUNTO </label></th>
                                    <td>{{ Form::file('children_document', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}</td>
                                @else
                                    <th><label class="label label-success">ADJUNTO </label></th>
                                    <td>
                                        <div class="col-md-3">
                                            <a href="{{ url($Afill->children_document) }}" target="_blank" class="btn btn-xs btn-default">
                                                Descargar <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            {{ Form::file('children_document', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}
                                        </div>
                                    </td>
                                @endif
                            </tr>

                            <tr>
                                <td>Certificado de discapacidad de el/la servidor/a o de sus hijos/as emitido por el CONADIS, en caso corresponda</td>
                                @if(is_null($Afill->resolution_disability))
                                    <th><label class="label label-danger">NO ADJUNTO </label></th>
                                    <td>{{ Form::file('resolution_disability', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}</td>
                                @else
                                    <th><label class="label label-success">ADJUNTO </label></th>
                                    <td>
                                        <div class="col-md-3">
                                            <a href="{{ url($Afill->resolution_disability) }}" target="_blank" class="btn btn-xs btn-default">
                                                Descargar <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            {{ Form::file('resolution_disability', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}
                                        </div>
                                    </td>
                                @endif
                            </tr>



                            <tr>
                                <td>Otros documentos segun corresponda</td>
                                @if(is_null($Afill->birth_certificate))
                                    <th><label class="label label-danger">NO ADJUNTO </label></th>
                                    <td>{{ Form::file('birth_certificate', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}</td>
                                @else
                                    <th><label class="label label-success">ADJUNTO </label></th>
                                    <td>
                                        <div class="col-md-3">
                                            <a href="{{ url($Afill->birth_certificate) }}" target="_blank" class="btn btn-xs btn-default">
                                                Descargar <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            {{ Form::file('birth_certificate', array('placeholder' => '','class' => 'form-control-file', 'accept' => '*')) }}
                                        </div>
                                    </td>
                                @endif
                            </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection