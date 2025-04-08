<?php

namespace App\Http\Controllers\Profile;

use App\Models\Licences;
use App\Models\LicensingAuthorization;
use App\Models\Permit;
use App\Models\PermitAuthorization;
use App\Models\Resolution;
use App\Models\Special_License;
use App\Models\SuspensionVacation;
use App\Models\VacationAuthorization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;
use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\ResolutionType;
use App\Models\SectionAnnex;
use App\Models\Section;
use App\ViewModels\Entry\EditViewModel;
use App\ViewModels\Entry\IndexViewModel;


class LicenseController extends Controller
{
    public function __construct()
    {
    }
    public function index($id = null)
    {
        try{

            //DECLARO MODELO PARA LA VISTA
            $model = new IndexViewModel();

            if($id == null) return view('license.index', compact('model'));

            //GUARDAR EN SESION USUARIO QUE SE ESTA GESTIONANDO
            $objUser = User::select('id', 'name')->find($id);

            Session::put('userName', $objUser->name );
            Session::put('userId', $objUser->id );

            //OBTENER LOS TIPOS DE RESOLUCIONES ASOCIADOS A LA SECCIÓN
            $section_Result = Section::where('alias','=','licenciasVacaciones')->select('name','id')->get();
            $section = $section_Result->first();

            $model->resolutions = ResolutionType::join('section_resolution_type','resolution_type.id','section_resolution_type.id_resolution_type')
                ->join('section','section.id','section_resolution_type.id_section')
                ->where('section.id', '=', $section->id)
                ->select('resolution_type.id','resolution_type.description', 'section.id as section_id')
                ->get();

            $model->user_id = $id;
            $model->section_id = $section->id;

            $section_annexes = SectionAnnex::where('id_section' , '=' , $section->id)->get();

            $licences_section = Licences::join('licence_type', 'licence_type.id', 'licences.id_licence_type')
                ->where('licences.id_user', '=', $model->user_id)
                ->select('licences.date_end', 'licences.date_start', 'licences.doc_date', 'licences.doc_number',
                                 'licences.number_days', 'licences.comment', 'licences.id', 'licence_type.name');

            //Extrayendo datos de Vacation
            $vacation_authorizations = VacationAuthorization::join('resolution','resolution.id','vacation_authorization.id_resolution')
                ->where('resolution.id_user', '=', $model->user_id)
                ->select(
                    'vacation_authorization.date_end',
                    'vacation_authorization.date_start',
                    'vacation_authorization.number_days',
                    'vacation_authorization.comment',
                    'vacation_authorization.id',
                    'vacation_authorization.anio',
                    'resolution.resolution_number',
                    'resolution.issue_date',
                    'resolution.memorando_type',
                    'vacation_authorization.license_resolution_type',
                    'vacation_authorization.suspension_document_type'
                )->get();

            //Extrayendo datos de Suspension_Vacation
            $suspension_vacation_authorizations = SuspensionVacation::join('resolution','resolution.id','suspension_vacation_authorization.id_resolution')
                ->where('resolution.id_user', '=', $model->user_id)
                ->select(
                    'suspension_vacation_authorization.date_end',
                    'suspension_vacation_authorization.date_start',
                    'suspension_vacation_authorization.number_days',
                    'suspension_vacation_authorization.comment',
                    'suspension_vacation_authorization.id',
                    'suspension_vacation_authorization.anio',
                    'resolution.resolution_number',
                    'resolution.issue_date',
                    'resolution.memorando_type',
                    'suspension_vacation_authorization.license_resolution_type',
                    'suspension_vacation_authorization.suspension_document_type'
                )->get();

            //Año actual
            $anio_actual = Carbon::now()->year;
            $anio_pasado = $anio_actual - 1;
            //Extrayendo Acumulative 1
            $vacations = VacationAuthorization::where('anio','=',$anio_actual)
                ->orWhere('anio','=',$anio_pasado)
                ->get();
            $sum_vacations = $vacations->sum('number_days');
            $acumulative = (60 - $sum_vacations) < 0 ? 0 : (60 - $sum_vacations);

            //Extrayendo Acumulative 2
            $suspension_vacations = SuspensionVacation::where('anio','=',$anio_actual)
                ->orWhere('anio','=',$anio_pasado)
                ->get();
            $sum_suspension_vacations = $suspension_vacations->sum('number_days');
            $acumulative2 = (60 - $sum_suspension_vacations) < 0 ? 0 : (60 - $sum_suspension_vacations);

            //---------FIN----------

            //Extrayendo Suma actual de vacations 1
            $sum_vacations_actual = VacationAuthorization::where('anio','=',$anio_actual)->get()->sum('number_days');
            $actual = (30 - $sum_vacations_actual) < 0 ? 0 : (30 - $sum_vacations_actual);
            //Extrayendo Suma actual de vacations 2
            $sum_suspension_vacations_actual = SuspensionVacation::where('anio','=',$anio_actual)->get()->sum('number_days');
            $actual2 = (30 - $sum_suspension_vacations_actual) < 0 ? 0 : (30 - $sum_suspension_vacations_actual);

            $licence_authorizations = LicensingAuthorization::join('resolution','resolution.id','licensing_authorization.id_resolution')
                ->where('resolution.id_user', '=', $model->user_id)
                ->select(
                    'licensing_authorization.date_end',
                    'licensing_authorization.date_start',
                    'licensing_authorization.number_days',
                    'licensing_authorization.comment',
                    'licensing_authorization.id',
                    'resolution.resolution_number',
                    'resolution.issue_date',
                    'resolution.memorando_type',
                    'licensing_authorization.with_remunerations',
                    'licensing_authorization.license_resolution_type'
                )->get();

            $special_licence_authorizations = Special_License::join('resolution','resolution.id','special_license_authorization.id_resolution')
                ->where('resolution.id_user', '=', $model->user_id)
                ->select(
                    'special_license_authorization.date_end',
                    'special_license_authorization.date_start',
                    'special_license_authorization.number_days',
                    'special_license_authorization.comment',
                    'special_license_authorization.id',
                    'resolution.resolution_number',
                    'resolution.issue_date',
                    'resolution.memorando_type',
                    'special_license_authorization.with_remunerations',
                    'special_license_authorization.license_resolution_type'
                )->get();

            $permit_authorizations = PermitAuthorization::join('resolution','resolution.id','permit_authorization.id_resolution')
                ->where('resolution.id_user', '=', $model->user_id)
                ->select(
                    'permit_authorization.date_end',
                    'permit_authorization.date_start',
                    'permit_authorization.number_days',
                    'permit_authorization.comment',
                    'permit_authorization.id',
                    'resolution.resolution_number',
                    'resolution.issue_date',
                    'resolution.memorando_type',
                    'permit_authorization.with_remunerations',
                    'permit_authorization.permit_reason'
                )->get();

            $resolution_types = ResolutionType::where('flag_vacations','=',true)->pluck('name','id');

            //dd($vacation_authorizations);
            return view('license.index', compact('model', 'section_annexes', 'licences_section', 'vacation_authorizations','licence_authorizations','special_licence_authorizations','suspension_vacation_authorizations','permit_authorizations', 'resolution_types','acumulative','acumulative2','actual','actual2'));

        } catch(\Exception $e){
            return redirect('staff_management');
        }
    }

