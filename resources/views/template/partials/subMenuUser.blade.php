<h1 class="page-header">
    <div class="btn-group m-r-5 m-b-5">
        <a href="javascript:;" data-toggle="dropdown" class="btn btn-ctm dropdown-toggle"><i class="fa fa-gear"></i> Gestionar a {{ Session::get('userName') }} <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('personalIdentificationIndex', Session::get('userId')) }}">Información personal y familiar</a></li>
            <li><a href="{{ route('allStudies', Session::get('userId')) }}">Formación académica y capacitación</a></li>
            <li><a href="{{ route('entriesIndex', Session::get('userId')) }}">Ingreso o Reingreso</a></li>
            <li><a href="{{ route('careerIndex', Session::get('userId')) }}">Trayectoria Laboral</a></li>
            <li><a href="{{ route('getAssignments', Session::get('userId')) }}">Asignaciones e incentivos temporales, retenciones judiciales y pagos indebidos</a></li>
            <li><a href="{{ route('renuncias', Session::get('userId')) }}">Renuncia y Liquidación</a></li>
            <li><a href="{{ route('displacement', Session::get('userId')) }}">Desplazamiento de personal</a></li>
            <li><a href="{{ route('retirementIndex',Session::get('userId')) }}">Retiro y régimen pensionario</a></li>
            <li><a href="{{ route('permitIndex',Session::get('userId')) }}">Premios y estímulos</a></li>
            {{--<li><a href="{{ route('sanctionIndex',$user->id) }}">Sanciones</a></li>--}}
            <li><a href="{{ route('licenseIndex', [ 'id' => Session::get('userId')] ) }}">Licencias y Vacaciones</a></li>
            <li><a href="{{ route('evaluacion', Session::get('userId')) }}">Documentos de Evaluaciones</a></li>
            <li><a href="{{ route('produccionintelectual', Session::get('userId')) }}">Documentos de Producción Intelectual</a></li>
            <li><a href="{{ route('otherIndex', Session::get('userId')) }}">Otros</a></li>
        </ul>
    </div>
</h1>