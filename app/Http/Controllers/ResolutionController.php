<?php

namespace App\Http\Controllers;

use App\Models\Carrerpath;
use App\Models\Displacement;
use App\Models\Entry;
use App\Models\PersonalIdentification\PersonalIdentification;
use App\Models\EvaluationDocument;
use App\Models\Permit;
use App\Models\Production;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Resolution;
use App\Models\Section;
use App\Models\ResolutionType;
use App\Models\User;
use Alert;
use Mockery\Exception;
use App\ViewModels\Entry\IndexViewModel;
use Session;
use App\Models\SectionAnnex;

class ResolutionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getResolutions($id_resolution_type, $id_user, $id_section)
    {
        try {
            $user = null;
            if ($id_user == null) {
                $user = Auth::user();
                $id_user = $user->id;
            } else {
                $user = User::select('id', 'name', 'first_surname', 'second_surname')->findOrFail($id_user);
            }

            $arredirect = [
                'url1' => $id_resolution_type,
                'url2' => $id_user,
                'url3' => $id_section
            ];
            #Buscar las resoluciones por nombre y de ahi obtener el id de su tipo
            $resolution_type = ResolutionType::find($id_resolution_type);

            $section = Section::find($id_section);
            switch ($section->alias) {
                case('ingresosReingresos'):
                    $section->alias = 'entriesIndex';
                    break;
                case('trayectoriaLaboral'):
                    $section->alias = 'careerIndex';
                    break;
                case('asignacionesIncentivos'):
                    $section->alias = 'getAssignments';
                    break;
                case('retiroRegimen'):
                    $section->alias = 'retirementIndex';
                    break;
                case('permisosEstimulos'):
                    $section->alias = 'permitIndex';
                    break;
                case('sanciones'):
                    $section->alias = 'sanctionIndex';
                    break;
                case('licenciasVacaciones'):
                    $section->alias = 'licenseIndex';
                    break;
                case('otros'):
                    $section->alias = 'otherIndex';
                    break;
                case('renuncias'):
                    $section->alias = 'renuncias';
                    break;
                case('evaluacion'):
                    $section->alias = 'evaluacion';
                    break;
                case('produccionintelectual'):
                    $section->alias = 'produccionintelectual';
                    break;
                case('desplacement'):
                    $section->alias = 'displacement';
                    break;

            }


            $resolutions = Resolution::where('id_user', $id_user)->where('id_resolution_type', $id_resolution_type)->where('id_section', $id_section)->get();

            //Tabla de resoluciones para bindear select de vista a codigos de BD
            $resolution_type_get = $resolution_type->get();
            $resolution_type_table = array();

            foreach ($resolution_type_get as $resolution_type_get_item)
                $resolution_type_table[$resolution_type_get_item->id] = $resolution_type_get_item->name;

            return view('resolution.index', compact('user', 'resolution_type', 'resolution_type_table', 'resolutions', 'section', 'id_section','arredirect'));

        } catch (Exception $e) {
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }

    }



    private function getByName($resolution_name, $id_user)
    {
        $resolution_type = ResolutionType::where('name', $resolution_name)->first();
        $resolutions = Resolution::where('id_user', $id_user)->where('id_resolution_type', $resolution_type->id)->get();

        return $resolutions;
    }

    public function detail($id_resolution, Request $request)
    {
        try {
            $arredirect = [
                'url1' => $request->o1,
                'url2' => $request->o2,
                'url3' => $request->o3
            ];
            $resolution = Resolution::findOrFail($id_resolution);
            $resolution_type = ResolutionType::findOrFail($resolution->id_resolution_type);

            return view('resolution.detail', compact('resolution', 'resolution_type','arredirect'));

        } catch (Exception $e) {
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }
    }

    public function edit($id_resolution, Request $request)
    {
        try {
            $arredirect = [
                'url1' => $request->o1,
                'url2' => $request->o2,
                'url3' => $request->o3
            ];
            $model = Resolution::findOrFail($id_resolution);

            $resolution_type = ResolutionType::findOrFail($model->id_resolution_type);
            $resolution_type_get = $resolution_type->select('id', 'name')->get();
            $resolution_type_table = array();

            foreach ($resolution_type_get as $resolution_type_get_item)
                $resolution_type_table[$resolution_type_get_item->id] = $resolution_type_get_item->name;

//            dd($model);
            return view('resolution.edit', compact('model', 'resolution_type', 'resolution_type_table','arredirect'));

        } catch (Exception $e) {
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }
    }

    public function create(Request $request)
    {

        try{

//        $this->validate($request,[
//            'id_user' => 'required|integer|exists:users,id',
//            'alias' => 'required',
//            'id_resolution_type' => 'required|integer|exists:resolution_type,id',
//            'resolution_number' => 'required|max:20',
//            'id_section' => 'required',
//            'issue_date' => 'required|date',
//            'issuing_organ' => 'required|max:100',
//            'start_date' => 'required|date',
//            'end_date' => 'required|date',
//            'description' => 'required|max:500',
//            'work_position' => 'sometimes|required|max:50',
//            'workplace' => 'sometimes|required|max:50',
//            'constancy_url' => 'required|mimes:pdf|max:32768'
//        ]);
            $alias = $request->input('alias');

            $id_user = $request->input('id_user');
            $id_resolution_type = $request->input('id_resolution_type');

            //Guardar constancia
            $filename  = "";
            $file_path = "";

            if($request->hasFile('constancy_url')){
                $file = $request->constancy_url;
                $filename = $file->store('public/resolution');
                $file_path = '/storage/' . explode('/', $filename)[1] . '/' . explode('/', $filename)[2];
            }

            $resolution = Resolution::create([
                'resolution_number' => $request->input('resolution_number'),
                'id_section' => $request->input('id_section'),
                'id_resolution_type' => $id_resolution_type,
                'issue_date' => Carbon::parse($request->input('issue_date')),
                'issuing_organ' => $request->input('issuing_organ'),
                'start_date' => Carbon::parse($request->input('start_date')),
                'id_section' => $request->input('id_section'),
                'end_date' => is_null($request->input('end_date')) ? null : Carbon::parse($request->input('end_date')),
                'description' => $request->input('description'),
                'work_position' => $request->input('work_position'),
                'workplace' => $request->input('workplace'),
                'constancy_path' => '/' . $filename,
                'constancy_url' => $file_path,
                'state_validation' => 1,
                'id_user' => $id_user,

            ]);

            $resolution_id = $resolution->id;


            if ($alias == "careerIndex" || $alias == "renuncias") {

                $objCarrerIndex = new Carrerpath();
                $objCarrerIndex->tipo = $request->input('tipo');
                $objCarrerIndex->denominacion_cargo = $request->input('denominacion_cargo');
                $objCarrerIndex->motivo_cese = $request->input('motivo_cese');
                $objCarrerIndex->nivel = $request->input('nivel');
                $objCarrerIndex->cargo = $request->input('cargo');
                $objCarrerIndex->dependencia = $request->input('dependencia');
                $objCarrerIndex->fecha_inicio = Carbon::parse($request->input('fecha_inicio'));

                if (!$request->input('fecha_cese') . isEmptyOrNullString()) {
                    $objCarrerIndex->fecha_cese = Carbon::parse($request->input('fecha_cese'));

                    $finfecha = Carbon::parse($request->input('fecha_cese'));
                    $inifecha = Carbon::parse($request->input('fecha_inicio'));

                    $objCarrerIndex->dias_laborados = $finfecha->diffInDays($inifecha);

                }

                $objCarrerIndex->observaciones = $request->input('observaciones');
                $objCarrerIndex->id_resolution = $resolution_id;
                $objCarrerIndex->created_at = Carbon::now('America/Lima');
                $objCarrerIndex->updated_at = Carbon::now('America/Lima');

                $objCarrerIndex->save();

            } elseif ($alias == "evaluacion") {

                $objEvaluation = new EvaluationDocument();

                $objEvaluation->tipo = $request->input('tipo');
                $objEvaluation->fecha_emision = Carbon::parse($request->input('fecha_emision'));
                $objEvaluation->puntaje = $request->input('puntaje');
                $objEvaluation->calificacion = $request->input('calificacion');
                $objEvaluation->observaciones = $request->input('observaciones');

                if($request->hasFile('informe_file')){
                    $file = $request->informe_file;
                    $filename = $file->store('public/evaluation');
                    $file_path = '/storage/' . explode('/', $filename)[1] . '/' . explode('/', $filename)[2];
                }

                $objEvaluation->informepath = '/' . $filename;
                $objEvaluation->informeurl = $file_path;

                $objEvaluation->id_resolution = $resolution_id;
                $objEvaluation->created_at = Carbon::now('America/Lima');
                $objEvaluation->updated_at = Carbon::now('America/Lima');

                $objEvaluation->save();

            } elseif ($alias == "entriesIndex") {

                $objEntry = new Entry();

                $objEntry->tipo = $request->tipo;
                $objEntry->contract_time_years = $request->contract_time_years;
                $objEntry->contract_time_months = $request->contract_time_months;
                $objEntry->contract_time_days = $request->contract_time_days;
                $objEntry->dependency = $request->dependency;
                $objEntry->category = $request->category;
                $objEntry->charge = $request->charge;
                $objEntry->id_user = $request->id_user;
                $objEntry->id_resolution = $resolution_id;

                $objEntry->save();
            } elseif ($alias == "displacement") {
                $displacement = [
                    'tipo' => $request->tipo,
                    'charge' => $request->charge,
                    'dependencia_origen' => $request->dependencia_origen,
                    'dependencia_destino' => $request->dependencia_destino,
                    'displacement_time_years' => $request->displacement_time_years,
                    'displacement_time_months' => $request->displacement_time_months,
                    'displacement_time_days' => $request->displacement_time_days,
                    'id_user' => $request->id_user,
                    'id_resolution' => $resolution_id,
                ];

                Displacement::create($displacement);
            } elseif ($alias == "permitIndex") {
                $permit = [
                    'tipo' => $request->tipo,
                    'quinquenio' => $request->quinquenio,
                    'fecha_cumplimiento_quinquenio' => Carbon::parse($request->fecha_cumplimiento_quinquenio),
                    'beneficio_otorgado' => $request->beneficio_otorgado,
                    'monto_otorgado' => $request->monto_otorgado,
                    'id_user' => $request->id_user,
                    'id_resolution' => $resolution_id,
                ];

                Permit::create($permit);
            } elseif ($alias == "produccionintelectual") {
                $production = [
                    'tipo' => $request->tipo,
                    'tipo_trabajo' => $request->tipo_trabajo,
                    'titulo_trabajo' => $request->titulo_trabajo,
                    'year' => $request->year,
                    'id_user' => $request->id_user,
                    'id_resolution' => $resolution_id,
                ];

                Production::create($production);
            }


            Alert()->success('Se guardaron los cambios','Completado')->persistent('Aceptar');
            return back();
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function update(Request $request)
    {
//        dd($request->input('end_date'));
        /*$this->validate($request, [
            'id_resolution' => 'required|integer|exists:resolution,id',
            'id_resolution_type' => 'required|integer|exists:resolution_type,id',
            'resolution_number' => 'required|max:20',
            'issue_date' => 'required|date',
            'issuing_organ' => 'required|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'description' => 'required|max:500',
            'work_position' => 'sometimes|required|max:50',
            'workplace' => 'sometimes|required|max:50',
            'constancy_path' => 'required',
            'constancy_url' => 'mimes:pdf|max:32768'
        ]);*/

        $id_resolution = $request->input('id_resolution');
        $id_resolution_type = $request->input('id_resolution_type');

        $resolution = Resolution::findOrFail($id_resolution);
        $resolution->resolution_number = $request->input('resolution_number');
        $resolution->id_resolution_type = $id_resolution_type;
        $resolution->issue_date = Carbon::parse($request->input('issue_date'));
        $resolution->issuing_organ = $request->input('issuing_organ');
        $resolution->start_date = Carbon::parse($request->input('start_date'));
        $resolution->end_date = is_null($request->input('end_date')) ? null : Carbon::parse($request->input('end_date'));
        $resolution->description = $request->input('description');
        $resolution->work_position = $request->input('work_position');
        $resolution->workplace = $request->input('workplace');

        //Guardar constancia, no eliminarla si existe
        if (!is_null($request->constancy_url)) {
            $file = $request->constancy_url;
            $filename = $file->store('public/resolution');
            $resolution->constancy_path = '/' . $filename;
            $resolution->constancy_url = '/storage/' . explode('/', $filename)[1] . '/' . explode('/', $filename)[2];
        }

        //No se actualiza el id del usuario al que pertenece la resolución
        $resolution->save();

        Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
        return back();
    }

    public function delete($id_resolution)
    {

        $resolution = Resolution::find($id_resolution);
        $resolution->delete();

        Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
        return back();
    }

    public function resignationIndex($id)
    {
        try {

            //DECLARO MODELO PARA LA VISTA
            $model = new IndexViewModel();

            if ($id == null) return view('permit.index', compact('model'));

            //GUARDAR EN SESION USUARIO QUE SE ESTA GESTIONANDO
            $objUser = User::select('id', 'name')->find($id);

            Session::put('userName', $objUser->name);
            Session::put('userId', $objUser->id);

            //OBTENER LOS TIPOS DE RESOLUCIONES ASOCIADOS A LA SECCIÓN
            $section_Result = Section::where('alias', '=', 'renuncias')->select('name', 'id')->get();
            $section = $section_Result->first();

            $model->resolutions = ResolutionType::join('section_resolution_type', 'resolution_type.id', 'section_resolution_type.id_resolution_type')
                ->join('section', 'section.id', 'section_resolution_type.id_section')
                ->where('section.id', '=', $section->id)
                ->select('resolution_type.id', 'resolution_type.description', 'section.id as section_id')
                ->get();

            $model->user_id = $id;
            $model->section_id = $section->id;

            $section_annexes = SectionAnnex::where([['id_section', '=', $section->id],['id_user','=',$id]])->get();

            return view('resolution.resignation', compact('model', 'section_annexes'));

        } catch (\Exception $e) {
            return redirect()->action('Profile\StaffManagementController@index');
        }
    }

    public function evaluationIndex($id)
    {

        try{

        //DECLARO MODELO PARA LA VISTA
        $model = new IndexViewModel();

        if ($id == null) return view('permit.index', compact('model'));

        //GUARDAR EN SESION USUARIO QUE SE ESTA GESTIONANDO
        $user = User::select('id', 'name')->find($id);

        Session::put('userName', $user->name);
        Session::put('userId', $user->id);

        //OBTENER LOS TIPOS DE RESOLUCIONES ASOCIADOS A LA SECCIÓN
        $section_Result = Section::where('alias', '=', 'evaluacion')->select('name', 'id')->get();
        $section = $section_Result->first();

        $model->resolutions = ResolutionType::join('section_resolution_type', 'resolution_type.id', 'section_resolution_type.id_resolution_type')
            ->join('section', 'section.id', 'section_resolution_type.id_section')
            ->where('section.id', '=', $section->id)
            ->select('resolution_type.id', 'resolution_type.description', 'section.id as section_id')
            ->get();

        $model->user_id = $id;
        $model->section_id = $section->id;

        $section_annexes = SectionAnnex::where([['id_section', '=', $section->id],['id_user','=',$id]])->get();

        return view('resolution.evaluation', compact('model', 'section_annexes', 'user','section'));

        } catch(\Exception $e){
            return redirect()->action('Profile\StaffManagementController@index');
        }
    }

    public function productionIndex($id)
    {
        try {

            //DECLARO MODELO PARA LA VISTA
            $model = new IndexViewModel();

            if ($id == null) return view('permit.index', compact('model'));

            //GUARDAR EN SESION USUARIO QUE SE ESTA GESTIONANDO
            $objUser = User::select('id', 'name')->find($id);

            Session::put('userName', $objUser->name);
            Session::put('userId', $objUser->id);

            //OBTENER LOS TIPOS DE RESOLUCIONES ASOCIADOS A LA SECCIÓN
            $section_Result = Section::where('alias', '=', 'produccionintelectual')->select('name', 'id')->get();
            $section = $section_Result->first();

            $model->resolutions = ResolutionType::join('section_resolution_type', 'resolution_type.id', 'section_resolution_type.id_resolution_type')
                ->join('section', 'section.id', 'section_resolution_type.id_section')
                ->where('section.id', '=', $section->id)
                ->select('resolution_type.id', 'resolution_type.description', 'section.id as section_id')
                ->get();

            $model->user_id = $id;
            $model->section_id = $section->id;


            $section_annexes = SectionAnnex::where([['id_section', '=', $section->id],['id_user','=',$id]])->get();


            return view('resolution.production', compact('model', 'section_annexes'));

        } catch (\Exception $e) {
            return redirect()->action('Profile\StaffManagementController@index');
        }
    }

    public function displacementIndex($id)
    {
        try {

            //DECLARO MODELO PARA LA VISTA
            $model = new IndexViewModel();

            if ($id == null) return view('permit.index', compact('model'));

            //GUARDAR EN SESION USUARIO QUE SE ESTA GESTIONANDO
            $objUser = User::select('id', 'name')->find($id);

            Session::put('userName', $objUser->name);
            Session::put('userId', $objUser->id);

            //OBTENER LOS TIPOS DE RESOLUCIONES ASOCIADOS A LA SECCIÓN
            $section_Result = Section::where('alias', '=', 'desplacement')->select('name', 'id')->get();
            $section = $section_Result->first();

            $model->resolutions = ResolutionType::join('section_resolution_type', 'resolution_type.id', 'section_resolution_type.id_resolution_type')
                ->join('section', 'section.id', 'section_resolution_type.id_section')
                ->where('section.id', '=', $section->id)
                ->select('resolution_type.id', 'resolution_type.description', 'section.id as section_id')
                ->get();

            $model->user_id = $id;
            $model->section_id = $section->id;

            $section_annexes = SectionAnnex::where([['id_section', '=', $section->id],['id_user','=',$id]])->get();


            return view('resolution.displacement', compact('model', 'section_annexes'));

        } catch (\Exception $e) {
            return redirect()->action('Profile\StaffManagementController@index');
        }
    }


    //Bindear tipos

    public function getDesignationResolutions($id_user)
    {
        $resolutions = $this->getByName($id_user, 'Designación');
        return view('careerPath.resolution', compact('resolution_type', 'resolutions'));
    }

    public function getHighlightResolutions($id_user)
    {
        $resolutions = $this->getByName($id_user, 'Destaque');
        return view('careerPath.resolution', compact('resolution_type', 'resolutions'));
    }

    public function getRotationResolutions($id_user)
    {
        $resolutions = $this->getByName($id_user, 'Rotación');
        return view('careerPath.resolution', compact('resolution_type', 'resolutions'));
    }

    public function getChargeResolutions($id_user)
    {
        $resolutions = $this->getByName($id_user, 'Encargo');
        return view('careerPath.resolution', compact('resolution_type', 'resolutions'));
    }

    public function getReassignmentResolutions($id_user)
    {
        $resolutions = $this->getByName($id_user, 'Reasignación');
        return view('careerPath.resolution', compact('resolution_type', 'resolutions'));
    }

    public function getBarterResolutions($id_user)
    {
        $resolutions = $this->getByName($id_user, 'Permuta');
        return view('careerPath.resolution', compact('resolution_type', 'resolutions'));
    }

    public function getPromotionResolutions($id_user)
    {
        $resolutions = $this->getByName($id_user, 'Ascenso');
        return view('careerPath.resolution', compact('resolution_type', 'resolutions'));
    }

    public function getTransferResolutions($id_user)
    {
        $resolutions = $this->getByName($id_user, 'Transferencia');
        return view('careerPath.resolution', compact('resolution_type', 'resolutions'));
    }

    public function getStaffRelocationResolutions($id_user)
    {
        $resolutions = $this->getByName($id_user, 'ReubicaciónPersonal');
        return view('careerPath.resolution', compact('resolution_type', 'resolutions'));
    }

    public function getAuxiliaryIncorporationResolutions($id_user)
    {
        $resolutions = $this->getByName($id_user, 'IncorporaciónAuxiliares');
        return view('careerPath.resolution', compact('resolution_type', 'resolutions'));
    }

    public function getAppointedTeacherIncorporationResolutions($id_user)
    {
        $resolutions = $this->getByName($id_user, 'IncorporaciónProfesoresNombrados');
        return view('careerPath.resolution', compact('resolution_type', 'resolutions'));
    }

    public function getTeacherIncorporationResolutions($id_user)
    {
        $resolutions = $this->getByName($id_user, 'IncorporaciónProfesores');
        return view('careerPath.resolution', compact('resolution_type', 'resolutions'));
    }

    public function getPaymentContractRecognitionResolutions($id_user)
    {
        $resolutions = $this->getByName($id_user, 'ReconocimientoPagoContrato');
        return view('careerPath.resolution', compact('resolution_type', 'resolutions'));
    }

    public function getAppointmentResolutions($id_user)
    {
        $resolutions = $this->getByName($id_user, 'Nombramiento');
        return view('careerPath.resolution', compact('resolution_type', 'resolutions'));
    }


}

//TODO: Cambiar funciones para reflejar comportamiento de nuevas vistas