    public function postVacation(Request $request)
    {
        $this->validate($request,[
            'id_user' => 'required|integer|exists:users,id',
            /*'id_resolution_type' => 'required|integer|exists:resolution_type,id',*/
            'resolution_number' => 'required',
            'id_section' => 'required',
            'issue_date' => 'required',
            'issuing_organ' => 'required|max:100',
            'start_date' => 'required',
            'description' => 'required|max:500',
            'work_position' => 'sometimes|required|max:50',
            'workplace' => 'sometimes|required|max:50',
/*            'constancy_url' => 'required|mimes:pdf|max:32768',*/
            'comment' => 'required',
            'license_type' => 'required',
            'suspension_type' => 'required'
        ]);

        $id_user = $request->input('id_user');
        $id_resolution_type = $request->input('resolution_type');
        $memorando_type = $request->input('memorando_type');

        $resolution = new Resolution();
        $resolution->resolution_number = $request->input('resolution_number');
        $resolution->id_resolution_type = $id_resolution_type;
        $resolution->memorando_type = $memorando_type;

        $resolution->issue_date = Carbon::parse($request->input('issue_date'));
        $resolution->issuing_organ = $request->input('issuing_organ');
        $resolution->start_date = Carbon::parse($request->input('start_date'));
        $resolution->id_section = $request->input('id_section');
        $resolution->end_date = is_null ($request->end_date) ? $request->end_date :Carbon::parse($request->input('end_date'));
        $resolution->description = $request->input('description');
        $resolution->work_position = $request->input('work_position');
        $resolution->workplace = $request->input('workplace');


        //Guardar constancia
        $filename  = "";
        $file_path = "";

        if($request->hasFile('constancy_url')){
            $file = $request->constancy_url;
            $filename = $file->store('public/resolution');
            $file_path = '/storage/' . explode('/', $filename)[1] . '/' . explode('/', $filename)[2];
            $resolution->constancy_url = $file_path;
        }

        $resolution->state_validation = 1;
        $resolution->id_user = $id_user;
        $resolution->save();

        $vacation_authorization = new VacationAuthorization();
        $vacation_authorization->id_resolution = $resolution->id;
        $vacation_authorization->date_start = Carbon::parse($resolution->start_date);
        $vacation_authorization->date_end = is_null($resolution->end_date) ? null : Carbon::parse($resolution->end_date);

        if(!is_null($resolution->end_date))
            $datediff = (strtotime($resolution->end_date) - strtotime($resolution->start_date)) / (60 * 60 * 24);
        else
            $datediff = 0;
        $vacation_authorization->number_days = $datediff + 1;
        $vacation_authorization->anio = Carbon::parse($resolution->start_date)->year;
        $vacation_authorization->comment = $request->input('comment');
        $vacation_authorization->license_resolution_type = $request->input('license_type');
        $vacation_authorization->suspension_document_type = $request->input('suspension_type');
        $vacation_authorization->memorando_type = $request->input('memorando_type');

        $vacation_authorization->save();

        Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
        return back();
    }
    public function detailVacation($id)
    {
        try {

            $license = VacationAuthorization::find($id);
            $resolution = Resolution::findOrFail($license->id_resolution);
            $resolution_type = ResolutionType::findOrFail($resolution->id_resolution_type);

            return view('license.vacation.detail', compact('license','resolution', 'resolution_type'));

        } catch (Exception $e) {
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }
    }
    public function editVacation($id)
    {
        try {
            $license = VacationAuthorization::find($id);
            $resolution = Resolution::findOrFail($license->id_resolution);
            $resolution_types = ResolutionType::where('flag_vacations','=',true)->pluck('name','id');

            return view('license.vacation.edit', compact('license','resolution', 'resolution_types'));
        } catch (Exception $e) {
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }
    }
    public function editVacationPost(Request $request)
    {
        $this->validate($request,[
//            'id_user' => 'required|integer|exists:users,id',
            'id_resolution_type' => 'required|integer|exists:resolution_type,id',
            'resolution_number' => 'required',
            'issue_date' => 'required',
            'issuing_organ' => 'required|max:100',
            'start_date' => 'required',
            'description' => 'required|max:500',
            'constancy_url' => 'mimes:pdf|max:32768',
            'comment' => 'required',
            'license_type' => 'required',
            'suspension_type' => 'required'
        ]);

        $id_resolution = $request->input('id_resolution');
        $id_license = $request->input('id_license');

        $resolution = Resolution::find($id_resolution);
        $resolution->resolution_number = $request->input('resolution_number');
        $resolution->id_resolution_type = $request->input('id_resolution_type');
        $resolution->memorando_type = $request->input('memorando_type');

        $resolution->issue_date = Carbon::parse($request->input('issue_date'));
        $resolution->issuing_organ = $request->input('issuing_organ');
        $resolution->start_date = Carbon::parse($request->input('start_date'));
        $resolution->end_date = is_null($request->end_date) ? $request->end_date : Carbon::parse($request->input('end_date'));
        $resolution->description = $request->input('description');

        //Guardar constancia
        if (!empty($request->constancy_url)) {
            $file = $request->constancy_url;
            $filename = $file->store('public/resolution');
            $resolution->constancy_path = '/' . $filename;
            $resolution->constancy_url = '/storage/' . explode('/', $filename)[1] . '/' . explode('/', $filename)[2];
        }
        $resolution->save();


        $vacation_authorization = VacationAuthorization::findOrFail($id_license);
        $vacation_authorization->date_start = Carbon::parse($request->start_date);
        $vacation_authorization->date_end = is_null($request->end_date) ? $request->end_date :Carbon::parse($request->end_date);
        if(!is_null($resolution->end_date))
            $datediff = (strtotime($request->end_date) - strtotime($request->start_date)) / (60 * 60 * 24);
        else
            $datediff = 0;
        $vacation_authorization->number_days = $datediff + 1;
        $vacation_authorization->anio = Carbon::parse($request->input('start_date'))->year;
        $vacation_authorization->comment = $request->input('comment');
        $vacation_authorization->license_resolution_type = $request->input('license_type');
        $vacation_authorization->suspension_document_type = $request->input('suspension_type');

        $vacation_authorization->save();

        Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
        return back();
    }
    public function deleteVacation(Request $request) {
        try{
            $result = VacationAuthorization::findOrFail($request->input('id'));
            $resolution = Resolution::findOrFail($result->id_resolution);
            Storage::delete($resolution->constancy_path);
            $result->delete();
            $resolution->delete();

            Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
        } catch(\Exception $e){
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
        }
        return redirect('license/index/' . $request->input('user'));
    }

