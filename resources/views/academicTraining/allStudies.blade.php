@extends('layouts.app')


@section('content')


<style>
    .ref-education{
        color: #399de8;
        font-weight: bold;
        text-decoration: none !Important;
    }

    .ref-education-title{
        color: black;
        font-weight: bold;
        text-decoration: none !Important;
    }
</style>

<ol class="breadcrumb pull-right">
    <li><a href="{{ route('/') }}">Inicio</a></li>
    <li><a href="{{ route('staffManagement') }}">Gestión de Personal</a></li>
    <li class="active">Formación académica y capacitación</li>
</ol>

    @include('template.partials.subMenuUser')

    <div class="row">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="{{ url('staff_management') }}" class="btn btn-xs btn-icon btn-circle btn-success"><i class="fa fa-arrow-left"></i></a>
                    Formación académica y capacitación
                </h4>
                <input type="hidden" name="id_user_academic" id="id_user_academic" value="{{ $objUser->id }}"/>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center" style="background-color: #dadada;">NIVEL</th>
                            <th class="text-center" style="background-color: #dadada;">CENTRO DE ESTUDIOS</th>
                            <th class="text-center" style="background-color: #dadada;">UBICACIÓN</th>
                            <th class="text-center" style="background-color: #dadada;">PERIODO DE ESTUDIOS</th>
                            <th class="text-center" style="background-color: #dadada;">OPCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            
                            </td>
                        </tr>
                        <tr>
                            @if($objSecondaryEducation != null)
                                <td><a href="{{ route('saveSecondaryEducation', [$objUser->id] ) }}" class="ref-education">EDUCACIÓN SECUNDARIA</a></td>
                            @else
                                <td><a class="ref-education">EDUCACIÓN SECUNDARIA</a></td>
                            @endif
                            <td>{{ $objSecondaryEducation->secondary or "-" }}</td>
                            <td>{{ $objSecondaryEducation->pais or "-" }} <strong>{{ $objSecondaryEducation == null ? "" : "/" }}</strong> {{ $objSecondaryEducation->departamento or "-" }} <strong>{{ $objSecondaryEducation == null ? "" : "/" }}</strong> {{ $objSecondaryEducation->provincia or "-" }} <strong>{{ $objSecondaryEducation == null ? "" : "/" }}</strong> {{ $objSecondaryEducation == null ? "" : $objSecondaryEducation->distrito }}</td>
                                @if(!is_null($objSecondaryEducation))
                                    <td>{{ (is_null($objSecondaryEducation->fechainicio)) ? "" : \Carbon\Carbon::parse($objSecondaryEducation->fechainicio)->format('d-m-Y') }} <strong>&nbsp; {{ $objSecondaryEducation == null ? "" :  "/" }} &nbsp;</strong> {{ $objSecondaryEducation == null ? "" : ((is_null($objSecondaryEducation->fechafin)) ? "" : \Carbon\Carbon::parse($objSecondaryEducation->fechafin)->format('d-m-Y')) }}</td>
                                @else
                                    <td> - <strong> </strong> - <strong> / </strong> - <strong> / </strong> </td>
                                @endif

                                <td class="text-center">
                                @if($objSecondaryEducation != null)
                                    <a href="{{ route('saveSecondaryEducation', $objUser->id ) }}"><i class="fa fa-pencil"></i></a>
                                    @if($objSecondaryEducation->url)
                                        <a href="{{ url($objSecondaryEducation->url) }}" download><i class="fa fa-cloud-download"></i></a>
                                    @endif
                                @else
                                    <a href="{{ route('saveSecondaryEducation', $objUser->id ) }}"><i class="fa fa-plus"></i></a>
                                @endif
                            </td>
                        </tr>
{{--                        <tr>
    @if($objTuitionInformation != null)
                                <td><a href="{{ route('saveTuitionInformation', [$objUser->id]) }}" class="ref-education">COLEGIATURA N°</a></td>
                            @else
                                <td><a href="{{ route('saveTuitionInformation', $objUser->id ) }}" class="ref-education">COLEGIATURA N°</a></td>
                            @endif
                            <td>{{ $objTuitionInformation->number or "-" }}</td>
                            <td>{{ $objProfessionalTitle->number_register_title or "-" }}</td>
                            <td>{{ $objProfessionalTitle->date_register_title or "-" }}</td>
                        </tr>--}}
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th colspan="5" class="text-center" style="background-color: #dadada;">
                                <a class="ref-education-title">ESTUDIOS SUPERIORES Y NO SUPERIORES</a>
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-toggle="modal" data-target="#UniversityEducationModal"><i class="fa fa-plus"></i></a>
                                </div>
                            </th>
                        </tr>
                        @if(!$listUniversityEducation->isEmpty())
                            <tr>
                                <th class="col-md-2 text-center">CENTRO DE ESTUDIOS</th>
                                <th class="col-md-2 text-center">ESPECIALIDAD</th>
                                <th class="col-md-3 text-center">UBICACIÓN</th>
                                <th class="col-md-3 text-center">PERIODO DE ESTUDIOS</th>
                                <th class="col-md-1 text-center">OPCIONES</th>
                            </tr>
                        @endif
                        </thead>
                        <tbody>
                        @if(!$listUniversityEducation->isEmpty())
                        @foreach($listUniversityEducation as $item)
                            <tr>
                                <td>{{ $item == null ? "" : $item->university }}</td>
                                <td>{{ $item == null ? "" : $item->concentration }}</td>
                                <td>{{ $item->pais or "-" }} <strong>{{ $item == null ? "" : "/" }}</strong>  {{ $item->departamento or "-" }} <strong>{{ $item == null ? "" : "/" }}</strong> {{ $item == null ? "" : $item->provincia }} <strong>{{ $item == null ? "" : "/" }}</strong> {{ $item == null ? "" : $item->distrito }}</td>
                                @if(!is_null($item))
                                    <td>{{ (is_null($item->fechainicio) ? "" : \Carbon\Carbon::parse($item->fechainicio)->format('d-m-Y')) }} <strong>&nbsp; {{ $item == null ? "" :  "/" }} &nbsp;</strong> {{ $item == null ? "" : ((is_null($item->fechafin)) ? "" : \Carbon\Carbon::parse($item->fechafin)->format('d-m-Y')) }}</td>
                                @else
                                    <td> - <strong> </strong> - <strong> / </strong> - <strong> / </strong> </td>
                                @endif
                                {{--<td>{{ (is_null($item->fechainicio)) ? "" : \Carbon\Carbon::parse($item->fechainicio)->format('d-m-Y') }} <strong>&nbsp; {{ $item == null ? "" :  "/" }} &nbsp;</strong> {{ $item == null ? "" : (is_null($item->fechafin)) ? "" : \Carbon\Carbon::parse($item->fechafin)->format('d-m-Y') }}</td>--}}
                                <td class="text-center">
                                    @if($item != null)
                                        <a class="btn btn-sm btn-default" href="{{ route('saveUniversityEducation', ['id_user' => $objUser->id, 'id' => $item->id] ) }}"><i class="fa fa-pencil"></i></a>
                                        @if($item->url != null)
                                            <a class="btn btn-sm btn-default" href="{{ url($item->url) }}" download><i class="fa fa-cloud-download"></i></a>
                                        @endif
                                        <a class="btn btn-sm btn-default" href="{{ route('deleteUniversityEducation') }}?data_id={{ $item->id }}"><i class="fa fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        @endif
                        @if($listUniversityEducation->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">{{ Form::label('No presenta estudios superiores o no superiores', null, ['class' => 'control-label', 'style' => 'font-size:18px']) }}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th colspan="6" class="text-center" style="background-color: #dadada;">
                                <a class="ref-education-title">TÍTULO PROFESIONAL</a>
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-toggle="modal" data-target="#ProfessionalTitleModal"><i class="fa fa-plus"></i></a>
                                </div>
                            </th>
                        </tr>
                        @if(!$listProfessionalTitle->isEmpty())
                            <tr>
                                <th class="col-md-2 text-center">CENTRO DE ESTUDIOS</th>
                                <th class="col-md-2 text-center">ESPECIALIDAD</th>
                                <th class="col-md-2 text-center">NÚMERO DE REGISTRO</th>
                                <th class="col-md-2 text-center">UBICACIÓN</th>
                                <th class="col-md-2 text-center">PERIODO DE ESTUDIOS</th>
                                <th class="col-md-1 text-center">OPCIONES</th>
                            </tr>
                        @endif
                        </thead>
                        <tbody>
                        @foreach($listProfessionalTitle as $item)
                            <tr>
                                <td>{{ $item->college or "-" }}</td>
                                <td>{{ $item == null ? "-" : $item->concentration }}</td>
                                <td>{{ $item == null ? "-" : $item->number_register_title }}</td>
                                <td>{{ $item->pais or "-"}} <strong>{{ $item == null ? "" : "/" }}</strong> {{ $item->departamento or "-"}} <strong>{{ $item == null ? "" : "/" }}</strong> {{ $item == null ? "" : $item->provincia }} <strong>{{ $item == null ? "" : "/" }}</strong>  {{ $item == null ? "" : $item->distrito }}</td>
                                @if(!is_null($item))
                                    <td>{{ (is_null($item->fechainicio)) ? "" : \Carbon\Carbon::parse($item->fechainicio)->format('d-m-Y') }} <strong>&nbsp; {{ $item == null ? "" :  "/" }} &nbsp;</strong> {{ $item == null ? "" : ((is_null($item->fechafin)) ? "" : \Carbon\Carbon::parse($item->fechafin)->format('d-m-Y')) }}</td>
                                @else
                                    <td> - <strong> </strong> - <strong> / </strong> - <strong> / </strong> </td>
                                @endif
                                {{--<td>{{ (is_null($item->fechainicio)) ? "" : \Carbon\Carbon::parse($item->fechainicio)->format('d-m-Y') }} <strong>&nbsp; {{ $item == null ? "" :  "/" }} &nbsp;</strong> {{ $item == null ? "" : ((is_null($item->fechainicio)) ? "" : \Carbon\Carbon::parse($item->fechainicio)->format('d-m-Y')) }}</td>--}}
                                <td class="text-center">
                                    @if($item != null)
                                        <a class="btn btn-sm btn-default" href="{{ route('saveProfessionalTitle', $objUser->id ) }}"><i class="fa fa-pencil"></i></a>
                                        @if($item->url != null)
                                            <a class="btn btn-sm btn-default" href="{{ url($item->url) }}" download><i class="fa fa-cloud-download"></i></a>
                                        @endif
                                        <a class="btn btn-sm btn-default" href="{{ route('deleteProfessionalTitle') }}?data_id={{ $item->id }}"><i class="fa fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        @if($listProfessionalTitle->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center">{{ Form::label('No presenta estudios superiores o no superiores', null, ['class' => 'control-label', 'style' => 'font-size:18px']) }}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th colspan="5" class="text-center" style="background-color: #dadada;">
                                <a class="btn btn-sm btn-default ref-education-title">MAESTRÍAS Y DOCTORADOS</a>
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" class="btn btn-sm btn-icon btn-circle btn-default" data-toggle="modal" data-target="#MasterDoctorDegreeModal"><i class="fa fa-plus"></i></a>
                                </div>
                            </th>
                        </tr>
                        @if(!$listMasterDoctorDegree->isEmpty())
                            <tr>
                                <th class="col-md-2 text-center">CENTRO DE ESTUDIOS</th>
                                <th class="col-md-2 text-center">ESPECIALIDAD</th>
                                <th class="col-md-2 text-center">FECHA DE EXPEDICION</th>
                                <th class="col-md-3 text-center">PERIODO DE ESTUDIOS</th>
                                <th class="col-md-1 text-center">OPCIONES</th>
                            </tr>
                        @endif
                        </thead>
                        <tbody>
                        @foreach($listMasterDoctorDegree as $item)
                            <tr>
                                <td>{{ $item == null ? "" : $item->college }}</td>
                                <td>{{ $item == null ? "" : $item->concentration }}</td>
                                <td>{{ $item == null ? "" : $item->expedation }}</td>
                                @if(!is_null($item))
                                    <td>{{ (is_null($item->fechainicio)) ? "" : \Carbon\Carbon::parse($item->fechainicio)->format('d-m-Y') }} <strong>&nbsp; {{ $item == null ? "" :  "/" }} &nbsp;</strong> {{ $item == null ? "" : ((is_null($item->fechafin)) ? "" : \Carbon\Carbon::parse($item->fechafin)->format('d-m-Y')) }}</td>
                                @else
                                    <td> - <strong> </strong> - <strong> / </strong> - <strong> / </strong> </td>
                                @endif
{{--                                <td>{{ (is_null($item->fechainicio)) ? "" : \Carbon\Carbon::parse($item->fechainicio)->format('d-m-Y') }} <strong>&nbsp; {{ $item == null ? "" :  "/" }} &nbsp;</strong> {{ $item == null ? "" : ((is_null($item->fechainicio)) ? "" : \Carbon\Carbon::parse($item->fechainicio)->format('d-m-Y')) }}</td>--}}
                                <td class="text-center">
                                    @if($item != null)
                                        <a class="btn btn-sm btn-default" href="{{ route('saveMasterDoctorDegree', ['id_user' => $objUser->id, 'id' => $item->id] ) }}"><i class="fa fa-pencil"></i></a>
                                        @if($item->url != null)
                                            <a class="btn btn-sm btn-default" href="{{ url($item->url) }}" download><i class="fa fa-cloud-download"></i></a>
                                        @endif
                                        <a class="btn btn-sm btn-default" href="{{ route('deleteMasterDoctorDegree') }}?data_id={{ $item->id }}"><i class="fa fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        @if($listMasterDoctorDegree->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">{{ Form::label('No presenta maestrías y/o doctorados', null, ['class' => 'control-label', 'style' => 'font-size:18px']) }}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th colspan="6" class="text-center" style="background-color: #dadada;">
                                <a class="btn btn-sm btn-default ref-education-title">DIPLOMADOS Y/O ESPECIALIZACIONES</a>
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" class="btn btn-sm btn-icon btn-circle btn-default" data-toggle="modal" data-target="#PostgraduateInformationModal"><i class="fa fa-plus"></i></a>
                                </div>
                            </th>
                        </tr>
                        @if(!$listPostGraduate->isEmpty())
                            <tr>
                                <th class="col-md-2 text-center">CENTRO DE ESTUDIOS</th>
                                <th class="col-md-3 text-center">ESPECIALIDAD</th>
                                <th class="col-md-2 text-center">HORAS</th>
                                <th class="col-md-3 text-center">PERIODO DE ESTUDIOS</th>
                                <th class="col-md-1 text-center">OPCIONES</th>
                            </tr>
                        @endif
                        </thead>
                        <tbody>
                        @foreach($listPostGraduate as $item)
                            <tr>
                                <td>{{ $item == null ? "" : $item->college }}</td>
                                <td>{{ $item == null ? "" : $item->concentration }}</td>
                                <td>{{ $item == null ? "" : $item->hours }}</td>
                                @if(!is_null($item))
                                    <td>{{ (is_null($item->fechainicio)) ? "" : \Carbon\Carbon::parse($item->fechainicio)->format('d-m-Y') }} <strong>&nbsp; {{ $item == null ? "" :  "/" }} &nbsp;</strong> {{ $item == null ? "" : ((is_null($item->fechafin)) ? "" : \Carbon\Carbon::parse($item->fechafin)->format('d-m-Y')) }}</td>
                                @else
                                    <td> - <strong> </strong> - <strong> / </strong> - <strong> / </strong> </td>
                                @endif
{{--                                <td>{{ (is_null($item->fechainicio)) ? "" : \Carbon\Carbon::parse($item->fechainicio)->format('d-m-Y') }} <strong>&nbsp; {{ $item == null ? "" :  "/" }} &nbsp;</strong> {{ $item == null ? "" : ((is_null($item->fechainicio)) ? "" : \Carbon\Carbon::parse($item->fechainicio)->format('d-m-Y')) }}</td>--}}
                                <td class="text-center">
                                    @if($item != null)
                                        <a class="btn btn-sm btn-default" href="{{ route('savePostgraduateInformation', ['id_user' => $objUser->id, 'id' => $item->id] ) }}"><i class="fa fa-pencil"></i></a>
                                        @if($item->url != null)
                                            <a class="btn btn-sm btn-default" href="{{ url($item->url) }}" download><i class="fa fa-cloud-download"></i></a>
                                        @endif
                                        <a class="btn btn-sm btn-default" href="{{ route('deletePostgraduateInformation') }}?data_id={{ $item->id }}"><i class="fa fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        @if($listPostGraduate->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">{{ Form::label('No presenta otros estudios', null, ['class' => 'control-label', 'style' => 'font-size:18px']) }}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
 
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th colspan="6" class="text-center" style="background-color: #dadada;">
                                <a class="btn btn-sm btn-default ref-education-title">OTROS ESTUDIOS: CURSOS, CAPACITACIONES, TALLERES Y/0 SEMINARIOS</a>
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" class="btn btn-sm btn-icon btn-circle btn-default" data-toggle="modal" data-target="#OtrosEstudiosModal"><i class="fa fa-plus"></i></a>
                                </div>
                            </th>
                        </tr>
                        @if(!$listOthersStudies->isEmpty())
                            <tr>
                                <th class="col-md-2 text-center">CENTRO DE ESTUDIOS</th>
                                <th class="col-md-2 text-center">NOMBRE DE LOS ESTUDIOS</th>
                                <th class="col-md-3 text-center">TIPO ESTUDIOS</th>
                                <th class="col-md-1 text-center">HORAS</th>
                                <th class="col-md-2 text-center">PERIODO DE ESTUDIOS</th>
                                <th class="col-md-1 text-center">OPCIONES</th>
                            </tr>
                        @endif
                        </thead>
                        <tbody>
                        @foreach($listOthersStudies as $item)
                            <tr>
                                <td>{{ $item == null ? "" : $item->college }}</td>
                                <td>{{ $item == null ? "" : $item->name_studie }}</td>
                                <td>{{ $item == null ? "" : $item->type_studie }}</td>
                                <td>{{ $item == null ? "" : $item->hours }}</td>
                                @if(!is_null($item))
                                    <td>{{ (is_null($item->fechainicio)) ? "" : \Carbon\Carbon::parse($item->fechainicio)->format('d-m-Y') }} <strong>&nbsp; {{ $item == null ? "" :  "/" }} &nbsp;</strong> {{ $item == null ? "" : ((is_null($item->fechafin)) ? "" : \Carbon\Carbon::parse($item->fechafin)->format('d-m-Y')) }}</td>
                                @else
                                    <td> - <strong> </strong> - <strong> / </strong> - <strong> / </strong> </td>
                                @endif
{{--                                <td>{{ (is_null($item->fechainicio)) ? "" : \Carbon\Carbon::parse($item->fechainicio)->format('d-m-Y') }} <strong>&nbsp; {{ $item == null ? "" :  "/" }} &nbsp;</strong> {{ $item == null ? "" : ((is_null($item->fechainicio)) ? "" : \Carbon\Carbon::parse($item->fechainicio)->format('d-m-Y')) }}</td>--}}
                                <td class="text-center">
                                    @if($item != null)
                                        <a class="btn btn-sm btn-default" href="{{ route('saveOtherStudies', ['id_user' => $objUser->id, 'id' => $item->id] ) }}"><i class="fa fa-pencil"></i></a>
                                        @if($item->url != null)
                                            <a class="btn btn-sm btn-default" href="{{ url($item->url) }}" download><i class="fa fa-cloud-download"></i></a>
                                        @endif
                                        <a class="btn btn-sm btn-default" href="{{ route('deleteOtherStudies') }}?data_id={{ $item->id }}"><i class="fa fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        @if($listOthersStudies->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center">{{ Form::label('No presenta otros estudios', null, ['class' => 'control-label', 'style' => 'font-size:18px']) }}</td>
                            </tr>
                        @endif
                        </tbody><br>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div id="ProfessionalTitleModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">

            {{ Form::open(['route' => 'postProfessionalTitle', 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
            <input type="hidden" name="id_user" value="{{ $objUser->id }}"/>
            {{ Form::hidden('path_certificate', null, ['class' => '', 'style' => '']) }}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar Título Profesional</h4>
            </div>

            <div class="modal-body">
                <div class="form-group {{ $errors->has('name_college') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Centro de Estudios</label>
                    <div class="col-md-8">
                        {{ Form::text('name_college', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('name_college'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name_college') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('id_country_pt') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Ubicación (País)</label>
                    <div class="col-md-8">
                        {{ Form::text('id_country_pt', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('id_country_pt'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_country_pt') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('id_department_pt') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Ubicación (Departamento)</label>
                    <div class="col-md-8">
                       {{-- <select class="form-control" id="departamentoNacimiento_pt" name="id_department_pt">
                            <option value="" disabled selected>Seleccione departamento</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>--}}
                        {{ Form::text('id_department_pt', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('id_department_pt'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_department_pt') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('id_province_pt') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Ubicación (Provincia)</label>
                    <div class="col-md-8">
                        {{--<select class="form-control" id="provinciaNacimiento_pt" name="id_province_pt" disabled>
                            <option value="" disabled selected>Seleccione provincia</option>
                        </select>--}}
                        {{ Form::text('id_province_pt', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('id_province_pt'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_province_pt') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('id_district_pt') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Ubicación (Distrito)</label>
                    <div class="col-md-8">
                        {{--<select class="form-control" id="distritoNacimiento_pt" name="id_district_pt" disabled>
                            <option value="" disabled selected>Seleccione distrito</option>
                        </select>--}}
                        {{ Form::text('id_district_pt', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('id_district_pt'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_district_pt') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('concentration') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Especialidad</label>
                    <div class="col-md-8">
                        {{ Form::text('concentration', null, ['class' => 'form-control', 'style' => '']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('concentration'))
                            <span class="help-block">
                                <strong>{{ $errors->first('concentration') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('number_register_title') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Número de Registro de Título</label>
                    <div class="col-md-8">
                        {{ Form::text('number_register_title', null, ['class' => 'form-control', 'id' => 'number_register_title']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('number_register_title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('number_register_title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('date_register_title_pt') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Registro de Título</label>
                    <div class="col-md-8">
                        {{ Form::text('date_register_title_pt', null, ['class' => 'form-control', 'id' => 'date_register_title_pt','autocomplete' => 'off']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('date_register_title_pt'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date_register_title_pt') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('date_begin_pt') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Inicio (Periodo de Estudios)</label>
                    <div class="col-md-8">
                        {{ Form::text('date_begin_pt', null, ['class' => 'form-control', 'id' => 'date_begin_pt','autocomplete' => 'off']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('date_begin_pt'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date_begin_pt') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('date_end_pt') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Fecha de Fin (Periodo de Estudios)</label>
                    <div class="col-md-8">
                        {{ Form::text('date_end_pt', null, ['class' => 'form-control', 'id' => 'date_end_pt','autocomplete' => 'off']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('date_end_pt'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date_end_pt') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('mention') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label">Mención</label>
                    <div class="col-md-8">
                        {{ Form::text('mention', null, ['class' => 'form-control', 'id' => 'date_end_pt']) }}
                    </div>
                    <div class="col-md-offset-3 col-md-8">
                        @if ($errors->has('mention'))
                            <span class="help-block">
                                <strong>{{ $errors->first('mention') }}</strong>
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
                        @if ($errors->has('url_certificate'))
                            <span class="help-block">
                                <strong>{{ $errors->first('url_certificate') }}</strong>
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

    {{--Modal--}}
    <div id="UniversityEducationModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">

                {{ Form::open(['route' => 'postUniversityEducation', 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                <input type="hidden" name="id_user" value="{{ $objUser->id }}"/>
                {{ Form::hidden('path_certificate', null, ['class' => '', 'style' => '']) }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Estudios superiores y no superiores</h4>
                </div>

                <div class="modal-body">
                    <div class="form-group {{ $errors->has('name_university') ? 'has-error' : '' }}">
                        <label class="col-md-3 control-label">Centro de Estudios</label>
                        <div class="col-md-8">
                            {{ Form::text('name_university', null, ['class' => 'form-control', 'style' => '']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('name_university'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name_university') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('concentration') ? 'has-error' : '' }}">
                        <label class="col-md-3 control-label">Especialidad</label>
                        <div class="col-md-8">
                            {{ Form::text('concentration', null, ['class' => 'form-control', 'style' => '']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('concentration'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('concentration') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('id_country_ue') ? 'has-error' : '' }}">
                        <label class="col-md-3 control-label">Ubicación (País)</label>
                        <div class="col-md-8">
                            {{ Form::text('id_country_ue', null, ['class' => 'form-control', 'style' => '']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('id_country_ue'))
                                <span class="help-block">
                                <strong>{{ $errors->first('id_country_ue') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('id_department_ue') ? 'has-error' : '' }}">
                        <label class="col-md-3 control-label">Ubicación (Departamento)</label>
                        <div class="col-md-8">
                            {{--<select class="form-control" id="departamentoNacimiento_ue" name="id_department_ue">
                                <option value="" disabled selected>Seleccione departamento</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>--}}
                            {{ Form::text('id_department_ue', null, ['class' => 'form-control', 'style' => '']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('id_department_ue'))
                                <span class="help-block">
                                <strong>{{ $errors->first('id_department_ue') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('id_province_ue') ? 'has-error' : '' }}">
                        <label class="col-md-3 control-label">Ubicación (Provincia)</label>
                        <div class="col-md-8">
                            {{--<select class="form-control" id="provinciaNacimiento_ue" name="id_province_ue" disabled>
                                <option value="" disabled selected>Seleccione provincia</option>
                            </select>--}}
                            {{ Form::text('id_province_ue', null, ['class' => 'form-control', 'style' => '']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('id_province_ue'))
                                <span class="help-block">
                                <strong>{{ $errors->first('id_province_ue') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('id_district_ue') ? 'has-error' : '' }}">
                        <label class="col-md-3 control-label">Ubicación (Distrito)</label>
                        <div class="col-md-8">
                            {{--<select class="form-control" id="distritoNacimiento_ue" name="id_district_ue" disabled>
                                <option value="" disabled selected>Seleccione distrito</option>
                            </select>--}}
                            {{ Form::text('id_district_ue', null, ['class' => 'form-control', 'style' => '']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('id_district_ue'))
                                <span class="help-block">
                                <strong>{{ $errors->first('id_district_ue') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('date_begin_ue') ? 'has-error' : '' }}">
                        <label class="col-md-3 control-label">Fecha de Inicio (Periodo de Estudios)</label>
                        <div class="col-md-8">
                            {{ Form::text('date_begin_ue', null, ['class' => 'form-control', 'id' => 'date_begin_ue','autocomplete' => 'off']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('date_begin_ue'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('date_begin_ue') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('date_end_ue') ? 'has-error' : '' }}">
                        <label class="col-md-3 control-label">Fecha de Fin (Periodo de Estudios)</label>
                        <div class="col-md-8">
                            {{ Form::text('date_end_ue', null, ['class' => 'form-control', 'id' => 'date_end_ue','autocomplete' => 'off']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('date_end_ue'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('date_end_ue') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('url_certificate') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Constancia</label>
                        <div class="col-md-8">
                            {{ Form::file('url_certificate', array('placeholder' => '','class' => 'form-control', 'accept' => 'application/pdf')) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('url_certificate'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('url_certificate') }}</strong>
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

    {{--Modal--}}
    <div id="MasterDoctorDegreeModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">

                {{ Form::open(['route' => 'postMasterDoctorDegree', 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                <input type="hidden" name="id_user" value="{{ $objUser->id }}"/>
                {{ Form::hidden('path_certificate', null, ['class' => '', 'style' => '']) }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Maestría y/o Doctorado</h4>
                </div>

                <div class="modal-body">
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
                    <div class="form-group {{ $errors->has('concentration') ? 'has-error' : '' }}">
                        <label class="col-md-3 control-label">Especialidad</label>
                        <div class="col-md-8">
                            {{ Form::text('concentration', null, ['class' => 'form-control', 'style' => '']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('concentration'))
                                <span class="help-block">
                                <strong>{{ $errors->first('concentration') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('date_expedition_md') ? 'has-error' : '' }}">
                        <label class="col-md-3 control-label">Fecha de Expedición </label>
                        <div class="col-md-8">
                            {{ Form::text('date_expedition_md', null, ['class' => 'form-control', 'id' => 'date_expedition_md','autocomplete' => 'off']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('date_expedition_md'))
                                <span class="help-block">
                                <strong>{{ $errors->first('date_expedition_md') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('date_begin_md') ? 'has-error' : '' }}">
                        <label class="col-md-3 control-label">Fecha de Inicio (Periodo de Estudios)</label>
                        <div class="col-md-8">
                            {{ Form::text('date_begin_md', null, ['class' => 'form-control', 'id' => 'date_begin_md','autocomplete' => 'off']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('date_begin_md'))
                                <span class="help-block">
                                <strong>{{ $errors->first('date_begin_md') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('date_end_md') ? 'has-error' : '' }}">
                        <label class="col-md-3 control-label">Fecha de Fin (Periodo de Estudios)</label>
                        <div class="col-md-8">
                            {{ Form::text('date_end_md', null, ['class' => 'form-control', 'id' => 'date_end_md','autocomplete' => 'off']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('date_end'))
                                <span class="help-block">
                                <strong>{{ $errors->first('date_end_md') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('url_certificate') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Constancia</label>
                        <div class="col-md-8">
                            {{ Form::file('url_certificate', array('placeholder' => '','class' => 'form-control', 'accept' => 'application/pdf')) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('url_certificate'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('url_certificate') }}</strong>
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

    {{--Modal--}}
    <div id="PostgraduateInformationModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">

                {{ Form::open(['route' => 'postPostgraduateInformation', 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                <input type="hidden" name="id_user" value="{{ $objUser->id }}"/>
                {{ Form::hidden('path_certificate', null, ['class' => '', 'style' => '']) }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Diplomados y/o Especializaciones</h4>
                </div>

                <div class="modal-body">
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
                    <div class="form-group {{ $errors->has('concentration') ? 'has-error' : '' }}">
                        <label class="col-md-3 control-label">Especialidad</label>
                        <div class="col-md-8">
                            {{ Form::text('concentration', null, ['class' => 'form-control', 'style' => '']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('concentration'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('concentration') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('date_expedition_pi') ? 'has-error' : '' }}">
                        <label class="col-md-3 control-label">Fecha de Expedición </label>
                        <div class="col-md-8">
                            {{ Form::text('date_expedition_pi', null, ['class' => 'form-control', 'id' => 'date_expedition_pi','autocomplete' => 'off']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('date_expedition_pi'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('date_expedition_pi') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('hours') ? 'has-error' : '' }}">
                        <label class="col-md-3 control-label">Hours </label>
                        <div class="col-md-8">
                            {{ Form::number('hours', null, ['class' => 'form-control', 'min' => '0'] ) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('hours'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('hours') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('date_begin_pi') ? 'has-error' : '' }}">
                        <label class="col-md-3 control-label">Fecha de Inicio (Periodo de Estudios)</label>
                        <div class="col-md-8">
                            {{ Form::text('date_begin_pi', null, ['class' => 'form-control', 'id' => 'date_begin_pi','autocomplete' => 'off']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('date_begin_pi'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('date_begin_pi') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('date_end_pi') ? 'has-error' : '' }}">
                        <label class="col-md-3 control-label">Fecha de Fin (Periodo de Estudios)</label>
                        <div class="col-md-8">
                            {{ Form::text('date_end_pi', null, ['class' => 'form-control', 'id' => 'date_end_pi','autocomplete' => 'off']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('date_end_pi'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('date_end_pi') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('url_certificate') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Constancia</label>
                        <div class="col-md-8">
                            {{ Form::file('url_certificate', array('placeholder' => '','class' => 'form-control', 'accept' => 'application/pdf')) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('url_certificate'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('url_certificate') }}</strong>
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

    {{--Modal--}}
    <div id="OtrosEstudiosModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">

                {{ Form::open(['route' => 'postOtherStudies', 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                <input type="hidden" name="id_user" value="{{ $objUser->id }}"/>
                {{ Form::hidden('path_certificate', null, ['class' => '', 'style' => '']) }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Otros Estudios: Cursos, Capacitaciones, Talleres y/o Seminarios</h4>
                </div>

                <div class="modal-body">
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
                    <div class="form-group {{ $errors->has('name_studie') ? 'has-error' : '' }}">
                        <label class="col-md-3 control-label">Nombre del Estudio</label>
                        <div class="col-md-8">
                            {{ Form::text('name_studie', null, ['class' => 'form-control', 'style' => '']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('name_studie'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name_studie') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('type_studie') ? 'has-error' : '' }}">
                        <label class="col-md-3 control-label">Especialidad</label>
                        <div class="col-md-8">
                            {{ Form::text('type_studie', null, ['class' => 'form-control', 'style' => '']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('type_studie'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('type_studie') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('hours') ? 'has-error' : '' }}">
                        <label class="col-md-3 control-label">Hours </label>
                        <div class="col-md-8">
                            {{ Form::number('hours', null, ['class' => 'form-control', 'min' => '0'] ) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('hours'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('hours') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('date_begin_oe') ? 'has-error' : '' }}">
                        <label class="col-md-3 control-label">Fecha de Inicio (Periodo de Estudios)</label>
                        <div class="col-md-8">
                            {{ Form::text('date_begin_oe', null, ['class' => 'form-control', 'id' => 'date_begin_oe','autocomplete' => 'off']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('date_begin_oe'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('date_begin_oe') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('date_end_oe') ? 'has-error' : '' }}">
                        <label class="col-md-3 control-label">Fecha de Fin (Periodo de Estudios)</label>
                        <div class="col-md-8">
                            {{ Form::text('date_end_oe', null, ['class' => 'form-control', 'id' => 'date_end_oe','autocomplete' => 'off']) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('date_end_oe'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('date_end_oe') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('url_certificate') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Constancia</label>
                        <div class="col-md-8">
                            {{ Form::file('url_certificate', array('placeholder' => '','class' => 'form-control', 'accept' => 'application/pdf')) }}
                        </div>
                        <div class="col-md-offset-3 col-md-8">
                            @if ($errors->has('url_certificate'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('url_certificate') }}</strong>
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


    </div>

@endsection

@section('scripts')

    <script>

        $("#date_register_title_pt").datepicker({
            format:"dd-mm-yyyy",
            language:"es",
            endDate: '1d'
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });

        $("#date_expedition_md,#date_expedition_pi").datepicker({
            format:"dd-mm-yyyy",
            language:"es",
            // startDate: '1d'
            // endDate: '1d'
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });


        $( "#date_begin_ue" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
            $('#date_end_ue').attr('disabled',false);
            $('#date_end_ue').val("");
            $('#date_end_ue').datepicker('setStartDate', e.date);
        });

        $( "#date_end_ue" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
            startDate: '+1d'
        }).on('changeDate', function(){
            $(this).datepicker('hide');
        });


        $( "#date_begin_pt" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
            $('#date_end_pt').attr('disabled',false);
            $('#date_end_pt').val("");
            $('#date_end_pt').datepicker('setStartDate', e.date);
        });

        $( "#date_end_pt" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
            startDate: '+1d'
        }).on('changeDate', function(){
            $(this).datepicker('hide');
        });


        $( "#date_begin_md" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
            $('#date_end_md').attr('disabled',false);
            $('#date_end_md').val("");
            $('#date_end_md').datepicker('setStartDate', e.date);
        });

        $( "#date_end_md" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
            startDate: '+1d'
        }).on('changeDate', function(){
            $(this).datepicker('hide');
        });


        $( "#date_begin_pi" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
            $('#date_end_pi').attr('disabled',false);
            $('#date_end_pi').val("");
            $('#date_end_pi').datepicker('setStartDate', e.date);
        });

        $( "#date_end_pi" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
            startDate: '+1d'
        }).on('changeDate', function(){
            $(this).datepicker('hide');
        });


        $( "#date_begin_oe" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
            $('#date_end_pi').attr('disabled',false);
            $('#date_end_pi').val("");
            $('#date_end_pi').datepicker('setStartDate', e.date);
            $('#date_end_oe').attr('disabled',false);
            $('#date_end_oe').val("");
            $('#date_end_oe').datepicker('setStartDate', e.date);
        });

        $( "#date_end_oe" ).datepicker({
            format:"dd-mm-yyyy",
            language:"es",
            startDate: '+1d'
        }).on('changeDate', function(){
            $(this).datepicker('hide');
        });

        // function reloadPageFunction() {
        //     setTimeout(function(){
        //         location.reload();
        //     }, 2000);
        // }

        {{--$(".btn-delete-universityeducation").on("click", function () {--}}
        {{--    $.ajax({--}}
        {{--        url: "{{ route('deleteUniversityEducation')}}",--}}
        {{--        type: "POST",--}}
        {{--        data: {--}}
        {{--            data_id: $(this).data("id")--}}
        {{--        },--}}
        {{--        beforeSend: function () {--}}
        {{--        },--}}
        {{--        complete: function () {--}}
        {{--        },--}}
        {{--        success: function (result) {--}}
        {{--            console.log(result);--}}
        {{--            if (result.status == 200) {--}}
        {{--                swal("Eliminado", result.text , 'success');--}}
        {{--                reloadPageFunction();--}}
        {{--            } else if (result.status == 500) {--}}
        {{--                swal(result.title, result.text, 'error');--}}
        {{--            } else {--}}
        {{--                // location.reload();--}}
        {{--            }--}}
        {{--        }--}}
        {{--    });--}}

        {{--    // swal({--}}
        {{--    //         title: '¿Está seguro de eliminar este registro?',--}}
        {{--    //         text: "Una vez eliminado no se podrá recuperar",--}}
        {{--    //         type: 'warning',--}}
        {{--    //         showCancelButton: true,--}}
        {{--    //         confirmButtonColor: '#3085d6',--}}
        {{--    //         cancelButtonColor: '#d33',--}}
        {{--    //         confirmButtonText: 'Sí',--}}
        {{--    //         cancelButtonText: 'Cancelar',--}}
        {{--    //         showLoaderOnConfirm: true,--}}
        {{--    //         closeOnConfirm: false--}}
        {{--    //     },--}}
        {{--    //     function (isConfirm) {--}}
        {{--    //         if (isConfirm) {--}}
        {{--    //--}}
        {{--    //         }--}}
        {{--    //     });--}}
        {{--});--}}


    </script>



@endsection