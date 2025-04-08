<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Displacement;
use App\Models\EmploymentRegime;
use App\Models\LicensingAuthorization;
use App\Models\PermitAuthorization;
use App\Models\PersonalIdentification\PersonalIdentification;
use App\Models\Province;
use App\Models\ResolutionType;
use App\Models\Section;
use App\Models\User;
use App\Models\VacationAuthorization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try{

            $type_resolution =  ResolutionType::leftjoin('resolution','resolution.id_resolution_type','resolution_type.id')
                ->select('resolution_type.id', 'resolution_type.name', DB::raw('count(resolution.id_resolution_type) as total'))
                ->groupBy('resolution_type.id', 'resolution_type.name','resolution.id_resolution_type')
                ->get();

            $type_section = Section::leftjoin('section_resolution_type','section_resolution_type.id_section','section.id')
                ->select('section.id', 'section.name', DB::raw('count(section_resolution_type.id_section) as total'))
                ->groupBy('section.id', 'section.name','section_resolution_type.id_section')
                ->get();

            $user_resolution =  User::join('resolution','resolution.id_user','users.id')
                ->select('users.name','users.email','users.id', DB::raw('count(users.id) as total'))
    //            ->where('roles.name','=','personal')
                ->groupBy('users.name','users.email','users.id')
                ->get();

        } catch (\Exception $e){
            return route('/');
        }

        return view('reports.resolutions', compact('type_resolution','type_section','user_resolution'));
    }

    public function employments()
    {
        try{
            $employment_regime = PersonalIdentification::select(
                    'employment_regime',
                    DB::raw('count(employment_regime) as total')
                )
                ->whereNotNull('employment_regime')
                ->groupBy('employment_regime')
                ->get();

            $pension_regime = PersonalIdentification::select(
                'pension_regime',
                DB::raw('count(pension_regime) as total')
            )
                ->groupBy('pension_regime')
                ->whereNotNull('pension_regime')
                ->get();

            $pension_system = PersonalIdentification::select(
                'pension_system',
                DB::raw('count(pension_system) as total')
            )
                ->whereNotNull('pension_system')
                ->groupBy('pension_system')
                ->get();

            $users =  User::join('personal_identification','personal_identification.id_user','users.id')
                ->join('role_user','role_user.user_id','users.id')
                ->join('roles','roles.id','role_user.role_id')
                ->select(
                    'users.id',
                    DB::raw('CONCAT(users.name," ",users.first_surname," ",users.second_surname) AS complete_name'),
                    'personal_identification.employment_regime',
                    'personal_identification.pension_regime',
                    'personal_identification.pension_system',
                    'personal_identification.affiliation_date'
                )
                ->where('roles.name','=','personal')
                ->get();

        } catch (\Exception $e){
            return route('/');
        }

        return view('reports.employment', compact('users','employment_regime','pension_regime','pension_system'));
    }

    public function geographical()
    {
        try{
            $department =  Department::leftjoin('personal_identification','personal_identification.home_id_department','department.id')
                ->select('department.id', 'department.name', DB::raw('count(personal_identification.home_id_department) as total'))
                ->groupBy('department.id', 'department.name','personal_identification.home_id_department')
                ->get();

            $province = Province::join('department','department.id','province.id_department')
                ->leftjoin('personal_identification','personal_identification.home_id_province','province.id')
                ->select('province.id', 'province.name', 'department.name as department', DB::raw('count(personal_identification.home_id_province) as total'))
                ->groupBy('province.id', 'province.name', 'department.name','personal_identification.home_id_province')
                ->get();

            $users =  User::join('personal_identification','personal_identification.id_user','users.id')
                ->join('role_user','role_user.user_id','users.id')
                ->join('roles','roles.id','role_user.role_id')
                ->join('department','department.id','personal_identification.home_id_department')
                ->join('province','province.id','personal_identification.home_id_province')
                ->join('district','district.id','personal_identification.home_id_district')
                ->select(
                    'users.id',
                    DB::raw('CONCAT(users.name," ",users.first_surname," ",users.second_surname) AS complete_name'),
                    'department.name as department',
                    'province.name as province',
                    'district.name as district'
                )
                ->where('roles.name','=','personal')
                ->get();
        } catch (\Exception $e){
            return route('/');
        }
        return view('reports.geographical', compact('department','province','users'));
    }

    public function escalafon()
    {
        try{
            $users = User::join('role_user','role_user.user_id','users.id')
                ->join('roles','roles.id','role_user.role_id')
                ->select('users.name','users.email','users.id')
                ->where('roles.name','=','personal')
                ->get();

        } catch (\Exception $e){
            return route('/');
        }

        return view('reports.escalafon', compact('users'));
    }

    public function license()
    {
        try{
            $vacations = VacationAuthorization::join('resolution','resolution.id','vacation_authorization.id_resolution')
                ->join('users','users.id','resolution.id_user')
                ->select(
                    'vacation_authorization.date_end',
                    'vacation_authorization.date_start',
                    'vacation_authorization.anio',
                    'vacation_authorization.number_days',
                    'vacation_authorization.comment',
                    'vacation_authorization.id',
                    'resolution.resolution_number',
                    'resolution.issue_date',
                    DB::raw('CONCAT(users.name," ",users.first_surname," ",users.second_surname) AS complete_name')
                )->get();

            $licenses = LicensingAuthorization::join('resolution','resolution.id','licensing_authorization.id_resolution')
                ->join('users','users.id','resolution.id_user')
                ->select(
                    'licensing_authorization.date_end',
                    'licensing_authorization.date_start',
                    'licensing_authorization.number_days',
                    'licensing_authorization.comment',
                    'licensing_authorization.id',
                    'resolution.resolution_number',
                    'resolution.issue_date',
                    'licensing_authorization.with_remunerations',
                    'licensing_authorization.license_resolution_type',
                    DB::raw('CONCAT(users.name," ",users.first_surname," ",users.second_surname) AS complete_name')
                )->get();

            $permits = PermitAuthorization::join('resolution','resolution.id','permit_authorization.id_resolution')
                ->join('users','users.id','resolution.id_user')
                ->select(
                    'permit_authorization.date_end',
                    'permit_authorization.date_start',
                    'permit_authorization.number_days',
                    'permit_authorization.comment',
                    'permit_authorization.id',
                    'resolution.resolution_number',
                    'resolution.issue_date',
                    'permit_authorization.with_remunerations',
                    'permit_authorization.permit_reason',
                    DB::raw('CONCAT(users.name," ",users.first_surname," ",users.second_surname) AS complete_name')
                )->get();

        } catch (\Exception $e){
            return route('/');
        }

        return view('reports.license', compact('vacations','licenses','permits'));
    }

    public function authorities()
    {
//        try{
            $authorities = User::join('personal_identification','personal_identification.id_user','users.id')
//                ->join('personal_identification','personal_identification.id_user','users.id')
                ->join('labor_conditional','labor_conditional.id','personal_identification.id_labor_conditional')
                ->join('resolution','resolution.id_user','users.id')
//                ->join('resolution','resolution.id_user','users.id')
                ->leftjoin('aditional_carrerpath','aditional_carrerpath.id_resolution','resolution.id')
                ->where('resolution.id_section','=',config('constants.sections.trayectoria_laboral'))
                ->select(
                    DB::raw('CONCAT(users.first_surname," ",users.second_surname) AS surname'),
                    'users.name',
                    'personal_identification.dni',
                    'personal_identification.address',
//                    'personal_identification.position',
                    'aditional_carrerpath.cargo',
                    'aditional_carrerpath.fecha_inicio',
                    'aditional_carrerpath.fecha_cese',
                    'labor_conditional.name as condition',
                    'resolution.resolution_number',
                    'resolution.issue_date'
//                    'resolution.id'
                )
                ->orderBy('users.first_surname')
                ->orderBy('users.second_surname')
                ->orderBy('users.name')
                ->orderBy('resolution.id')
                ->get();
//        } catch (\Exception $e){
//            return route('/');
//        }
        return view('reports.authorities', compact('authorities'));
    }

    public function displacement()
    {
//        try{
        $displacements = Displacement::join('resolution','resolution.id','aditional_fields_displacement_of_personal.id_resolution')
            ->join('users','users.id','aditional_fields_displacement_of_personal.id_user')
            ->join('personal_identification','personal_identification.id_user','users.id')
            ->join('labor_conditional','labor_conditional.id','personal_identification.id_labor_conditional')
            ->select(
                DB::raw('CONCAT(users.first_surname," ",users.second_surname) AS surname'),
                'users.name',
                'aditional_fields_displacement_of_personal.dependencia_origen',
                'aditional_fields_displacement_of_personal.dependencia_destino',
                'resolution.start_date',
                'aditional_fields_displacement_of_personal.tipo',
                'resolution.resolution_number',
                'labor_conditional.name as condition'
            )->get();
//        } catch (\Exception $e){
//            return route('/');
//        }
        return view('reports.displacements', compact('displacements'));
    }

    public function constancy()
    {
        try{
            $users = User::join('role_user','role_user.user_id','users.id')
                ->join('roles','roles.id','role_user.role_id')
                ->select('users.name','users.email','users.id')
                ->where('roles.name','=','personal')
                ->get();

        } catch (\Exception $e){
            return route('/');
        }

        return view('reports.constancies', compact('users'));
    }
}