    public function postLicense(Request $request)
    {
        $this->validate($request,[
            'id_user' => 'required|integer|exists:users,id',
            /*'id_resolution_type' => 'required|integer|exists:resolution_type,id',*/
            'resolution_number' => 'required',
            'id_section' => 'required',
            'issue_date' => 'required',
            'issuing_organ' => 'required|max:100',
            'start_date' => 'required',
            'description' => 'required|max:500',
            'work_position' => 'sometimes|required|max:50',
            'workplace' => 'sometimes|required|max:50',
            'comment' => 'required',
            'remunerations' => 'required',
            'license_type' => 'required'
        ]);

        $this->validate($request,['constancy_url' => 'required|mimes:pdf|max:32768',],['El campo constancia es obligatorio.']);

        $id_user = $request->input('id_user');
        $id_resolution_type = $request->input('resolution_type');
        $memorando_type = $request->input('memorando_type');

        $resolution = new Resolution();
        $resolution->resolution_number = $request->input('resolution_number');
        $resolution->id_resolution_type = $id_resolution_type;
        $resolution->memorando_type = $memorando_type;

        $resolution->issue_date = Carbon::parse($request->input('issue_date'));
        $resolution->issuing_organ = $request->input('issuing_organ');
        $resolution->start_date = Carbon::parse($request->input('start_date'));
        $resolution->id_section = $request->input('id_section');
        $resolution->end_date = is_null($request->end_date) ? $request->end_date : Carbon::parse($request->input('end_date'));
        $resolution->description = $request->input('description');
        $resolution->work_position = $request->input('work_position');
        $resolution->workplace = $request->input('workplace');

        //Guardar constancia
        $file = $request->constancy_url;
        $filename = $file->store('public/resolution');
        $resolution->constancy_path = '/' . $filename;
        $resolution->constancy_url = '/storage/' . explode('/', $filename)[1] . '/' . explode('/', $filename)[2];

        $resolution->state_validation = 1;
        $resolution->id_user = $id_user;
        $resolution->save();

        $license_authorization = new LicensingAuthorization();
        $license_authorization->id_resolution = $resolution->id;
        $license_authorization->date_start = Carbon::parse($resolution->start_date);
        $license_authorization->date_end = is_null($resolution->end_date) ? $resolution->end_date : Carbon::parse($resolution->end_date);

        if(!is_null($resolution->end_date))
            $datediff = (strtotime($resolution->end_date) - strtotime($resolution->start_date)) / (60 * 60 * 24);
        else
            $datediff = 0;

        $license_authorization->number_days = $datediff + 1;
        $license_authorization->comment = $request->input('comment');
        $license_authorization->with_remunerations = $request->input('remunerations');
        $license_authorization->license_resolution_type = $request->input('license_type');

        $license_authorization->save();

        Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
        return back();
    }
    public function detailLicense($id)
    {
        try {
            $license = LicensingAuthorization::find($id);
            $resolution = Resolution::findOrFail($license->id_resolution);
            $resolution_type = ResolutionType::findOrFail($resolution->id_resolution_type);

            return view('license.license.detail', compact('license','resolution', 'resolution_type'));

        } catch (Exception $e) {
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }
    }
    public function editLicense($id)
    {
        try {
            $license = LicensingAuthorization::find($id);
            $resolution = Resolution::findOrFail($license->id_resolution);
            $resolution_types = ResolutionType::where('flag_vacations','=',true)->pluck('name','id');

            return view('license.license.edit', compact('license','resolution', 'resolution_types'));
        } catch (Exception $e) {
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }
    }
    public function editLicensePost(Request $request)
    {
        $this->validate($request,[
            'id_resolution_type' => 'required|integer|exists:resolution_type,id',
            'resolution_number' => 'required',
            'issue_date' => 'required',
            'issuing_organ' => 'required|max:100',
            'start_date' => 'required',
            'description' => 'required|max:500',
            'constancy_url' => 'mimes:pdf|max:32768',
            'comment' => 'required',
            'remunerations' => 'required',
            'license_type' => 'required'
        ]);

        $id_resolution = $request->input('id_resolution');
        $id_license = $request->input('id_license');


        $resolution = Resolution::find($id_resolution);
        $resolution->resolution_number = $request->input('resolution_number');
        $resolution->id_resolution_type = $request->input('id_resolution_type');
        $resolution->memorando_type = $request->input('memorando_type');

        $resolution->issue_date = Carbon::parse($request->input('issue_date'));
        $resolution->issuing_organ = $request->input('issuing_organ');
        $resolution->start_date = Carbon::parse($request->input('start_date'));
        $resolution->end_date = is_null($request->end_date) ? $request->end_date : Carbon::parse($request->input('end_date'));
        $resolution->description = $request->input('description');

        //Guardar constancia
        if (!empty($request->constancy_url)) {
            $file = $request->constancy_url;
            $filename = $file->store('public/resolution');
            $resolution->constancy_path = '/' . $filename;
            $resolution->constancy_url = '/storage/' . explode('/', $filename)[1] . '/' . explode('/', $filename)[2];
        }
        $resolution->save();

        $license = LicensingAuthorization::findOrFail($id_license);
        $license->date_start = Carbon::parse($resolution->start_date);
        $license->date_end = is_null($resolution->end_date) ? $resolution->end_date : Carbon::parse($resolution->end_date);
        if(!is_null($resolution->end_date))
            $datediff = (strtotime($resolution->end_date) - strtotime($resolution->start_date)) / (60 * 60 * 24);
        else
            $datediff = 0;
        $license->number_days = $datediff + 1;
        $license->comment = $request->input('comment');
        $license->with_remunerations = $request->input('remunerations');
        $license->license_resolution_type = $request->input('license_type');
        $license->save();

        Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
        return back();
    }
    public function deleteLicense(Request $request) {
        try{
            $result = LicensingAuthorization::find($request->input('id'));
            $resolution = Resolution::findOrFail($result->id_resolution);
            Storage::delete($resolution->constancy_path);
            $result->delete();
            $resolution->delete();
            Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
        } catch(\Exception $e){
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
        }
        return redirect('license/index/' . $request->input('user'));
    }

