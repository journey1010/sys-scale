<?php

namespace App\Http\Controllers\Profile;

use App\Models\AcademicInformation\OtherStudies;
use App\Models\AcademicInformation\PostgraduateInformation;
use App\Models\User;
use App\Models\AcademicInformation\ProfessionalTitle;
use App\Models\AcademicInformation\UniversityEducation;
use App\Models\AcademicInformation\PrimaryEducation;
use App\Models\AcademicInformation\SecondaryEducation;
use App\Models\AcademicInformation\TuitionInformation;
use App\Models\AcademicInformation\MasterDoctorDegree;
use App\ViewModels\AcademicInformation\MasterDoctorDegreeViewModel;
use App\ViewModels\AcademicInformation\PrimaryEducationViewModel;
use App\ViewModels\AcademicInformation\ProfessionalTitleViewModel;
use App\ViewModels\AcademicInformation\SecondaryEducationViewModel;
use App\ViewModels\AcademicInformation\TuitionInformationViewModel;
use App\ViewModels\AcademicInformation\UniversityEducationViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Session;
use Alert;

class AcademicTrainingController extends Controller
{
    public function getPrimaryEducation($id = null)
    {
        try
        {
            if($id == null)
            {
                $objUser = Auth::user();
                $id = $objUser->id;
            }
            else
            {
                $objUser = User::select('id', 'name', 'first_surname', 'second_surname')->find($id);
            }


            $objPrimaryEducation = PrimaryEducation::select(
                'primary_education.id',
                'primary_education.name_school',
                'primary_education.url_certificate as url',
                'primary_education.date_begin as fechainicio',
                'primary_education.date_end as fechafin',
                'primary_education.id_user',
                'primary_education.id_district as distrito',
                'primary_education.id_department as departamento',
                'primary_education.id_province as provincia',
                'primary_education.id_country as pais',
                'primary_education.state_validation as state',
                'primary_education.deleted_at')
                ->where('primary_education.id_user', $id)->first();

            /*if($objPrimaryEducation != null)
                $objPrimaryEducation["state"] = config('constants.state_validation')[$objPrimaryEducation["state"]];*/

            return view('academicTraining.primaryEducation', compact('objUser','objPrimaryEducation'));
        }
        catch (\Exception $e) {
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }
    }

