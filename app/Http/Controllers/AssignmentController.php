<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\ResolutionType;
use App\Models\SectionAnnex;
use App\Models\Section;
use App\ViewModels\Entry\EditViewModel;
use App\ViewModels\Entry\IndexViewModel;


class AssignmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id = null)
    {
        try{

            //DECLARO MODELO PARA LA VISTA
            $model = new IndexViewModel();

            if($id == null) return view('assignment.index', compact('model'));

            //GUARDAR EN SESION USUARIO QUE SE ESTA GESTIONANDO
            $objUser = User::select('id', 'name')->find($id);

            Session::put('userName', $objUser->name );
            Session::put('userId', $objUser->id );

            //OBTENER LOS TIPOS DE RESOLUCIONES ASOCIADOS A LA SECCIÓN
            $section_Result = Section::where('alias','=','asignacionesIncentivos')->select('name','id')->get();
            $section = $section_Result->first();

            $model->resolutions = ResolutionType::join('section_resolution_type','resolution_type.id','section_resolution_type.id_resolution_type')
                ->join('section','section.id','section_resolution_type.id_section')
                ->where('section.id', '=', $section->id)
                ->select('resolution_type.id','resolution_type.description', 'section.id as section_id')
                ->get();

            $model->user_id = $id;
            $model->section_id = $section->id;

            $section_annexes = SectionAnnex::where('id_section' , '=' , $section->id)->where('id_user' , '=' , $objUser->id)->get();

            return view('assignment.index', compact('model', 'section_annexes'));

        } catch(\Exception $e){
            return view('assignment.index', compact('model'));
        }
    }

    public function resolutions()
    {
        return view('assignment.resolutions');
    }
}