    public function postPermit(Request $request)
    {
        $this->validate($request,[
            'id_user' => 'required|integer|exists:users,id',
            'resolution_number' => 'required',
            'id_section' => 'required',
            'issue_date' => 'required',
            'issuing_organ' => 'required|max:100',
            'start_date' => 'required',
            'description' => 'required|max:500',
            'work_position' => 'sometimes|required|max:50',
            'workplace' => 'sometimes|required|max:50',
            'comment' => 'required',
            'remunerations' => 'required',
            'permit_type' => 'required'
        ]);

        $this->validate($request,['constancy_url' => 'required|mimes:pdf|max:32768',],['El campo constancia es obligatorio.']);

        $id_user = $request->input('id_user');
        $id_resolution_type = $request->input('resolution_type');
        $memorando_type = $request->input('memorando_type');

        $resolution = new Resolution();
        $resolution->resolution_number = $request->input('resolution_number');
        $resolution->id_resolution_type = $id_resolution_type;
        $resolution->memorando_type = $memorando_type;
        $resolution->issue_date = Carbon::parse($request->input('issue_date'));
        $resolution->issuing_organ = $request->input('issuing_organ');
        $resolution->start_date = Carbon::parse($request->input('start_date'));
        $resolution->id_section = $request->input('id_section');
        $resolution->end_date = is_null($request->end_date) ? $request->end_date : Carbon::parse($request->input('end_date'));
        $resolution->description = $request->input('description');
        $resolution->work_position = $request->input('work_position');
        $resolution->workplace = $request->input('workplace');

        //Guardar constancia
        $file = $request->constancy_url;
        $filename = $file->store('public/resolution');
        $resolution->constancy_path = '/' . $filename;
        $resolution->constancy_url = '/storage/' . explode('/', $filename)[1] . '/' . explode('/', $filename)[2];

        $resolution->state_validation = 1;
        $resolution->id_user = $id_user;
        $resolution->save();

        $permit_authorization = new PermitAuthorization();
        $permit_authorization->id_resolution = $resolution->id;
        $permit_authorization->date_start = Carbon::parse($resolution->start_date);
        $permit_authorization->date_end = is_null($resolution->end_date) ? $resolution->end_date : Carbon::parse($resolution->end_date);

        if(!is_null($resolution->end_date))
            $datediff = (strtotime($resolution->end_date) - strtotime($resolution->start_date)) / (60 * 60 * 24);
        else
            $datediff = 0;

        $permit_authorization->number_days = $datediff + 1;
        $permit_authorization->comment = $request->input('comment');
        $permit_authorization->with_remunerations = $request->input('remunerations');
        $permit_authorization->permit_reason = $request->input('permit_type');

        $permit_authorization->save();

        Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
        return back();
    }
    public function detailPermit($id)
    {
        try {

            $license = PermitAuthorization::find($id);
            $resolution = Resolution::findOrFail($license->id_resolution);
            $resolution_type = ResolutionType::findOrFail($resolution->id_resolution_type);

            return view('license.permit.detail', compact('license','resolution', 'resolution_type'));

        } catch (Exception $e) {
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }
    }
    public function editPermit($id)
    {
        try {
            $license = PermitAuthorization::find($id);
            $resolution = Resolution::findOrFail($license->id_resolution);
            $resolution_types = ResolutionType::where('flag_vacations','=',true)->pluck('name','id');

            return view('license.permit.edit', compact('license','resolution', 'resolution_types'));
        } catch (Exception $e) {
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }
    }
    public function editPermitPost(Request $request)
    {
        $this->validate($request,[
            'id_resolution_type' => 'required|integer|exists:resolution_type,id',
            'resolution_number' => 'required',
            'issue_date' => 'required',
            'issuing_organ' => 'required|max:100',
            'start_date' => 'required',
            'description' => 'required|max:500',
            'constancy_url' => 'mimes:pdf|max:32768',
            'comment' => 'required',
            'remunerations' => 'required',
            'permit_type' => 'required'
        ]);

        $id_resolution = $request->input('id_resolution');
        $id_license = $request->input('id_license');

        $resolution = Resolution::find($id_resolution);
        $resolution->resolution_number = $request->input('resolution_number');
        $resolution->id_resolution_type = $request->input('id_resolution_type');
        $resolution->memorando_type = $request->input('memorando_type');

        $resolution->issue_date = Carbon::parse($request->input('issue_date'));
        $resolution->issuing_organ = $request->input('issuing_organ');
        $resolution->start_date = Carbon::parse($request->input('start_date'));
        $resolution->end_date = is_null($request->end_date) ? $request->end_date : Carbon::parse($request->input('end_date'));
        $resolution->description = $request->input('description');

        //Guardar constancia
        if (!empty($request->constancy_url)) {
            $file = $request->constancy_url;
            $filename = $file->store('public/resolution');
            $resolution->constancy_path = '/' . $filename;
            $resolution->constancy_url = '/storage/' . explode('/', $filename)[1] . '/' . explode('/', $filename)[2];
        }
        $resolution->save();

        $license = PermitAuthorization::findOrFail($id_license);
        $license->date_start = Carbon::parse($resolution->start_date);
        $license->date_end = is_null($resolution->end_date) ? $resolution->end_date : Carbon::parse($resolution->end_date);
        if(!is_null($resolution->end_date))
            $datediff = (strtotime($resolution->end_date) - strtotime($resolution->start_date)) / (60 * 60 * 24);
        else
            $datediff = 0;
        $license->number_days = $datediff + 1;
        $license->comment = $request->input('comment');
        $license->with_remunerations = $request->input('remunerations');
        $license->permit_reason = $request->input('permit_type');
        $license->save();

        Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
        return back();
    }
    public function deletePermit(Request $request) {
        try{
            $result = PermitAuthorization::find($request->input('id'));
            $resolution = Resolution::findOrFail($result->id_resolution);
            Storage::delete($resolution->constancy_path);
            $result->delete();
            $resolution->delete();
            Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
        } catch(\Exception $e){
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
        }
        return redirect('license/index/' . $request->input('user'));
    }