    public function savePrimaryEducation($id_user)
    {
        try
        {
            $objUser = User::select('id', 'name', 'first_surname', 'second_surname')->find($id_user);

            if($objUser == null) {
                Alert()->error('Ocurrió un problema para procesar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
                return redirect()->action('Profile\StaffManagementController@index');
            }

            $departments = DB::table('department')->orderBy('name', 'asc')->get();
            $objPrimaryEducation = PrimaryEducation::where('id_user', $id_user)->first();

            if($objPrimaryEducation == null){
                $model = new PrimaryEducationViewModel();
                $model->id_user = $id_user;
                return view('academicTraining.savePrimaryEducation', compact('model', 'objUser', 'departments'));
            }

            $model = new PrimaryEducationViewModel();

            $model->id = $objPrimaryEducation->id;
            $model->name_school = $objPrimaryEducation->name_school;
            $model->date_begin = is_null($objPrimaryEducation->date_begin) ? null : Carbon::parse($objPrimaryEducation->date_begin)->format('d-m-Y');
            $model->date_end = is_null($objPrimaryEducation->date_end) ? null : Carbon::parse($objPrimaryEducation->date_end)->format('d-m-Y');
            $model->url_certificate = $objPrimaryEducation->url_certificate;
            $model->id_department = $objPrimaryEducation->id_department;
            $model->id_province = $objPrimaryEducation->id_province;
            $model->id_district = $objPrimaryEducation->id_district;
            $model->id_country = $objPrimaryEducation->id_country;
            $model->path_certificate = $objPrimaryEducation->path_certificate;
            $model->state_validation = $objPrimaryEducation->state_validation;
            $model->id_user = $objPrimaryEducation->id_user;

            return view('academicTraining.savePrimaryEducation', compact('objUser', 'model', 'departments'));
        }
        catch (\Exception $e) {
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect()->action('Profile\StaffManagementController@index');
        }
    }

    public function postPrimaryEducation(Request $request)
    {
        /*$this->validate($request,[
            'name_school' => 'required|max:100',
            'date_begin' => 'required',
            'date_end' => 'required',
            'id_user' => 'required',
            'url_certificate' => 'mimes:pdf'
        ]);*/

        try
        {
            if(empty($request->id)){
                $objPrimaryEducation = new PrimaryEducation();
            }
            else{
                $objPrimaryEducation = PrimaryEducation::find($request->id);
                if(empty($objPrimaryEducation)){
                    Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
                    return redirect()->action('Profile\StaffManagementController@index');
                }
            }

            $objPrimaryEducation->id_user = $request->id_user;
            $objPrimaryEducation->name_school = $request->name_school;
            $objPrimaryEducation->id_department = $request->id_department;
            $objPrimaryEducation->id_province = $request->id_province;
            $objPrimaryEducation->id_district = $request->id_district;
            $objPrimaryEducation->id_country = $request->id_country;
            $objPrimaryEducation->date_begin = Carbon::parse($request->date_begin);
            $objPrimaryEducation->date_end = is_null($request->date_end) ? null : Carbon::parse($request->date_end);

            $end = Carbon::parse($objPrimaryEducation->date_end);
            $begin = Carbon::parse($objPrimaryEducation->date_begin);

            $diff_days = $end->diff($begin);
            $objPrimaryEducation->years_diff = $diff_days->y;
            $objPrimaryEducation->months_diff = $diff_days->m;
            $objPrimaryEducation->days_diff = $diff_days->d;

            if(!empty($request->url_certificate))
            {
                if(empty($request->path_certificate))
                {
                    $file = $request->url_certificate;
                    $filename = $file->store('public/ai/constancy');
                    $objPrimaryEducation->path_certificate = '/' . $filename;
                    $objPrimaryEducation->url_certificate = '/storage/' . explode('/',$filename)[1] . '/' . explode('/',$filename)[2]. '/'  . explode('/',$filename)[3];
                }
                else
                {
                    \Storage::delete($objPrimaryEducation->path_certificate);
                    $file = $request->url_certificate;
                    $filename = $file->store('public/ai/constancy');
                    $objPrimaryEducation->path_certificate = '/' . $filename;
                    $objPrimaryEducation->url_certificate = '/storage/' . explode('/',$filename)[1] . '/' . explode('/',$filename)[2]. '/'  . explode('/',$filename)[3];
                }
            }

            $objPrimaryEducation->save();

            Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
            return redirect()->action('Profile\AcademicTrainingController@getAll', [ 'id' => $objPrimaryEducation->id_user ]);
        }
        catch (\Exception $e) {
            Alert()->error("Advertencia", 'Ocurrio un error')->persistent('Aceptar');
            return redirect()->action('Profile\StaffManagementController@index');
        }
    }

    public function getSecondaryEducation($id = null)
    {
        try
        {

            if($id == null) {
                $objUser = Auth::user();
                $id = $objUser->id;
            }
            else {
                $objUser = User::select('id', 'name', 'first_surname', 'second_surname')->find($id);
            }

            $objSecondaryEducation = SecondaryEducation::select('secondary_education.id', 'secondary_education.name_university as secondary', 'secondary_education.url_certificate as url',
                    'secondary_education.date_begin as fechainicio', 'secondary_education.date_end as fechafin', 'secondary_education.id_user', 'secondary_education.id_district as distrito', 'secondary_education.id_department as departamento',
                    'secondary_education.id_province as provincia', 'secondary_education.id_country as pais', 'secondary_education.state_validation as state', 'secondary_education.deleted_at')
                ->where('secondary_education.id_user', $id)->first();

            return view('academicTraining.secondaryEducation', compact('objUser','objSecondaryEducation'));
        }
        catch (\Exception $e) {
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }

    }

    public function saveSecondaryEducation($id_user)
    {
        try
        {
            $objUser = User::select('id', 'name', 'first_surname', 'second_surname')->find($id_user);

            if($objUser == null) {
                Alert()->error('Ocurrió un problema para procesar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
                return redirect()->action('Profile\StaffManagementController@index');
            }

            $departments = DB::table('department')->orderBy('name', 'asc')->get();
            $objSecondaryEducation = SecondaryEducation::where('id_user', $id_user)->first();

            if($objSecondaryEducation == null){
                $model = new PrimaryEducationViewModel();
                $model->id_user = $id_user;
                return view('academicTraining.saveSecondaryEducation', compact('model', 'objUser', 'departments'));
            }

            $model = new SecondaryEducationViewModel();

            $model->id = $objSecondaryEducation->id;
            $model->name_university = $objSecondaryEducation->name_university;
            $model->id_department = $objSecondaryEducation->id_department;
            $model->id_province = $objSecondaryEducation->id_province;
            $model->id_district = $objSecondaryEducation->id_district;
            $model->id_country = $objSecondaryEducation->id_country;
            $model->date_begin = (is_null($objSecondaryEducation->date_begin)) ? null : Carbon::parse($objSecondaryEducation->date_begin)->format('d-m-Y');
            $model->date_end = (is_null($objSecondaryEducation->date_end)) ? null : Carbon::parse($objSecondaryEducation->date_end)->format('d-m-Y');
            $model->url_certificate = $objSecondaryEducation->url_certificate;
            $model->path_certificate = $objSecondaryEducation->path_certificate;
            $model->state_validation = $objSecondaryEducation->state_validation;
            $model->id_user = $objSecondaryEducation->id_user;

            return view('academicTraining.saveSecondaryEducation', compact('objUser', 'model', 'departments'));
        }
        catch (\Exception $e) {
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect()->action('Profile\StaffManagementController@index');
        }

    }

    public function postSecondaryEducation(Request $request)
    {
        /*$this->validate($request,[
            'name_university' => 'required|max:100',
            'date_begin' => 'required',
            'date_end' => 'required',
            'id_user' => 'required',
            'url_certificate' => 'mimes:pdf'
        ]);*/

        try
        {
            if(empty($request->id)){
                $objSecondaryEducation = new SecondaryEducation();
            }
            else{
                $objSecondaryEducation = SecondaryEducation::find($request->id);
                if(empty($objSecondaryEducation)){
                    Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
                    return redirect()->action('Profile\StaffManagementController@index');
                }
            }

            $objSecondaryEducation->id_user = $request->id_user;
            $objSecondaryEducation->name_university = $request->name_university;
            $objSecondaryEducation->id_department = $request->id_department;
            $objSecondaryEducation->id_province = $request->id_province;
            $objSecondaryEducation->id_district = $request->id_district;
            $objSecondaryEducation->id_country = $request->id_country;
            $objSecondaryEducation->date_begin = Carbon::parse($request->date_begin);
            $objSecondaryEducation->date_end = is_null($request->date_end) ? null :Carbon::parse($request->date_end);

            $end = Carbon::parse($objSecondaryEducation->date_end);
            $begin = Carbon::parse($objSecondaryEducation->date_begin);

            $diff_days = $end->diff($begin);
            $objSecondaryEducation->years_diff = $diff_days->y;
            $objSecondaryEducation->months_diff = $diff_days->m;
            $objSecondaryEducation->days_diff = $diff_days->d;

            if(!empty($request->url_certificate))
            {
                if(empty($request->path_certificate))
                {
                    $file = $request->url_certificate;
                    $filename = $file->store('public/ai/constancy');
                    $objSecondaryEducation->path_certificate = '/' . $filename;
                    $objSecondaryEducation->url_certificate = '/storage/' . explode('/',$filename)[1] . '/' . explode('/',$filename)[2]. '/'  . explode('/',$filename)[3];
                }
                else
                {
                    \Storage::delete($objSecondaryEducation->path_certificate);
                    $file = $request->url_certificate;
                    $filename = $file->store('public/ai/constancy');
                    $objSecondaryEducation->path_certificate = '/' . $filename;
                    $objSecondaryEducation->url_certificate = '/storage/' . explode('/',$filename)[1] . '/' . explode('/',$filename)[2]. '/'  . explode('/',$filename)[3];
                }
            }

            $objSecondaryEducation->save();

            Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
            return redirect()->action('Profile\AcademicTrainingController@getAll', [ 'id' => $objSecondaryEducation->id_user ]);
        }
        catch (\Exception $e) {
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect()->action('Profile\StaffManagementController@index');
        }
    }

    public function getUniversityEducation($id = null)
    {
        try
        {
            if($id == null) {
                $objUser = Auth::user();
                $id = $objUser->id;
            }
            else {
                $objUser = User::select('id', 'name', 'first_surname', 'second_surname')->find($id);
            }

            $objUniversityEducation = UniversityEducation::select('university_education.id', 'university_education.name_university as university', 'university_education.url_certificate as url', 'university_education.date_begin as fechainicio',
                    'university_education.date_end as fechafin', 'university_education.concentration', 'university_education.id_user', 'university_education.id_district as distrito', 'university_education.id_department as departamento',
                    'university_education.id_province as provincia', 'university_education.id_country as pais', 'university_education.state_validation as state', 'university_education.deleted_at')
                ->where('university_education.id_user', $id)->first();

            return view('academicTraining.universityEducation', compact('objUser','objUniversityEducation'));
        }
        catch (\Exception $e) {
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }
    }

    public function saveUniversityEducation($id_user , $id = null)
    {
        try
        {
            $objUser = User::select('id', 'name', 'first_surname', 'second_surname')->find($id_user);

            if($id == null){
                $model = new UniversityEducationViewModel();
                $model->id_user = $id_user;
                return view('academicTraining.saveMasterDoctorDegree', compact('objUser','model'));
            }

            $departments = DB::table('department')->orderBy('name', 'asc')->get();
            $objUniversityEducation= UniversityEducation::where('id', $id)->first();

            if($objUniversityEducation == null) {
                Alert()->error('Ocurrió un problema para procesar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
                return redirect()->action('Profile\StaffManagementController@index');
            }

            $model = new UniversityEducationViewModel();

            $model->id = $objUniversityEducation->id;
            $model->name_university = $objUniversityEducation->name_university;
            $model->concentration = $objUniversityEducation->concentration;
            $model->id_country_ue = $objUniversityEducation->id_country;
            $model->id_department_ue = $objUniversityEducation->id_department;
            $model->id_province_ue = $objUniversityEducation->id_province;
            $model->id_district_ue = $objUniversityEducation->id_district;
            $model->date_begin_ue = (is_null($objUniversityEducation->date_begin)) ? null : Carbon::parse($objUniversityEducation->date_begin)->format('d-m-Y');
            $model->date_end_ue = (is_null($objUniversityEducation->date_end)) ? null : Carbon::parse($objUniversityEducation->date_end)->format('d-m-Y');
            $model->url_certificate = $objUniversityEducation->url_certificate;
            $model->path_certificate = $objUniversityEducation->path_certificate;
            $model->state_validation = $objUniversityEducation->state_validation;
            $model->id_user = $objUniversityEducation->id_user;

            return view('academicTraining.saveUniversityEducation', compact('objUser', 'model', 'departments'));
        }
        catch (\Exception $e) {
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect()->action('Profile\StaffManagementController@index');
        }

    }

    public function postUniversityEducation(Request $request)
    {
        /*$this->validate($request,[
            'name_university' => 'required|max:100',
            'concentration' => 'required',
            'date_begin_ue' => 'required',
            'date_end_ue' => 'required',
            'id_user' => 'required',
            'url_certificate' => 'mimes:pdf'
        ]);*/

        try
        {
            if(empty($request->id)){
                $objUniversityEducation = new UniversityEducation();
            }
            else{
                $objUniversityEducation = UniversityEducation::find($request->id);
                if(empty($objUniversityEducation)){
                    Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
                    return redirect()->action('Profile\StaffManagementController@index');
                }
            }

            $objUniversityEducation->id_user = $request->id_user;
            $objUniversityEducation->name_university = $request->name_university;
            $objUniversityEducation->concentration = $request->concentration;
            $objUniversityEducation->id_country = $request->id_country_ue;
            $objUniversityEducation->id_department = $request->id_department_ue;
            $objUniversityEducation->id_province = $request->id_province_ue;
            $objUniversityEducation->id_district = $request->id_district_ue;
            $objUniversityEducation->date_begin = Carbon::parse($request->date_begin_ue);
            $objUniversityEducation->date_end = is_null($request->date_end_ue) ? null :Carbon::parse($request->date_end_ue);

            $end = Carbon::parse($objUniversityEducation->date_end);
            $begin = Carbon::parse($objUniversityEducation->date_begin);

            $diff_days = $end->diff($begin);
            $objUniversityEducation->years_diff = $diff_days->y;
            $objUniversityEducation->months_diff = $diff_days->m;
            $objUniversityEducation->days_diff = $diff_days->d;

            if(!empty($request->url_certificate))
            {
                if(empty($request->path_certificate))
                {
                    $file = $request->url_certificate;
                    $filename = $file->store('public/ai/constancy');
                    $objUniversityEducation->path_certificate = '/' . $filename;
                    $objUniversityEducation->url_certificate = '/storage/' . explode('/',$filename)[1] . '/' . explode('/',$filename)[2]. '/'  . explode('/',$filename)[3];
                }
                else
                {
                    \Storage::delete($objUniversityEducation->path_certificate);
                    $file = $request->url_certificate;
                    $filename = $file->store('public/ai/constancy');
                    $objUniversityEducation->path_certificate = '/' . $filename;
                    $objUniversityEducation->url_certificate = '/storage/' . explode('/',$filename)[1] . '/' . explode('/',$filename)[2]. '/'  . explode('/',$filename)[3];
                }
            }

            $objUniversityEducation->save();

            Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
            return redirect()->action('Profile\AcademicTrainingController@getAll', [ 'id' => $objUniversityEducation->id_user ]);
        }
        catch (\Exception $e) {
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect()->action('Profile\StaffManagementController@index');
        }
    }

    public function getProfessionalTitle($id = null)
    {
        try
        {

            if($id == null) {
                $objUser = Auth::user();
                $id = $objUser->id;
            }
            else {
                $objUser = User::select('id', 'name', 'first_surname', 'second_surname')->find($id);
            }

            $objProfessionalTitle = ProfessionalTitle::select('professional_title.id', 'professional_title.name_college as college', 'professional_title.mention', 'professional_title.url_certificate as url', 'professional_title.date_begin as fechainicio',
                    'professional_title.date_end as fechafin', 'professional_title.concentration', 'professional_title.id_user', 'professional_title.id_district as distrito', 'professional_title.id_department as departamento',
                    'professional_title.date_register_title', 'professional_title.number_register_title', 'professional_title.id_province as provincia', 'professional_title.id_country as pais', 'professional_title.state_validation as state', 'professional_title.deleted_at')
                ->where('professional_title.id_user', $id)->first();

            return view('academicTraining.professionalTitle', compact('objUser','objProfessionalTitle'));
        }
        catch (\Exception $e) {
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }
    }

    public function saveProfessionalTitle($id_user)
    {
        try
        {
            $objUser = User::select('id', 'name', 'first_surname', 'second_surname')->find($id_user);

            if($objUser == null) {
                Alert()->error('Ocurrió un problema para procesar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
                return redirect()->action('Profile\StaffManagementController@index');
            }

            $objProfessionalTitle = ProfessionalTitle::where('id_user', $id_user)->first();
            $departments = DB::table('department')->orderBy('name', 'asc')->get();

            if($objProfessionalTitle == null){
                $model = new ProfessionalTitleViewModel();
                $model->id_user = $id_user;
                return view('academicTraining.saveProfessionalTitle', compact('objUser','model', 'departments'));
            }

            $model = new ProfessionalTitleViewModel();

            $model->id = $objProfessionalTitle->id;
            $model->name_college = $objProfessionalTitle->name_college;
            $model->concentration = $objProfessionalTitle->concentration;
            $model->mention = $objProfessionalTitle->mention;
            $model->number_register_title = $objProfessionalTitle->number_register_title;
            $model->date_register_title_pt = (is_null($objProfessionalTitle->date_register_title)) ? null : Carbon::parse($objProfessionalTitle->date_register_title)->format('d-m-Y');
            $model->id_country_pt = $objProfessionalTitle->id_country;
            $model->id_department_pt = $objProfessionalTitle->id_department;
            $model->id_province_pt = $objProfessionalTitle->id_province;
            $model->id_district_pt = $objProfessionalTitle->id_district;
            $model->date_begin_pt = (is_null($objProfessionalTitle->date_begin)) ? null : Carbon::parse($objProfessionalTitle->date_begin)->format('d-m-Y');
            $model->date_end_pt = (is_null($objProfessionalTitle->date_end)) ? null : Carbon::parse($objProfessionalTitle->date_end)->format('d-m-Y');
            $model->url_certificate = $objProfessionalTitle->url_certificate;
            $model->path_certificate = $objProfessionalTitle->path_certificate;
            $model->state_validation = $objProfessionalTitle->state_validation;
            $model->id_user = $objProfessionalTitle->id_user;

            return view('academicTraining.saveProfessionalTitle', compact('objUser', 'model', 'departments'));
        }
        catch (\Exception $e) {
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect()->action('Profile\StaffManagementController@index');
        }

    }

    public function postProfessionalTitle(Request $request)
    {
        /*$this->validate($request,[
            'name_college' => 'required|max:100',
            'number_register_title' => 'required',
            'date_register_title_pt' => 'required',
            'concentration' => 'required',
            'date_begin_pt' => 'required',
            'date_end_pt' => 'required',
            'id_user' => 'required',
            'url_certificate' => 'mimes:pdf'
        ]);*/

        try
        {
            if(empty($request->id)){
                $objProfessionalTitle = new ProfessionalTitle();
            }
            else{
                $objProfessionalTitle = ProfessionalTitle::find($request->id);
                if(empty($objProfessionalTitle)){
                    Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
                    return redirect()->action('Profile\StaffManagementController@index');
                }
            }

            $objProfessionalTitle->id_user = $request->id_user;
            $objProfessionalTitle->name_college = $request->name_college;
            $objProfessionalTitle->concentration = $request->concentration;
            $objProfessionalTitle->mention = $request->mention  ;
            $objProfessionalTitle->number_register_title = $request->number_register_title;
            $objProfessionalTitle->date_register_title = Carbon::parse($request->date_register_title_pt);
            $objProfessionalTitle->id_country = $request->id_country_pt;
            $objProfessionalTitle->id_department = $request->id_department_pt;
            $objProfessionalTitle->id_province = $request->id_province_pt;
            $objProfessionalTitle->id_district = $request->id_district_pt;
            $objProfessionalTitle->date_begin = Carbon::parse($request->date_begin_pt);
            $objProfessionalTitle->date_end = is_null($request->date_end_pt) ? null :Carbon::parse($request->date_end_pt);

            $end = Carbon::parse($objProfessionalTitle->date_end);
            $begin = Carbon::parse($objProfessionalTitle->date_begin);

            $diff_days = $end->diff($begin);
            $objProfessionalTitle->years_diff = $diff_days->y;
            $objProfessionalTitle->months_diff = $diff_days->m;
            $objProfessionalTitle->days_diff = $diff_days->d;

            if(!empty($request->url_certificate))
            {
                if(empty($request->path_certificate))
                {
                    $file = $request->url_certificate;
                    $filename = $file->store('public/ai/constancy');
                    $objProfessionalTitle->path_certificate = '/' . $filename;
                    $objProfessionalTitle->url_certificate = '/storage/' . explode('/',$filename)[1] . '/' . explode('/',$filename)[2]. '/'  . explode('/',$filename)[3];
                }
                else
                {
                    \Storage::delete($objProfessionalTitle->path_certificate);
                    $file = $request->url_certificate;
                    $filename = $file->store('public/ai/constancy');
                    $objProfessionalTitle->path_certificate = '/' . $filename;
                    $objProfessionalTitle->url_certificate = '/storage/' . explode('/',$filename)[1] . '/' . explode('/',$filename)[2]. '/'  . explode('/',$filename)[3];
                }
            }

            $objProfessionalTitle->save();

            Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
            return redirect()->action('Profile\AcademicTrainingController@getAll', [ 'id' => $objProfessionalTitle->id_user] );
        }
        catch (\Exception $e) {
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect()->action('Profile\StaffManagementController@index');
        }
    }

    public function getTuitionInformation($id = null)
    {
        try
        {

            if($id == null) {
                $objUser = Auth::user();
                $id = $objUser->id;
            }
            else {
                $objUser = User::select('id', 'name', 'first_surname', 'second_surname')->find($id);
            }

            $objTuitionInformation = TuitionInformation::select('tuition_information.id', 'tuition_information.number_tuition as number', 'tuition_information.url_certificate as url',
                    'tuition_information.id_user', 'tuition_information.state_validation as state', 'tuition_information.deleted_at')
                ->where('tuition_information.id_user', $id)->first();

            return view('academicTraining.tuitionInformation', compact('objUser','objTuitionInformation'));
        }
        catch (\Exception $e) {
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }
    }

    public function saveTuitionInformation($id_user)
    {
        try
        {
            $objUser = User::select('id', 'name', 'first_surname', 'second_surname')->find($id_user);

            if($objUser == null) {
                Alert()->error('Ocurrió un problema para procesar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
                return redirect()->action('Profile\StaffManagementController@index');
            }

            $objTuitionInformation = TuitionInformation::where('id_user', $id_user)->first();
            $departments = DB::table('department')->orderBy('name', 'asc')->get();

            if($objTuitionInformation == null){
                $model = new TuitionInformationViewModel();
                $model->id_user = $id_user;
                return view('academicTraining.saveTuitionInformation', compact('objUser','model', 'departments'));
            }

            $model = new TuitionInformationViewModel();

            $model->id = $objTuitionInformation->id;
            $model->number_tuition = $objTuitionInformation->number_tuition;
            $model->url_certificate = $objTuitionInformation->url_certificate;
            $model->path_certificate = $objTuitionInformation->path_certificate;
            $model->state_validation = $objTuitionInformation->state_validation;
            $model->id_user = $objTuitionInformation->id_user;

            return view('academicTraining.saveTuitionInformation', compact('objUser', 'model', 'departments'));
        }
        catch (\Exception $e) {
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect()->action('Profile\StaffManagementController@index');
        }

    }

    public function postTuitionInformation(Request $request)
    {
        /*$this->validate($request,[
            'number_tuition' => 'required|max:100',
            'id_user' => 'required',
            'url_certificate' => 'mimes:pdf'
        ]);*/

        try
        {
            if(empty($request->id)){
                $objTuitionInformation = new TuitionInformation();
            }
            else{
                $objTuitionInformation = TuitionInformation::find($request->id);
                if(empty($objTuitionInformation)){
                    Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
                    return redirect()->action('Profile\StaffManagementController@index');
                }
            }

            $objTuitionInformation->id_user = $request->id_user;
            $objTuitionInformation->number_tuition = $request->number_tuition;

            if(!empty($request->url_certificate))
            {
                if(empty($request->path_certificate))
                {
                    $file = $request->url_certificate;
                    $filename = $file->store('public/ai/constancy');
                    $objTuitionInformation->path_certificate = '/' . $filename;
                    $objTuitionInformation->url_certificate = '/storage/' . explode('/',$filename)[1] . '/' . explode('/',$filename)[2]. '/'  . explode('/',$filename)[3];
                }
                else
                {
                    \Storage::delete($objTuitionInformation->path_certificate);
                    $file = $request->url_certificate;
                    $filename = $file->store('public/ai/constancy');
                    $objTuitionInformation->path_certificate = '/' . $filename;
                    $objTuitionInformation->url_certificate = '/storage/' . explode('/',$filename)[1] . '/' . explode('/',$filename)[2]. '/'  . explode('/',$filename)[3];
                }
            }

            $objTuitionInformation->save();

            Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
            return redirect()->action('Profile\AcademicTrainingController@getAll', [ 'id' => $objTuitionInformation->id_user ]);
        }
        catch (\Exception $e) {
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect()->action('Profile\StaffManagementController@index');
        }
    }

    public function getMasterDoctorDegree($id = null)
    {
        try
        {

            if($id == null) {
                $objUser = Auth::user();
                $id = $objUser->id;
            }
            else {
                $objUser = User::select('id', 'name', 'first_surname', 'second_surname')->find($id);
            }

            $listMasterDoctorDegree = MasterDoctorDegree::select('master_doctor_degree.id', 'master_doctor_degree.name_school as college', 'master_doctor_degree.concentration', 'master_doctor_degree.date_expedition as expedation',
                    'master_doctor_degree.id_user', 'master_doctor_degree.state_validation as state', 'master_doctor_degree.date_begin as fechainicio', 'master_doctor_degree.date_end as fechafin',
                    'master_doctor_degree.url_certificate as url', 'master_doctor_degree.deleted_at')
                ->where('master_doctor_degree.id_user', $id)->get();

            return view('academicTraining.masterDoctorDegree', compact('objUser','listMasterDoctorDegree'));
        }
        catch (\Exception $e) {
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }
    }

    public function saveMasterDoctorDegree($id_user , $id = null)
    {
        try
        {
            $objUser = User::select('id', 'name', 'first_surname', 'second_surname')->find($id_user);

            if($id == null){
                $model = new TuitionInformation();
                $model->id_user = $id_user;
                return view('academicTraining.saveMasterDoctorDegree', compact('objUser','model'));
            }

            $objMasterDoctorDegree = MasterDoctorDegree::where('id', $id)->first();

            if($objMasterDoctorDegree == null) {
                Alert()->error('Ocurrió un problema para procesar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
                return redirect()->action('Profile\StaffManagementController@index');
            }

            $model = new MasterDoctorDegreeViewModel();

            $model->id = $objMasterDoctorDegree->id;
            $model->name_school = $objMasterDoctorDegree->name_school;
            $model->concentration = $objMasterDoctorDegree->concentration;
            $model->date_expedition_md = (is_null($objMasterDoctorDegree->date_expedition)) ? null : Carbon::parse($objMasterDoctorDegree->date_expedition)->format('d-m-Y');
            $model->date_begin_md = (is_null($objMasterDoctorDegree->date_begin)) ? null : Carbon::parse($objMasterDoctorDegree->date_begin)->format('d-m-Y');
            $model->date_end_md = (is_null($objMasterDoctorDegree->date_end)) ? null : Carbon::parse($objMasterDoctorDegree->date_end)->format('d-m-Y');
            $model->url_certificate = $objMasterDoctorDegree->url_certificate;
            $model->path_certificate = $objMasterDoctorDegree->path_certificate;
            $model->state_validation = $objMasterDoctorDegree->state_validation;
            $model->id_user = $objMasterDoctorDegree->id_user;

            return view('academicTraining.saveMasterDoctorDegree', compact('objUser', 'model'));
        }
        catch (\Exception $e) {
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect()->action('Profile\StaffManagementController@index');
        }

    }

    public function postMasterDoctorDegree(Request $request)
    {
        /*$this->validate($request,[
            'name_school' => 'required|max:100',
            'concentration' => 'required',
            'date_expedition_md' => 'required',
            'date_begin_md' => 'required',
            'date_end_md' => 'required',
            'id_user' => 'required',
            'url_certificate' => 'mimes:pdf'
        ]);*/

        try
        {
            if(empty($request->id)){
                $objMasterDoctorDegree = new MasterDoctorDegree();
            }
            else{
                $objMasterDoctorDegree = MasterDoctorDegree::find($request->id);
                if(empty($objMasterDoctorDegree)){
                    Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
                    return redirect()->action('Profile\StaffManagementController@index');
                }
            }

            $objMasterDoctorDegree->id_user = $request->id_user;
            $objMasterDoctorDegree->name_school = $request->name_school;
            $objMasterDoctorDegree->concentration = $request->concentration;
            $objMasterDoctorDegree->date_expedition = Carbon::parse($request->date_expedition_md);
            $objMasterDoctorDegree->date_begin = Carbon::parse($request->date_begin_md);
            $objMasterDoctorDegree->date_end = is_null($request->date_end_md) ? null :Carbon::parse($request->date_end_md);

            $end = is_null($objMasterDoctorDegree->date_end) ? null : Carbon::parse($objMasterDoctorDegree->date_end);
            $begin = Carbon::parse($objMasterDoctorDegree->date_begin);

            $diff_days = is_null($request->date_end_md) ? Carbon::parse($request->date_begin_md) : $end->diff($begin);


            $objMasterDoctorDegree->years_diff = is_null($request->date_end_md) ? $diff_days->year : $diff_days->y;
            $objMasterDoctorDegree->months_diff = is_null($request->date_end_md) ? $diff_days->month : $diff_days->m;
            $objMasterDoctorDegree->days_diff = is_null($request->date_end_md) ? $diff_days->day : $diff_days->d;



            if(!empty($request->url_certificate))
            {
                if(!empty($request->path_certificate))
                {
                    \Storage::delete($objMasterDoctorDegree->path_certificate);
                }

                $file = $request->url_certificate;
                $filename = $file->store('public/ai/constancy');
                $objMasterDoctorDegree->path_certificate = '/' . $filename;
                $objMasterDoctorDegree->url_certificate = '/storage/' . explode('/',$filename)[1] . '/' . explode('/',$filename)[2]. '/'  . explode('/',$filename)[3];
            }

            $objMasterDoctorDegree->save();

            Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
            return redirect()->action('Profile\AcademicTrainingController@getAll', [ 'id' => $objMasterDoctorDegree->id_user ]);
        }
        catch (\Exception $e) {
            Alert()->error($e->getMessage(), 'Ocurrio un error')->persistent('Aceptar');
            return redirect()->action('Profile\StaffManagementController@index');
        }
    }

    public function getPostgraduateInformation($id = null)
    {
        try
        {
            if($id == null) {
                $objUser = Auth::user();
                $id = $objUser->id;
            }
            else {
                $objUser = User::select('id', 'name', 'first_surname', 'second_surname')->find($id);
            }

            $listPostGraduate = PostgraduateInformation::select('postgraduate_information.id', 'postgraduate_information.name_school as college', 'postgraduate_information.concentration', 'postgraduate_information.date_expedition as expedation',
                    'postgraduate_information.id_user', 'postgraduate_information.state_validation as state', 'postgraduate_information.date_begin as fechainicio', 'postgraduate_information.date_end as fechafin',
                    'postgraduate_information.url_certificate as url', 'postgraduate_information.hours', 'postgraduate_information.deleted_at')
                ->where('postgraduate_information.id_user', $id)->get();

            return view('academicTraining.postgraduateInformation', compact('objUser','listPostGraduate'));
        }
        catch (\Exception $e) {
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }
    }

    public function savePostgraduateInformation($id_user , $id = null)
    {
        try
        {
            $objUser = User::select('id', 'name', 'first_surname', 'second_surname')->find($id_user);

            if($id == null){
                $model = new TuitionInformation();
                $model->id_user = $id_user;
                return view('academicTraining.savePostgraduateInformation', compact('objUser','model'));
            }

            $objPostgraduateInformation = PostgraduateInformation::where('id', $id)->first();

            if($objPostgraduateInformation == null) {
                Alert()->error('Ocurrió un problema para procesar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
                return redirect()->action('Profile\StaffManagementController@index');
            }

            $model = new PostgraduateInformation();

            $model->id = $objPostgraduateInformation->id;
            $model->name_school = $objPostgraduateInformation->name_school;
            $model->concentration = $objPostgraduateInformation->concentration;
            $model->date_expedition_pi = (is_null($objPostgraduateInformation->date_expedition)) ? null : Carbon::parse($objPostgraduateInformation->date_expedition)->format('d-m-Y');
            $model->hours = $objPostgraduateInformation->hours;
            $model->date_begin_pi = (is_null($objPostgraduateInformation->date_begin)) ? null : Carbon::parse($objPostgraduateInformation->date_begin)->format('d-m-Y');
            $model->date_end_pi = (is_null($objPostgraduateInformation->date_end)) ? null : Carbon::parse($objPostgraduateInformation->date_end)->format('d-m-Y');
            $model->url_certificate = $objPostgraduateInformation->url_certificate;
            $model->path_certificate = $objPostgraduateInformation->path_certificate;
            $model->state_validation = $objPostgraduateInformation->state_validation;
            $model->id_user = $objPostgraduateInformation->id_user;

            return view('academicTraining.savePostgraduateInformation', compact('objUser', 'model'));
        }
        catch (\Exception $e) {
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect()->action('Profile\StaffManagementController@index');
        }

    }

    public function postPostgraduateInformation(Request $request)
    {
        /*$this->validate($request,[
            'name_school' => 'required|max:100',
            'concentration' => 'required',
            'hours' => 'required',
            'date_expedition_pi' => 'required',
            'date_begin_pi' => 'required',
            'date_end_pi' => 'required',
            'id_user' => 'required',
            'url_certificate' => 'mimes:pdf'
        ]);*/

        try
        {
            if(empty($request->id)){
                $objPostgraduateInformation = new PostgraduateInformation();
            }
            else{
                $objPostgraduateInformation = PostgraduateInformation::find($request->id);
                if(empty($objPostgraduateInformation)){
                    Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
                    return redirect()->action('Profile\StaffManagementController@index');
                }
            }

            $objPostgraduateInformation->id_user = $request->id_user;
            $objPostgraduateInformation->name_school = $request->name_school;
            $objPostgraduateInformation->concentration = $request->concentration;
            $objPostgraduateInformation->date_expedition = Carbon::parse($request->date_expedition_pi);
            $objPostgraduateInformation->hours = $request->hours;
            $objPostgraduateInformation->date_begin = Carbon::parse($request->date_begin_pi);
            $objPostgraduateInformation->date_end = is_null($request->date_end_pi) ? null : Carbon::parse($request->date_end_pi);

            $end = Carbon::parse($objPostgraduateInformation->date_end);
            $begin = Carbon::parse($objPostgraduateInformation->date_begin);

            $diff_days = is_null($request->date_end_pi) ? Carbon::parse($request->date_begin_pi) : $end->diff($begin);

            $objPostgraduateInformation->years_diff = is_null($request->date_end_pi) ? $diff_days->year : $diff_days->y;
            $objPostgraduateInformation->months_diff = is_null($request->date_end_pi) ? $diff_days->month : $diff_days->m;
            $objPostgraduateInformation->days_diff = is_null($request->date_end_pi) ? $diff_days->day : $diff_days->d;

            if(!empty($request->url_certificate))
            {
                if(!empty($request->path_certificate))
                {
                    \Storage::delete($objPostgraduateInformation->path_certificate);
                }

                $file = $request->url_certificate;
                $filename = $file->store('public/ai/constancy');
                $objPostgraduateInformation->path_certificate = '/' . $filename;
                $objPostgraduateInformation->url_certificate = '/storage/' . explode('/',$filename)[1] . '/' . explode('/',$filename)[2]. '/'  . explode('/',$filename)[3];

            }

            $objPostgraduateInformation->save();

            Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
            return redirect()->action('Profile\AcademicTrainingController@getAll', [ 'id' => $objPostgraduateInformation->id_user ] );
        }
        catch (\Exception $e) {
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect()->action('Profile\StaffManagementController@index');
        }
    }

    public function getOtherStudies($id = null)
    {
        try
        {
            if($id == null) {
                $objUser = Auth::user();
                $id = $objUser->id;
            }
            else {
                $objUser = User::select('id', 'name', 'first_surname', 'second_surname')->find($id);
            }

            $listOthersStudies = OtherStudies::select('others_studies.id', 'others_studies.name_school as college', 'others_studies.name_studie', 'others_studies.type_studie',
                    'others_studies.id_user', 'others_studies.state_validation as state', 'others_studies.date_begin as fechainicio', 'others_studies.date_end as fechafin',
                    'others_studies.url_certificate as url', 'others_studies.hours', 'others_studies.deleted_at')
                ->where('others_studies.id_user', $id)->get();

            return view('academicTraining.othersStudies', compact('objUser','listOthersStudies'));
        }
        catch (\Exception $e) {
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }
    }

    public function saveOtherStudies($id_user , $id = null)
    {
        try
        {
            $objUser = User::select('id', 'name', 'first_surname', 'second_surname')->find($id_user);

            if($id == null){
                $model = new OtherStudies();
                $model->id_user = $id_user;
                return view('academicTraining.saveOthersStudies', compact('objUser','model'));
            }

            $objOtherStudies = OtherStudies::where('id', $id)->first();

            if($objOtherStudies == null) {
                Alert()->error('Ocurrió un problema para procesar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
                return redirect()->action('Profile\StaffManagementController@index');
            }

            $model = new OtherStudies();

            $model->id = $objOtherStudies->id;
            $model->name_school = $objOtherStudies->name_school;
            $model->name_studie = $objOtherStudies->name_studie;
            $model->type_studie = $objOtherStudies->type_studie;
            $model->hours = $objOtherStudies->hours;
            $model->date_begin_oe = (is_null($objOtherStudies->date_begin)) ? null : Carbon::parse($objOtherStudies->date_begin)->format('d-m-Y');
            $model->date_end_oe = (is_null($objOtherStudies->date_end)) ? null : Carbon::parse($objOtherStudies->date_end)->format('d-m-Y');
            $model->url_certificate = $objOtherStudies->url_certificate;
            $model->path_certificate = $objOtherStudies->path_certificate;
            $model->state_validation = $objOtherStudies->state_validation;
            $model->id_user = $objOtherStudies->id_user;

            return view('academicTraining.saveOthersStudies', compact('objUser', 'model'));
        }
        catch (\Exception $e) {
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect()->action('Profile\StaffManagementController@index');
        }

    }

    public function postOtherStudies(Request $request)
    {
        /*$this->validate($request,[
            'name_school' => 'required|max:100',
            'name_studie' => 'required|max:180',
            'type_studie' => 'required|max:100',
            'hours' => 'required',
            'date_begin_oe' => 'required',
            'date_end_oe' => 'required',
            'id_user' => 'required',
            'url_certificate' => 'mimes:pdf'
        ]);*/

        try
        {
            if(empty($request->id)){
                $objOtherStudies = new OtherStudies();
            }
            else{
                $objOtherStudies = OtherStudies::find($request->id);
                if(empty($objOtherStudies)){
                    Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
                    return redirect()->action('Profile\StaffManagementController@index');
                }
            }

            $objOtherStudies->id_user = $request->id_user;
            $objOtherStudies->name_school = $request->name_school;
            $objOtherStudies->name_studie = $request->name_studie;
            $objOtherStudies->type_studie = $request->type_studie;
            $objOtherStudies->hours = $request->hours;
            $objOtherStudies->date_begin = Carbon::parse($request->date_begin_oe);
            $objOtherStudies->date_end = is_null($request->date_end_oe) ? null :Carbon::parse($request->date_end_oe);

            $end = Carbon::parse($objOtherStudies->date_end);
            $begin = Carbon::parse($objOtherStudies->date_begin);

            $diff_days = is_null($request->date_end_oe) ? Carbon::parse($request->date_begin_oe) : $end->diff($begin);

            $objOtherStudies->years_diff = is_null($request->date_end_oe) ? $diff_days->year : $diff_days->y;
            $objOtherStudies->months_diff = is_null($request->date_end_oe) ? $diff_days->month : $diff_days->m;
            $objOtherStudies->days_diff = is_null($request->date_end_oe) ? $diff_days->day : $diff_days->d;



            if(!empty($request->url_certificate))
            {
                if(!empty($request->path_certificate))
                {
                    \Storage::delete($objOtherStudies->path_certificate);
                }

                $file = $request->url_certificate;
                $filename = $file->store('public/ai/constancy');
                $objOtherStudies->path_certificate = '/' . $filename;
                $objOtherStudies->url_certificate = '/storage/' . explode('/',$filename)[1] . '/' . explode('/',$filename)[2]. '/'  . explode('/',$filename)[3];

            }

            $objOtherStudies->save();

            Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
            return redirect()->action('Profile\AcademicTrainingController@getAll', [ 'id' => $objOtherStudies->id_user ] );
        }
        catch (\Exception $e) {
            return $e->getMessage();
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect()->action('Profile\StaffManagementController@index');
        }
    }

    public function getAll($id = null)
    {
        try
        {
            if($id == null) {
                $objUser = Auth::user();
                $id = $objUser->id;
            }
            else {
                $objUser = User::select('id', 'name', 'first_surname', 'second_surname')->find($id);
            }

            //GUARDAR EN SESION USUARIO QUE SE ESTA GESTIONANDO
            $objmnguser = User::select('id', 'name')->find($id);

            Session::put('userName', $objmnguser->name );
            Session::put('userId', $objmnguser->id );

            $departments = DB::table('department')->orderBy('name', 'asc')->get();

            /*$objPrimaryEducation = PrimaryEducation::join('district as d','d.id','primary_education.id_district')
                ->join('province as p','p.id','primary_education.id_province')
                ->join('department as de','de.id','primary_education.id_department')
                ->select('primary_education.id', 'primary_education.name_school', 'primary_education.url_certificate as url', 'primary_education.date_begin as fechainicio', 'primary_education.date_end as fechafin', 'primary_education.id_user', 'primary_education.id_district', 'primary_education.id_department',
                    'primary_education.id_province', 'primary_education.state_validation as state','d.name as distrito','p.name as provincia','de.name as departamento', 'primary_education.deleted_at')
                ->where('primary_education.id_user', $id)->first();*/

            $objPrimaryEducation = PrimaryEducation::select('primary_education.id', 'primary_education.name_school', 'primary_education.url_certificate as url', 'primary_education.date_begin as fechainicio', 'primary_education.date_end as fechafin', 'primary_education.id_user', 'primary_education.id_district as distrito', 'primary_education.id_department as departamento',
                'primary_education.id_country as pais', 'primary_education.id_province as provincia', 'primary_education.state_validation as state', 'primary_education.deleted_at')
                ->where('primary_education.id_user', $id)->first();


/*            $objSecondaryEducation = SecondaryEducation::join('district as d','d.id','secondary_education.id_district')
                ->join('province as p','p.id','secondary_education.id_province')
                ->join('department as de','de.id','secondary_education.id_department')
                ->select('secondary_education.id', 'secondary_education.name_university as secondary', 'secondary_education.url_certificate as url',
                    'secondary_education.date_begin as fechainicio', 'secondary_education.date_end as fechafin', 'secondary_education.id_user', 'secondary_education.id_district', 'secondary_education.id_department',
                    'secondary_education.id_province', 'secondary_education.state_validation as state','d.name as distrito','p.name as provincia','de.name as departamento', 'secondary_education.deleted_at')
                ->where('secondary_education.id_user', $id)->first();*/

            $objSecondaryEducation = SecondaryEducation::select('secondary_education.id', 'secondary_education.name_university as secondary', 'secondary_education.url_certificate as url',
                    'secondary_education.date_begin as fechainicio', 'secondary_education.date_end as fechafin', 'secondary_education.id_user', 'secondary_education.id_district as distrito', 'secondary_education.id_department as departamento',
                    'secondary_education.id_country as pais','secondary_education.id_province as provincia', 'secondary_education.state_validation as state', 'secondary_education.deleted_at')
                ->where('secondary_education.id_user', $id)->first();

            /*$listUniversityEducation = UniversityEducation::join('district as d','d.id','university_education.id_district')
                ->join('province as p','p.id','university_education.id_province')
                ->join('department as de','de.id','university_education.id_department')
                ->select('university_education.id', 'university_education.name_university as university', 'university_education.url_certificate as url', 'university_education.date_begin as fechainicio',
                    'university_education.date_end as fechafin', 'university_education.concentration', 'university_education.id_user', 'university_education.id_district', 'university_education.id_department',
                    'university_education.id_province', 'university_education.state_validation as state','d.name as distrito','p.name as provincia','de.name as departamento', 'university_education.deleted_at')
                ->where('university_education.id_user', $id)->get();*/

            $listUniversityEducation = UniversityEducation::select('university_education.id', 'university_education.name_university as university', 'university_education.url_certificate as url', 'university_education.date_begin as fechainicio',
                    'university_education.date_end as fechafin', 'university_education.concentration', 'university_education.id_user', 'university_education.id_district as distrito', 'university_education.id_department as departamento',
                'university_education.id_country as pais', 'university_education.id_province as provincia', 'university_education.state_validation as state', 'university_education.deleted_at')
                ->where('university_education.id_user', $id)->get();

         /*   $listProfessionalTitle = ProfessionalTitle::join('district as d','d.id','professional_title.id_district')
                ->join('province as p','p.id','professional_title.id_province')
                ->join('department as de','de.id','professional_title.id_department')
                ->select('professional_title.id', 'professional_title.name_college as college', 'professional_title.url_certificate as url', 'professional_title.date_begin as fechainicio',
                    'professional_title.date_end as fechafin', 'professional_title.concentration', 'professional_title.id_user', 'professional_title.id_district', 'professional_title.id_department',
                    'professional_title.date_register_title', 'professional_title.number_register_title', 'professional_title.id_province', 'professional_title.state_validation as state', 'professional_title.deleted_at',
                    'd.name as distrito','p.name as provincia','de.name as departamento')
                ->where('professional_title.id_user', $id)->get();*/

            $listProfessionalTitle = ProfessionalTitle::select('professional_title.id', 'professional_title.name_college as college', 'professional_title.url_certificate as url', 'professional_title.date_begin as fechainicio',
                    'professional_title.date_end as fechafin', 'professional_title.concentration', 'professional_title.id_user', 'professional_title.id_district as distrito', 'professional_title.id_department as departamento',
                    'professional_title.date_register_title', 'professional_title.number_register_title', 'professional_title.id_country as pais', 'professional_title.id_province as provincia', 'professional_title.state_validation as state', 'professional_title.deleted_at')
                ->where('professional_title.id_user', $id)->get();

            $objTuitionInformation = TuitionInformation::select('tuition_information.id', 'tuition_information.number_tuition as number', 'tuition_information.url_certificate as url',
                'tuition_information.id_user', 'tuition_information.state_validation as state', 'tuition_information.deleted_at')
                ->where('tuition_information.id_user', $id)->get();

            $listMasterDoctorDegree = MasterDoctorDegree::select('master_doctor_degree.id', 'master_doctor_degree.name_school as college', 'master_doctor_degree.concentration', 'master_doctor_degree.date_expedition as expedation',
                'master_doctor_degree.id_user', 'master_doctor_degree.state_validation as state', 'master_doctor_degree.date_begin as fechainicio', 'master_doctor_degree.date_end as fechafin',
                'master_doctor_degree.url_certificate as url', 'master_doctor_degree.deleted_at')
                ->where('master_doctor_degree.id_user', $id)->get();

            $listPostGraduate = PostgraduateInformation::select('postgraduate_information.id', 'postgraduate_information.name_school as college', 'postgraduate_information.concentration', 'postgraduate_information.date_expedition as expedation',
                'postgraduate_information.id_user', 'postgraduate_information.state_validation as state', 'postgraduate_information.date_begin as fechainicio', 'postgraduate_information.date_end as fechafin',
                'postgraduate_information.url_certificate as url', 'postgraduate_information.hours', 'postgraduate_information.deleted_at')
                ->where('postgraduate_information.id_user', $id)->get();

            $listOthersStudies = OtherStudies::select('others_studies.id', 'others_studies.name_school as college', 'others_studies.name_studie', 'others_studies.type_studie',
                'others_studies.id_user', 'others_studies.state_validation as state', 'others_studies.date_begin as fechainicio', 'others_studies.date_end as fechafin',
                'others_studies.url_certificate as url', 'others_studies.hours', 'others_studies.deleted_at')
                ->where('others_studies.id_user', $id)->get();

            return view('academicTraining.allStudies',
                compact('objUser','objPrimaryEducation', 'objSecondaryEducation', 'listUniversityEducation',
                    'listProfessionalTitle', 'objTuitionInformation', 'listMasterDoctorDegree', 'listPostGraduate',
                    'listOthersStudies','departments'));
        }
        catch (\Exception $e)
        {
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect()->action('Profile\StaffManagementController@index');
        }
    }

    #region DELETE

    public function deleteUniversityEducation(Request $request){
        try{
            UniversityEducation::where("id", $request->data_id)->forceDelete();
            Alert()->success('Registro Eliminado correctamente', 'Eliminado')->persistent('Ok');
            return redirect()->back();
        }catch (\Exception $e){
            Alert()->error($e->getMessage(), 'Ocurrio un Error')->persistent('Ok');
            return redirect()->back();
        }
    }

    public function deleteProfessionalTitle(Request $request){
        try{
            ProfessionalTitle::where("id", $request->data_id)->forceDelete();
            Alert()->success('Registro Eliminado correctamente', 'Eliminado')->persistent('Ok');
            return redirect()->back();
        }catch (\Exception $e){
            Alert()->error($e->getMessage(), 'Ocurrio un Error')->persistent('Ok');
            return redirect()->back();
        }
    }

    public function deleteMasterDoctorDegree(Request $request){
        try{
            MasterDoctorDegree::where("id", $request->data_id)->forceDelete();
            Alert()->success('Registro Eliminado correctamente', 'Eliminado')->persistent('Ok');
            return redirect()->back();
        }catch (\Exception $e){
            Alert()->error($e->getMessage(), 'Ocurrio un Error')->persistent('Ok');
            return redirect()->back();
        }
    }

    public function deletePostgraduateInformation(Request $request){
        try{
            PostgraduateInformation::where("id", $request->data_id)->forceDelete();
            Alert()->success('Registro Eliminado correctamente', 'Eliminado')->persistent('Ok');
            return redirect()->back();
        }catch (\Exception $e){
            Alert()->error($e->getMessage(), 'Ocurrio un Error')->persistent('Ok');
            return redirect()->back();
        }
    }

    public function deleteOtherStudies(Request $request){
        try{
            OtherStudies::where("id", $request->data_id)->forceDelete();
            Alert()->success('Registro Eliminado correctamente', 'Eliminado')->persistent('Ok');
            return redirect()->back();
        }catch (\Exception $e){
            Alert()->error($e->getMessage(), 'Ocurrio un Error')->persistent('Ok');
            return redirect()->back();
        }
    }


    #endregion

}
