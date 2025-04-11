@if(Auth::user()->hasRole(['admin']))
    <li class="has-sub{{ (Request::is('staff_management') ? ' active' : '') }}">
        <a href="{{ route('staffManagement') }}">
            <i class="fa fa-gear"></i>
            <span>Gestion del Personal</span>
        </a>
    </li>
    <li class="has-sub{{ (Request::is('resolution_type/index') ? ' active' : '') }}">
        <a href="{{ route('getResolutionTypes') }}">
            <i class="fa fa-clone"></i>
            <span>Tipo Resolusión</span>
        </a>
    </li>

    <li class="has-sub{{ (Request::is('laborconditional') ? ' active' : '') }}">
        <a href="{{ route('laborconditional') }}">
            <i class="fa fa-gear"></i>
            <span>Gestion de Condición Laboral</span>
        </a>
    </li>
    <li class="has-sub{{ (Request::is('dependence') ? ' active' : '') }}">
        <a href="{{ route('dependence') }}">
            <i class="fa fa-gear"></i>
            <span>Gestion de Dependencia</span>
        </a>
    </li>


    <li class="has-sub{{ (Request::is('section/index') ? ' active' : '') }}">
        <a href="{{ route('getSections') }}">
            <i class="fa fa-random"></i>
            <span>Asignar Resoluciones</span>
        </a>
    </li>
    {{--<li class="has-sub{{ (Request::is('reports*') ? ' active' : '') }}">--}}
        {{--<a href="{{ route('reports') }}">--}}
            {{--<i class="fa-bar-chart-o"></i>--}}
            {{--<span>Reportes</span>--}}
        {{--</a>--}}
    {{--</li>--}}
    <li class="has-sub {{ (Request::is('reports*') ? 'active' : '') }}">
        <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-bar-chart-o"></i>
            <span>Reportes</span>
        </a>
        <ul class="sub-menu">
            <li class="{{ (Request::is('reports/resolution') ? 'active' : '') }}"><a href="{{ route('getReportsResolutions') }}">Resoluciones</a></li>
            <li class="{{ (Request::is('reports/employment') ? 'active' : '') }}"><a href="{{ route('getReportsEmployments') }}">Laborales</a></li>
            <li class="{{ (Request::is('reports/geographical') ? 'active' : '') }}"><a href="{{ route('getReportsGeographical') }}">Geogr&aacute;ficos</a></li>
            <li class="{{ (Request::is('reports/license') ? 'active' : '') }}"><a href="{{ route('getReportsVacation') }}">Vacaciones y Licencias</a></li>
            <li class="{{ (Request::is('reports/escalafon') ? 'active' : '') }}"><a href="{{ route('getReportsEscalafon') }}">Escalafonario</a></li>
            <li class="{{ (Request::is('reports/authorities') ? 'active' : '') }}"><a href="{{ route('getReportsAuthorities') }}">Autoridades</a></li>
            <li class="{{ (Request::is('reports/displacements') ? 'active' : '') }}"><a href="{{ route('getReportsDisplacements') }}">Desplazamientos</a></li>
            <li class="{{ (Request::is('reports/constancy') ? 'active' : '') }}"><a href="{{ route('getReportsConstancies') }}">Constancias</a></li>
        </ul>
    </li>
@elseif(Auth::user()->hasRole(['personal']))
    <li class="{{ (Request::is('/') ? 'active' : '') }}">
        <a href="{{url('/')}}">
            <i class="ion-ios-home bg-blue"></i>
            <span>Inicio</span>
        </a>
    </li>
    <li class="has-sub {{ (Request::is('academic/*') ? 'active' : '') }}">
        <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="ion-ios-person"></i>
            <span>Formacion Académica</span>
        </a>
        <ul class="sub-menu">
                    <li class="{{ (Request::is('*/primary_education') ? 'active' : '') }}"><a href="{{url('academic/primary_education')}}">Educación Primaria</a></li>
            <li class="{{ (Request::is('*/secondary_education') ? 'active' : '') }}"><a href="{{url('academic/secondary_education')}}">Educación Secundaria</a></li>
            <li class="{{ (Request::is('*/university_education') ? 'active' : '') }}"><a href="{{url('academic/university_education')}}">Educación Superior</a></li>
            <li class="{{ (Request::is('*/professional_title') ? 'active' : '') }}"><a href="{{url('academic/professional_title')}}">Título Profesional</a></li>
            {{--<li class="{{ (Request::is('*/tuition_information') ? 'active' : '') }}"><a href="{{url('academic/tuition_information')}}">Colegiatura</a></li>--}}
            <li class="{{ (Request::is('*/master_doctor_degree') ? 'active' : '') }}"><a href="{{url('academic/master_doctor_degree')}}">Maestrías y Doctorados</a></li>
            <li class="{{ (Request::is('*/postgraduate_information') ? 'active' : '') }}"><a href="{{url('academic/postgraduate_information')}}">Diplomados - Especializaciones</a></li>
            <li class="{{ (Request::is('*/other_studies') ? 'active' : '') }}"><a href="{{url('academic/other_studies')}}">Otros Estudios</a></li>
        </ul>
    </li>
@endif