    public function postSuspensionVacation(Request $request)
    {
        $this->validate($request,[
            'id_user' => 'required|integer|exists:users,id',
            /*'id_resolution_type' => 'required|integer|exists:resolution_type,id',*/
            'resolution_number' => 'required',
            'id_section' => 'required',
            'issue_date' => 'required',
            'issuing_organ' => 'required|max:100',
            'start_date' => 'required',
            'description' => 'required|max:500',
            'work_position' => 'sometimes|required|max:50',
            'workplace' => 'sometimes|required|max:50',
            /*            'constancy_url' => 'required|mimes:pdf|max:32768',*/
            'comment' => 'required',
            'license_type' => 'required',
            'suspension_type' => 'required'
        ]);

        $id_user = $request->input('id_user');
        $id_resolution_type = $request->input('resolution_type');
        $memorando_type = $request->input('memorando_type');

        $resolution = new Resolution();
        $resolution->resolution_number = $request->input('resolution_number');
        $resolution->id_resolution_type = $id_resolution_type;
        $resolution->memorando_type = $memorando_type;

        $resolution->issue_date = Carbon::parse($request->input('issue_date'));
        $resolution->issuing_organ = $request->input('issuing_organ');
        $resolution->start_date = Carbon::parse($request->input('start_date'));
        $resolution->id_section = $request->input('id_section');
        $resolution->end_date = is_null ($request->end_date) ? $request->end_date :Carbon::parse($request->input('end_date'));
        $resolution->description = $request->input('description');
        $resolution->work_position = $request->input('work_position');
        $resolution->workplace = $request->input('workplace');


        //Guardar constancia
        $filename  = "";
        $file_path = "";

        if($request->hasFile('constancy_url')){
            $file = $request->constancy_url;
            $filename = $file->store('public/resolution');
            $file_path = '/storage/' . explode('/', $filename)[1] . '/' . explode('/', $filename)[2];
            $resolution->constancy_url = $file_path;
        }

        $resolution->state_validation = 1;
        $resolution->id_user = $id_user;
        $resolution->save();

        $vacation_authorization = new SuspensionVacation();
        $vacation_authorization->id_resolution = $resolution->id;
        $vacation_authorization->date_start = Carbon::parse($resolution->start_date);
        $vacation_authorization->date_end = is_null($resolution->end_date) ? null : Carbon::parse($resolution->end_date);

        if(!is_null($resolution->end_date))
            $datediff = (strtotime($resolution->end_date) - strtotime($resolution->start_date)) / (60 * 60 * 24);
        else
            $datediff = 0;
        $vacation_authorization->number_days = $datediff + 1;
        $vacation_authorization->anio = Carbon::parse($resolution->start_date)->year;
        $vacation_authorization->comment = $request->input('comment');
        $vacation_authorization->license_resolution_type = $request->input('license_type');
        $vacation_authorization->suspension_document_type = $request->input('suspension_type');

        $vacation_authorization->save();

        Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
        return back();
    }
    public function detailSuspensionVacation($id)
    {
        try {
            $license = SuspensionVacation::find($id);
            $resolution = Resolution::findOrFail($license->id_resolution);
            $resolution_type = ResolutionType::findOrFail($resolution->id_resolution_type);

            return view('license.suspension_vacation.detail', compact('license','resolution', 'resolution_type'));

        } catch (Exception $e) {
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }
    }
    public function editSuspensionVacation($id)
    {
        try {
            $license = SuspensionVacation::find($id);
            $resolution = Resolution::findOrFail($license->id_resolution);
            $resolution_types = ResolutionType::where('flag_vacations','=',true)->pluck('name','id');

            return view('license.suspension_vacation.edit', compact('license','resolution', 'resolution_types'));
        } catch (Exception $e) {
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }
    }
    public function editSuspensionVacationPost(Request $request)
    {
        $this->validate($request,[
//            'id_user' => 'required|integer|exists:users,id',
            'id_resolution_type' => 'required|integer|exists:resolution_type,id',
            'resolution_number' => 'required',
            'issue_date' => 'required',
            'issuing_organ' => 'required|max:100',
            'start_date' => 'required',
            'description' => 'required|max:500',
            'constancy_url' => 'mimes:pdf|max:32768',
            'comment' => 'required',
            'license_type' => 'required',
            'suspension_type' => 'required'
        ]);

        $id_resolution = $request->input('id_resolution');
        $id_license = $request->input('id_license');

        $resolution = Resolution::find($id_resolution);
        $resolution->resolution_number = $request->input('resolution_number');
        $resolution->id_resolution_type = $request->input('id_resolution_type');
        $resolution->memorando_type = $request->input('memorando_type');

        $resolution->issue_date = Carbon::parse($request->input('issue_date'));
        $resolution->issuing_organ = $request->input('issuing_organ');
        $resolution->start_date = Carbon::parse($request->input('start_date'));
        $resolution->end_date = is_null($request->end_date) ? $request->end_date : Carbon::parse($request->input('end_date'));
        $resolution->description = $request->input('description');

        //Guardar constancia
        if (!empty($request->constancy_url)) {
            $file = $request->constancy_url;
            $filename = $file->store('public/resolution');
            $resolution->constancy_path = '/' . $filename;
            $resolution->constancy_url = '/storage/' . explode('/', $filename)[1] . '/' . explode('/', $filename)[2];
        }
        $resolution->save();


        $vacation_authorization = SuspensionVacation::findOrFail($id_license);
        $vacation_authorization->date_start = Carbon::parse($request->start_date);
        $vacation_authorization->date_end = is_null($request->end_date) ? $request->end_date :Carbon::parse($request->end_date);
        if(!is_null($resolution->end_date))
            $datediff = (strtotime($request->end_date) - strtotime($request->start_date)) / (60 * 60 * 24);
        else
            $datediff = 0;
        $vacation_authorization->number_days = $datediff + 1;
        $vacation_authorization->anio = Carbon::parse($request->input('start_date'))->year;
        $vacation_authorization->comment = $request->input('comment');
        $vacation_authorization->license_resolution_type = $request->input('license_type');
        $vacation_authorization->suspension_document_type = $request->input('suspension_type');

        $vacation_authorization->save();

        Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
        return back();
    }
    public function deleteSuspensionVacation(Request $request) {
        try{
            $result = SuspensionVacation::findOrFail($request->input('id'));
            $resolution = Resolution::findOrFail($result->id_resolution);
            Storage::delete($resolution->constancy_path);
            $result->delete();
            $resolution->delete();

            Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
        } catch(\Exception $e){
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
        }
        return redirect('license/index/' . $request->input('user'));
    }

