@extends('layouts.app')

@section('content')

    <ol class="breadcrumb pull-right">
        <li><a href="{{ route('/') }}">Inicio</a></li>
        <li><a href="{{ route('staffManagement') }}">Gestión de Personal</a></li>
        <li><a href="{{ route('personalIdentificationIndex') }}/{{ $id }}">Identificación Personal</a></li>
        <li class="active">Ficha de Datos</li>
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
                    <a href="{{ url('personal_identification/index/'.$id) }}" class="btn btn-xs btn-icon btn-circle btn-success"><i class="fa fa-arrow-left"></i></a>
                            Identificación Personal
                </h4>



            </div>

            {{ Form::open(['route' => 'personalIdentificationUpdate','class'=>'form-horizontal','id' => 'form-solicitud']) }}

            {!! Form::hidden('invisible', $id, array('id' => 'invisible_id')) !!}

            <div class="panel-body">

                <div class="container">
                    <div class="form-group col-md-12 text-center">
                        @if ($Afill->foto_size_carnet)
                            <img src="{{ url($Afill->foto_size_carnet) }}" class="img-thumbnail" width="113" height="151">
                        @else
                            <span>
                                <strong>No hay foto para mostrar</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-md-12">
                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label control-label">Código Modular</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="codigoModular" value="{{ $personalIdentification->modular_code or '' }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12 ">
                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Nombres</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="" name="nombres" value="{{ $user->name or '' }}">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Apellido Paterno</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="" name="apellidoPaterno" value="{{ $user->first_surname or '' }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Apellido Materno</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="" name="apellidoMaterno" value="{{ $user->second_surname or '' }}">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Fecha de nacimiento</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control datepicker" placeholder="dd-mm-aa" name="fechaNacimiento" value="{{ (is_null($personalIdentification->birth_date)) ? "" : \Carbon\Carbon::parse($personalIdentification->birth_date)->format('d-m-Y')  }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Depa. de nacimiento</label>
                            <div class="col-md-10">
                                <select class="form-control select2" id="departamentoNacimiento" name="birth_id_department" >
                                    <option value="" disabled selected>Seleccione departamento</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}" @if($birth_department == $department->name)selected="selected" @endif>{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Prov. de nacimiento</label>
                            <div class="col-md-10">
                                <select class="form-control select2" id="provinciaNacimiento" name="provinciaNacimiento" disabled>
                                    <option>{{ $birth_province or '' }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Dist. de nacimiento</label>
                            <div class="col-md-10">
                                <select class="form-control select2" id="distritoNacimiento" name="distritoNacimiento" disabled>
                                    <option>{{ $birth_district or '' }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Domicilio actual</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="" name="domicilioActual" value="{{ $personalIdentification->address or '' }}" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Depa. de vivienda</label>
                            <div class="col-md-10">
                                <select class="form-control select2" id="departamentoVivienda" name="home_id_department" placeholder="Seleccione departamento" >
                                    <option value="" disabled selected>Seleccione departamento</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}" @if($home_department == $department->name)selected="selected" @endif>{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Prov. de vivienda</label>
                            <div class="col-md-10">
                                <select class="form-control select2" id="provinciaVivienda" name="provinciaVivienda" disabled >
                                    <option>{{ $home_province or '' }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Dist. de vivienda</label>
                            <div class="col-md-10">
                                <select class="form-control select2" id="distritoVivienda" name="distritoVivienda" disabled >
                                    <option>{{ $home_district or '' }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Teléfono fijo</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="" name="telefonoFijo" value="{{ $personalIdentification->phone or '' }}" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Teléfono celular</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="" name="telefonoCelular" value="{{ $personalIdentification->cellphone or '' }}" >
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Correo electrónico</label>
                            <div class="col-md-10">
                                <input type="email" class="form-control" placeholder="" name="email" value="{{ $personalIdentification->email or '' }}" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">DNI</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="" name="dni" value="{{ $personalIdentification->dni or '' }}" >
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Sexo</label>
                            <div class="col-md-10">
                                {{ Form::select('sex', array('' => 'Seleccione una opción.','F' => 'F', 'M' => 'M'), $personalIdentification->sex, ['class' => 'form-control select2']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Tipo de sangre</label>
                            <div class="col-md-10">

                                {{ Form::select('blood_type' ,array(
                                 '' => 'Seleccione una opción.',
                                 'A-' => 'A-',
                                 'A+' => 'A+',
                                 'B-' => 'B-',
                                 'B+' => 'B+',
                                 'AB-' => 'AB-',
                                 'AB+' => 'AB+',
                                 'O-' => 'O-',
                                 'O+' => 'O+'
                                 ), $personalIdentification->blood_type, ['class' => 'form-control select2']) }}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Régimen laboral</label>
                            <div class="col-md-10">
                                {{ Form::select('employment_regime', array(
                                  '' => 'Seleccione una opción.',
                                  '1' => 'Sector Público',
                                  '2' => 'Sector Privado'
                                  ),  $personalIdentification->employment_regime, ['class' => 'form-control select2']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Régimen pensionario</label>
                            <div class="col-md-10">
                                {{ Form::select('pension_regime', array(
                                 '' => 'Seleccione una opción.',
                                 '1' => 'Público',
                                 '2' => 'Privado'
                                 ), $personalIdentification->pension_regime, ['class' => 'form-control select2']) }}

                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Sistema pensionario</label>
                            <div class="col-md-10">
                                {{ Form::select('pension_system', array(
                              '' => 'Seleccione una opción.',
                              'AFP' => 'AFP',
                              'ONP' => 'ONP'
                              ), $personalIdentification->pension_system, ['class' => 'form-control select2']) }}

                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Condición laboral</label>
                            <div class="col-md-10">
                                {{ Form::select('labor_conditional',$laborconditional , $personalIdentification->id_labor_conditional, ['class' => 'form-control select2']) }}

                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Dependencia o Facultad</label>
                            <div class="col-md-10">
                                {{ Form::select('dependence',$dependence, $personalIdentification->id_dependence, ['class' => 'form-control select2']) }}

                            </div>
                        </div>
                    </div>


                    <div class="form-group col-md-12 ">
                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Nivel o Categoría</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="" name="category" value="{{ $personalIdentification->category or '' }}">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Cargo o Dedicación</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="" name="position" value="{{ $personalIdentification->position or '' }}">
                            </div>
                        </div>
                    </div>


                    <div class="form-group col-md-12">
                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Fecha de afiliación (Sistema de pensiones)</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control datepicker" placeholder="dd-mm-aa" name="fechaAfiliacion" value="{{ (is_null($personalIdentification->affiliation_date)) ? "" : \Carbon\Carbon::parse($personalIdentification->affiliation_date)->format('d-m-Y')  }}" >
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">CUSPP</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="" name="cuspp" value="{{ $personalIdentification->cuspp or '' }}" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Autogenerado ESSALUD</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="" name="essalud" value="{{ $personalIdentification->essalud or '' }}" >
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Estado civil</label>
                            <div class="col-md-10">
                                {{ Form::select('civil_status', array(
                                        '' => 'Seleccione una opción.',
                                       'Soltero' => 'Soltero/a',
                                       'Comprometido' => 'Comprometido/a',
                                       'Casado' => 'Casado/a',
                                       'Divorciado' => 'Divorciado/a',
                                       'Viudo' => 'Viudo/a'
                                       ), $personalIdentification->civil_status, ['class' => 'form-control select2']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Nombres del cónyugue</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="" name="nombresConyugue" value="{{ $personalIdentification->spouse_name or '' }}" >
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-md-2 col-form-label">Apellidos del cónyugue</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="" name="apellidosConyugue" value="{{ $personalIdentification->spouse_surname or '' }}" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="col-md-1">Hijos</label>

                        <div id="listaHijos" class="form-group col-md-12">
                            <div class="form-group col-md-12">
                                <!--Div espacio-->
                            </div>
                            <!--Aqui van los hijos-->
                            @if(count($personalIdentificationSibling) <= 0)
                                <label class="form-group col-md-12">No hay hijos para mostrar</label>
                            @endif

                            @foreach($personalIdentificationSibling as $sibling)
                                <div class="form-group col-md-12 hijo">

                                    <label class="col-md-1 control-label">Nombres</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control nombresHijo" value="{{ $sibling->name or '' }}" disabled>
                                    </div>

                                    <label class="col-md-1 control-label">Apellidos</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control apellidosHijo" value="{{ $sibling->surname or '' }}" disabled>
                                    </div>

                                    <label class="col-md-1 control-label">Sexo</label>
                                    <div class="col-md-1">
                                        <select class="form-control sexoHijo selectsexo" disabled>
                                            <option>{{ $sibling->sex or '' }}</option>
                                        </select>
                                    </div>

                                    <label class="col-md-1 control-label">Fecha de nacimiento</label>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control fechaNacimientoHijo datepicker" value="{{ (is_null($personalIdentification->birth_date)) ? "" : \Carbon\Carbon::parse($personalIdentification->birth_date)->format('d-m-Y')  }}" disabled>
                                    </div>

                                </div>
                            @endforeach
                        </div>

                    </div>

                    <div class="form-group col-md-12">
                        <label class="col-md-1">Padres</label>

                        <div id="listaPadres" class="form-group col-md-12">
                            <div class="form-group col-md-12">
                                <!--Div espacio-->
                            </div>
                            @if(count($personalIdentificationParent) <= 0)
                                <label class="form-group col-md-12">No hay padres para mostrar</label>
                            @endif

                            @foreach($personalIdentificationParent as $parent)
                                <div class="form-group col-md-12 padre">

                                    <label class="col-md-1 control-label">Nombres</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control nombresPadre" value="{{ $parent->name or '' }}" disabled>
                                    </div>

                                    <label class="col-md-1 control-label">Apellidos</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control apellidosPadre" value="{{ $parent->surname or '' }}" disabled>
                                    </div>

                                    <label class="col-md-1 control-label estadoVidaPadre">Estado de vida (Viven)</label>
                                    <div class="col-md-2">
                                        <select class="form-control estadoVidaPadre selectpension" disabled>
                                            <option>{{ ($parent->life_state == 1) ? 'Si' : 'No' }}</option>
                                        </select>
                                    </div>

                                </div>
                            @endforeach
                        </div>


                    </div>



                    <div class="form-group col-md-12">
                        <label class="col-md-1">Hijos</label>
                        <div class="col-md-11">
                            <button type="button" class="btn btn-default addButton" id="agregarHijoBoton"><i class="fa fa-plus"></i></button>
                        </div>

                        <div id="listaHijos" class="form-group col-md-12">
                            <div class="form-group col-md-12">
                                <!--Div espacio-->
                            </div>
                            <!--Aqui van los hijos-->
                        </div>

                        <!-- Template de hijo -->
                        <!--No cambiar las clases hijo, apellidosHijo, nombresHijo, sexoHijo, fechaNacimientoHijo, removerHijoBoton-->
                        <div class="form-group col-md-12 hijo hide" id="hijoTemplate">
                            <input type="hidden" class="idHijo" value="-1">

                            <label class="col-md-1 control-label">Nombres</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control nombresHijo" placeholder="Nombres">
                            </div>

                            <label class="col-md-1 control-label">Apellidos</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control apellidosHijo" placeholder="Apellidos">
                            </div>

                            <label class="col-md-1 control-label">Sexo</label>
                            <div class="col-md-2">
                                {{--<select class="form-control sexoHijo select2">--}}
                                    {{--<option value="F">F</option>--}}
                                    {{--<option value="M">M</option>--}}
                                {{--</select>--}}
                                {{ Form::select("sexo_hijo[]", array(
                                    '' => 'Seleccione una opción.',
                                    'F' => 'Femenino',
                                    'M' => 'Masculino'
                                    ), $personalIdentification->pension_regime, ['class' => 'form-control sexoHijo selectsexo']) }}
                            </div>

                            <label class="col-md-1 control-label">Fecha de nacimiento</label>
                            <div class="col-md-1">
                                <input type="text" class="form-control fechaNacimientoHijo datepicker">
                            </div>

                            <div class="col-md-1">
                                <button type="button" class="btn btn-default removerHijoBoton"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <!--Fin template de hijo-->
                    </div>

                    <div class="form-group col-md-12">
                        <label class="col-md-1">Padres</label>
                        <div class="col-md-11">
                            <button type="button" class="btn btn-default addButton" id="agregarPadreBoton"><i class="fa fa-plus"></i></button>
                        </div>

                        <div id="listaPadres" class="form-group col-md-12">
                            <div class="form-group col-md-12">
                                <!--Div espacio-->
                            </div>
                            <!--Aqui van los padres-->
                        </div>

                        <!-- Template de padre -->
                        <!--No cambiar las clases padre, apellidosPadre, nombresPadre, estadoVidaPadre, removerPadreBoton-->
                        <div class="form-group col-md-12 padre hide" id="padreTemplate">
                            <input type="hidden" class="idPadre" value="-1">

                            <label class="col-md-1 control-label">Nombres</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control nombresPadre" placeholder="Nombres">
                            </div>

                            <label class="col-md-1 control-label">Apellidos</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control apellidosPadre" placeholder="Apellidos">
                            </div>

                            <label class="col-md-1 control-label">Estado de vida (Viven)</label>
                            <div class="col-md-2">
                                {{--<select class="form-control estadoVidaPadre select2">--}}
                                    {{--<option>Si</option>--}}
                                    {{--<option>No</option>--}}
                                {{--</select>--}}
                                {{ Form::select(null, array(
                                  '' => 'Seleccione una opción.',
                                  true => 'Sí',
                                  false => 'No'
                                  ), $personalIdentification->pension_regime, ['class' => 'form-control estadoVidaPadre selectpension']) }}
                            </div>

                            <div class="col-md-1">
                                <button type="button" class="btn btn-default removerPadreBoton"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <!--Fin template de padre-->
                    </div>

                </div>
                <div class="form-group text-center">
                    <a type="button" href="{{ url('personal_identification/index/'.$id) }}" class="btn btn-primary" >Cancelar</a>
                    <input type="submit"  class="btn btn-primary" role="button" value="Actualizar"/>
                </div>

            </div>

            {!! Form::close() !!}
        </div>
    </div>

@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            //Funcionalidad de agregado y borrado dinamico para lista de hijos y padres
            hijoIndex = -1;
            padreIndex = -1;



            $(".select2").select2();

            $(".datepicker").datepicker({
                format:"dd-mm-yyyy",
                language:"es",
                endDate: '1d'
            }).on('changeDate', function(e){
                $(this).datepicker('hide');
            });


            $('#agregarHijoBoton')
            // Add button click handler
                .on('click', function() {
                    agregarHijo();
                });

            $('#agregarPadreBoton')
            // Add button click handler
                .on('click', function() {
                    agregarPadre();
                });

            $('#listaHijos')
            // Remove button click handler
                .on('click', '.removerHijoBoton', function() {
                    var $row  = $(this).parents('.form-group');

                    //Remove element containing the fields
                    $row[0].remove();
                    hijoIndex--;

                    //Actualizar en cascada los indices del arreglo de hijos
                    var $hijos = $('.hijo','#listaHijos');
                    for (i = 0; i < $hijos.length; i++) {
                        var $hijo = $($hijos[i]);

                        $hijo.attr('data-hijo-index', i);
                        $hijo.find('.nombresHijo').attr('name','nombre_hijo[]').end()
                            .find('.apellidosHijo').attr('name','apellido_hijo[}').end()
                            .find('.sexoHijo').attr('name','sexo_hijo').end()
                            .find('.fechaNacimientoHijo').attr('name','fechaN_hijo').end()
                    }
                });


            $('#listaPadres')
            // Remove button click handler
                .on('click', '.removerPadreBoton', function() {
                    var $row  = $(this).parents('.form-group');

                    //Remove element containing the fields
                    $row[0].remove();
                    padreIndex--;

                    //Actualizar en cascada los indices del arreglo de padres
                    var $padres = $('.padre','#listaPadres');
                    for (i = 0; i < $padres.length; i++) {
                        var $padre = $($padres[i]);

                        $padre.attr('data-padre-index', i);
                        $padre.find('.nombresPadre').attr('name','nombre_padre').end()
                            .find('.apellidosPadre').attr('name','apellido_padre').end()
                            .find('.estadoVidaPadre').attr('name','estadoV_padre').end();

                    }
                });
            //

            //PARTE ASINCRONA, NO DESBINDEAR LOS CALLBACKS SI NO SE HACE UN RACE CONDITION EN actualizarProvincia y actualizarDistrito
            //Obtener valores de departamente, provincia y distrito de la BD y llenarlos en el formulario
            valorDepartamentoNacimiento = '{{ $personalIdentification->birth_id_department }}';
            valorProvinciaNacimiento = '{{ $personalIdentification->birth_id_province }}';
            valorDistritoNacimiento = '{{ $personalIdentification->birth_id_district }}';
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

                valorDepartamentoVivienda = '{{ $personalIdentification->home_id_department }}';
                valorProvinciaVivienda = '{{ $personalIdentification->home_id_province }}';
                valorDistritoVivienda = '{{ $personalIdentification->home_id_district }}';
                if(valorDepartamentoVivienda != '')
                {
                    $('#departamentoVivienda option:selected').attr('selected', null);
                    $('#departamentoVivienda option[value="' + valorDepartamentoVivienda +'"]').prop('selected', true);

                    actualizarProvincia('departamentoVivienda', 'provinciaVivienda', function() {
                        if(valorProvinciaVivienda != '') {
                            $('#provinciaVivienda option:selected').attr('selected', null);
                            $('#provinciaVivienda option[value="' + valorProvinciaVivienda + '"]').prop("selected", true);
                        }

                        actualizarDistrito('provinciaVivienda', 'distritoVivienda', function() {
                            if (valorDistritoVivienda != '') {
                                $('#distritoVivienda option:selected').attr('selected', null);
                                $('#distritoVivienda option[value="' + valorDistritoVivienda + '"]').prop("selected", true);
                            }
                        });
                    });
                }

                valorDepartamentoVivienda = '{{ $personalIdentification->home_id_department }}';
                valorProvinciaVivienda = '{{ $personalIdentification->home_id_province }}';
                valorDistritoVivienda = '{{ $personalIdentification->home_id_district }}';
                if(valorDepartamentoVivienda != '')
                {
                    $('#departamentoVivienda option:selected').attr('selected', null);
                    $('#departamentoVivienda option[value="' + valorDepartamentoVivienda +'"]').prop('selected', true);

                    actualizarProvincia('departamentoVivienda', 'provinciaVivienda', function() {
                        if(valorProvinciaVivienda != '') {
                            $('#provinciaVivienda option:selected').attr('selected', null);
                            $('#provinciaVivienda option[value="' + valorProvinciaVivienda + '"]').prop("selected", true);
                        }

                        actualizarDistrito('provinciaVivienda', 'distritoVivienda', function() {
                            if (valorDistritoVivienda != '') {
                                $('#distritoVivienda option:selected').attr('selected', null);
                                $('#distritoVivienda option[value="' + valorDistritoVivienda + '"]').prop("selected", true);
                            }
                        });
                    });
                }

            }

            //Rellenar campos de hijos de BD
            @if($personalIdentification->sibling != null)
                @foreach($personalIdentification->sibling as $sibling)
                agregarHijo('{{$sibling->id}}', '{{$sibling->name}}', '{{$sibling->surname}}', '{{$sibling->sex}}', '{{$sibling->birth_date}}')
            @endforeach
            @endif

            //Rellenar campos de padres de BD
            @if($personalIdentification->parent != null)
                @foreach($personalIdentification->parent as $parent)
                agregarPadre('{{$parent->id}}', '{{$parent->name}}', '{{$parent->surname}}', '{{$parent->life_state}}')
            @endforeach
            @endif

        });

        function agregarHijo(id, nombres, apellidos, sexo, fechaNacimiento)
        {
            hijoIndex++;
            var $template = $('#hijoTemplate'),
                $clone    = $template
                    .clone()
                    .removeClass('hide')
                    .removeAttr('id')
                    .attr('data-hijo-index', hijoIndex)
                    .appendTo($('#listaHijos'));

            // Update the name attributes
            $clone.find('.nombresHijo').attr('name','nombre_hijo[]').end()
                .find('.apellidosHijo').attr('name','apellido_hijo[]').end()
//                .find('.sexoHijo').attr('name','sexo_hijo[]').end()
                .find('.fechaNacimientoHijo').attr('name','fechaN_hijo[]').end();

            if(id != null && id != '')
                $clone.find('.idHijo').val(id).end();
            if(nombres != null && nombres != '')
                $clone.find('.nombresHijo').val(nombres).end();
            if(apellidos != null && apellidos != '')
                $clone.find('.apellidosHijo').val(apellidos).end();
            if(sexo != null && sexo != '')
                $clone.find('.sexoHijo').val(sexo).end();
            if(fechaNacimiento != null && fechaNacimiento != '')
                $clone.find('.fechaNacimientoHijo').val(fechaNacimiento).end();

            $(".datepicker").datepicker({
                format:"dd-mm-yyyy",
                language:"es"
            }).on('changeDate', function(e){
                $(this).datepicker('hide');
            });



            //Si el id es < 0, significa que no existe y debe ser creado en BD
        }

        function agregarPadre(id, nombres, apellidos, estadoVida)
        {
            padreIndex++;
            var $template = $('#padreTemplate'),
                $clone    = $template
                    .clone()
                    .removeClass('hide')
                    .removeAttr('id')
                    .attr('data-padre-index', padreIndex)
                    .appendTo($('#listaPadres'));

            // Update the name attributes
            $clone.find('.nombresPadre').attr('name','nombre_padre[]').end()
                .find('.apellidosPadre').attr('name','apellido_padre[]').end()
                .find('.estadoVidaPadre').attr('name','estadoV_padre[]').end();

            if(id != null && id != '')
                $clone.find('.idPadre').val(id)
            if(nombres != null && nombres != '')
                $clone.find('.nombresPadre').val(nombres);
            if(apellidos != null && apellidos != '')
                $clone.find('.apellidosPadre').val(apellidos);
            if(estadoVida != null && estadoVida != '')
                $clone.find('.estadoVida').val(estadoVida);
            $(".datepicker").datepicker({
                format:"dd-mm-yyyy",
                language:"es"
            }).on('changeDate', function(e){
                $(this).datepicker('hide');
            });



            //Si el id < 0, significa que no existe y debe ser creado en BD
        }

        //Dropdown dinamico distrito, provincia, departamento
        function actualizarProvincia(selectIdDepartamento, selectIdProvincia, callback)
        {
            $selectDepartamento = $('#' + selectIdDepartamento);
            $('#' + selectIdProvincia).prop('disabled', true);

            $.ajax({
                type: "get",
                url: "{{ route('personalIdentificationGetProvinces') }}",
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
                url: "{{ route('personalIdentificationGetDistricts') }}",
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

        $('#departamentoVivienda').change( function() {
            actualizarProvincia('departamentoVivienda', 'provinciaVivienda',
                function() { actualizarDistrito('provinciaVivienda', 'distritoVivienda') });
        });

        $('#provinciaVivienda').change( function() {
            actualizarDistrito('provinciaVivienda', 'distritoVivienda');
        });

//        $('.date-picker').datetimepicker({
//            locale:'es',
//            widgetPositioning: {
//                horizontal: 'left'
//            },
//            icons: {
//                time: "fa fa-clock-o",
//                date: "fa fa-calendar",
//                up: "fa fa-arrow-up",
//                down: "fa fa-arrow-down"
//            },
//            format: 'DD/MM/YYYY'
//        });


    </script>

@endsection