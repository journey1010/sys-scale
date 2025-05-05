<h1 class="page-header">
    <div class="btn-group m-r-5 m-b-5">
        <a href="javascript:;" data-toggle="dropdown" class="btn btn-ctm dropdown-toggle"><i class="fa fa-gear"></i> Gestionar a {{ Session::get('userName') }} <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('personalIdentificationIndex', Session::get('userId')) }}">Información personal y familiar</a></li>
            <li><a href="{{ route('entriesIndex', Session::get('userId')) }}">Incorporación</a></li>
            <li><a href="{{ route('allStudies', Session::get('userId')) }}">Formación académica y capacitación</a></li>
            <li><a href="{{ route('careerIndex', Session::get('userId')) }}">Experiencia laboral</a></li>
            <li><a href="{{ route('licenseIndex', [ 'id' => Session::get('userId')] ) }}">Movimientos del Personal</a></li>
            <li><a href="{{ route('displacement', Session::get('userId')) }}">Evaluación de desempeño, progresión en la carrera y desplazamiento</a></li>
            <li><a href="{{ route('getAssignments', Session::get('userId')) }}">Compensaciones</a></li>
            <li><a href="{{ route('permitIndex',Session::get('userId')) }}">Reconocimientos y sanciones disciplinarias</a></li>
            <li><a href="{{ route('evaluacion', Session::get('userId')) }}">Relaciones laborales individuales y colectivas</a></li>
            <li><a href="{{ route('produccionintelectual', Session::get('userId')) }}">Seguridad y Salud en el Trabajo (SST) y bienestar social</a></li>
            {{-- <li><a href="{{ route('retirementIndex',Session::get('userId')) }}">Retiro y régimen pensionario</a></li> --}}
            {{--<li><a href="{{ route('sanctionIndex',$user->id) }}">Sanciones</a></li>--}}
            <li><a href="{{ route('renuncias', Session::get('userId')) }}">Desvinculación</a></li>
            <li><a href="{{ route('otherIndex', Session::get('userId')) }}">Otros</a></li>
        </ul>
    </div>
</h1>