    public function postSpecialLicense(Request $request)
    {
        $this->validate($request,[
            'id_user' => 'required|integer|exists:users,id',
            /*'id_resolution_type' => 'required|integer|exists:resolution_type,id',*/
            'resolution_number' => 'required',
            'id_section' => 'required',
            'issue_date' => 'required',
            'issuing_organ' => 'required|max:100',
            'start_date' => 'required',
            'description' => 'required|max:500',
            'work_position' => 'sometimes|required|max:50',
            'workplace' => 'sometimes|required|max:50',
            'comment' => 'required',
            'remunerations' => 'required',
            'suspension_license_type' => 'required'
        ]);

        $this->validate($request,['constancy_url' => 'required|mimes:pdf|max:32768',],['El campo constancia es obligatorio.']);

        $id_user = $request->input('id_user');
        $id_resolution_type = $request->input('resolution_type');
        $memorando_type = $request->input('memorando_type');

        $resolution = new Resolution();
        $resolution->resolution_number = $request->input('resolution_number');
        $resolution->id_resolution_type = $id_resolution_type;
        $resolution->memorando_type = $memorando_type;

        $resolution->issue_date = Carbon::parse($request->input('issue_date'));
        $resolution->issuing_organ = $request->input('issuing_organ');
        $resolution->start_date = Carbon::parse($request->input('start_date'));
        $resolution->id_section = $request->input('id_section');
        $resolution->end_date = is_null($request->end_date) ? $request->end_date : Carbon::parse($request->input('end_date'));
        $resolution->description = $request->input('description');
        $resolution->work_position = $request->input('work_position');
        $resolution->workplace = $request->input('workplace');

        //Guardar constancia
        $file = $request->constancy_url;
        $filename = $file->store('public/resolution');
        $resolution->constancy_path = '/' . $filename;
        $resolution->constancy_url = '/storage/' . explode('/', $filename)[1] . '/' . explode('/', $filename)[2];

        $resolution->state_validation = 1;
        $resolution->id_user = $id_user;
        $resolution->save();

        $license_authorization = new Special_License();
        $license_authorization->id_resolution = $resolution->id;
        $license_authorization->date_start = Carbon::parse($resolution->start_date);
        $license_authorization->date_end = is_null($resolution->end_date) ? $resolution->end_date : Carbon::parse($resolution->end_date);

        if(!is_null($resolution->end_date))
            $datediff = (strtotime($resolution->end_date) - strtotime($resolution->start_date)) / (60 * 60 * 24);
        else
            $datediff = 0;

        $license_authorization->number_days = $datediff + 1;
        $license_authorization->comment = $request->input('comment');
        $license_authorization->with_remunerations = $request->input('remunerations');
        $license_authorization->license_resolution_type = $request->input('suspension_license_type');

        $license_authorization->save();

        Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
        return back();
    }
    public function detailSpecialLicense($id)
    {
        try {
            $license = Special_License::find($id);
            $resolution = Resolution::findOrFail($license->id_resolution);
            $resolution_type = ResolutionType::findOrFail($resolution->id_resolution_type);

            return view('license.special_license.detail', compact('license','resolution', 'resolution_type'));

        } catch (Exception $e) {
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }
    }
    public function editSpecialLicense($id)
    {
        try {
            $license = Special_License::find($id);
            $resolution = Resolution::findOrFail($license->id_resolution);
            $resolution_types = ResolutionType::where('flag_vacations','=',true)->pluck('name','id');

            return view('license.special_license.edit', compact('license','resolution', 'resolution_types'));
        } catch (Exception $e) {
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }
    }
    public function editSpecialLicensePost(Request $request)
    {
        $this->validate($request,[
            'id_resolution_type' => 'required|integer|exists:resolution_type,id',
            'resolution_number' => 'required',
            'issue_date' => 'required',
            'issuing_organ' => 'required|max:100',
            'start_date' => 'required',
            'description' => 'required|max:500',
            'constancy_url' => 'mimes:pdf|max:32768',
            'comment' => 'required',
            'remunerations' => 'required',
            'license_type' => 'required'
        ]);

        $id_resolution = $request->input('id_resolution');
        $id_license = $request->input('id_license');


        $resolution = Resolution::find($id_resolution);
        $resolution->resolution_number = $request->input('resolution_number');
        $resolution->id_resolution_type = $request->input('id_resolution_type');
        $resolution->memorando_type = $request->input('memorando_type');

        $resolution->issue_date = Carbon::parse($request->input('issue_date'));
        $resolution->issuing_organ = $request->input('issuing_organ');
        $resolution->start_date = Carbon::parse($request->input('start_date'));
        $resolution->end_date = is_null($request->end_date) ? $request->end_date : Carbon::parse($request->input('end_date'));
        $resolution->description = $request->input('description');

        //Guardar constancia
        if (!empty($request->constancy_url)) {
            $file = $request->constancy_url;
            $filename = $file->store('public/resolution');
            $resolution->constancy_path = '/' . $filename;
            $resolution->constancy_url = '/storage/' . explode('/', $filename)[1] . '/' . explode('/', $filename)[2];
        }
        $resolution->save();

        $license = Special_License::findOrFail($id_license);
        $license->date_start = Carbon::parse($resolution->start_date);
        $license->date_end = is_null($resolution->end_date) ? $resolution->end_date : Carbon::parse($resolution->end_date);
        if(!is_null($resolution->end_date))
            $datediff = (strtotime($resolution->end_date) - strtotime($resolution->start_date)) / (60 * 60 * 24);
        else
            $datediff = 0;
        $license->number_days = $datediff + 1;
        $license->comment = $request->input('comment');
        $license->with_remunerations = $request->input('remunerations');
        $license->license_resolution_type = $request->input('license_type');
        $license->save();

        Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
        return back();
    }
    public function deleteSpecialLicense(Request $request) {
        try{
            $result = Special_License::find($request->input('id'));
            $resolution = Resolution::findOrFail($result->id_resolution);
            Storage::delete($resolution->constancy_path);
            $result->delete();
            $resolution->delete();
            Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
        } catch(\Exception $e){
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
        }
        return redirect('license/index/' . $request->input('user'));
    }
}
