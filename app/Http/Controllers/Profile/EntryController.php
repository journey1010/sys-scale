<?php

namespace App\Http\Controllers\Profile;

use App\Models\ResolutionType;
use App\Models\Section;
use App\Models\SectionAnnex;
use App\ViewModels\Entry\EditViewModel;
use App\ViewModels\Entry\IndexViewModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Entry;
use Session;

class EntryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id = null){

        try{

            if($id == null) return view('entry.index');

            //GUARDAR EN SESION USUARIO QUE SE ESTA GESTIONANDO
            $objUser = User::select('id', 'name')->find($id);

            Session::put('userName', $objUser->name );
            Session::put('userId', $objUser->id );

            //DECLARO MODELO PARA LA VISTA
            $model = new IndexViewModel();

            //OBTENER LOS TIPOS DE RESOLUCIONES ASOCIADOS A LA SECCIÓN
            $section_Result = Section::where('alias','=','ingresosReingresos')->select('name','id')->get();
            $section = $section_Result->first();

            $model->resolutions = ResolutionType::join('section_resolution_type','resolution_type.id','section_resolution_type.id_resolution_type')
                ->join('section','section.id','section_resolution_type.id_section')
                ->where('section.id', '=', $section->id)
                ->select('resolution_type.id','resolution_type.description', 'section.id as section_id')
                ->get();



            $model->entries = Entry::where('id_user','=', $id)->get();
            $model->user_id = $id;
            $model->section_id = $section->id;

            $section_annexes = SectionAnnex::where([['id_section','=',$section->id],['id_user','=',$id]])->get();

            return view('entry.index', compact('model', 'section_annexes'));

        } catch(\Exception $e){
            return view('entry.index', compact('model'));
        }
    }

    public function detail($id = null){

        try{
            if($id == null) return view('/');

            $model = new EditViewModel();

            $entry = Entry::find($id);

            $model->resolutionNumber = $entry->resolutionNumber;
            $model->resolutionType = $entry->resolutionType;
            $model->issueDate = $entry->issueDate;
            $model->issuingOrgan = $entry->issuingOrgan;
            $model->startDate = $entry->startDate;
            $model->endDate = $entry->endDate;
            $model->description = $entry->description;
            $model->constancyUrl = $entry->constancyUrl;
            $model->state = $entry->state;
            $model->id_user = $entry->id_user;

            return view('entry.detail', compact('model'));

        } catch(\Exception $e){
            return view('/');
        }
    }

    public function edit($id = null){
        try{
            if($id == null) return view('/');

            $model = new EditViewModel();

            $entry = Entry::find($id);

            $model->id = $entry->id;
            $model->resolutionNumber = $entry->resolutionNumber;
            $model->resolutionType = $entry->resolutionType;
            $model->issueDate = $entry->issueDate;
            $model->issuingOrgan = $entry->issuingOrgan;
            $model->startDate = $entry->startDate;
            $model->endDate = $entry->endDate;
            $model->description = $entry->description;
            $model->constancyUrl = $entry->constancyUrl;
            $model->state = $entry->state;
            $model->id_user = $entry->id_user;

            return view('entry.edit', compact('model'));

        } catch(\Exception $e){
            return view('/');
        }
    }

    public function editPost(Request $request){

        $this->validate($request,[
            'id' => 'required',
            'resolutionNumber' => 'required|max:20',
            'resolutionType' => 'required|max:50',
            'issueDate' => 'required',
            'issuingOrgan' => 'required|max:100',
            'startDate' => 'required',
            'endDate' => 'required',
            'description' => 'required|max:500',
            'constancyUrl' => 'required|mimes:pdf'
        ]);

        try{
            $result = Entry::find($request->id);

            $result->resolutionNumber = $request->resolutionNumber;
            $result->resolutionType = $request->resolutionType;
            $result->issueDate = Carbon::parse($request->issueDate);
            $result->issuingOrgan = $request->issuingOrgan;
            $result->startDate = Carbon::parse($request->startDate);
            $result->endDate = Carbon::parse($request->endDate);
            $result->description = $request->description;
            $result->updated_at = Carbon::now();

            if(!empty($request->constancyUrl))
            {
                if(!empty($request->constancyPath))
                {
                    $file = $request->constancyUrl;
                    $filename = $file->store('public/constancy');
                    $result->constancyPath = '/' . $filename;
                    $result->constancyUrl = '/storage/' . explode('/',$filename)[1] . '/' . explode('/',$filename)[2];
                }
                else
                {
                    \Storage::delete($result->constancyPath);
                    $file = $request->constancyUrl;
                    $filename = $file->store('public/constancy');
                    $result->constancyPath = '/' . $filename;
                    $result->constancyUrl = '/storage/' . explode('/',$filename)[1] . '/' . explode('/',$filename)[2];
                }
            }

            $result->save();

            return Redirect('/entries/index/'.$result->id_user);

        } catch(\Exception $e){
            $result = Entry::find($request->id);
            return Redirect('/entries/index/'.$result->id_user);
        }
    }

    public function create($user_id = null){
        try{
            $model = new EditViewModel();

            $model->id_user = $user_id;

            return view('entry.create', compact('model'));

        } catch(\Exception $e){
            return Redirect('/entries/index/'.$user_id);
        }
    }

    public function createPost(Request $request){

        $this->validate($request,[
             'dependency' => 'require',
            'category' => 'require',
            'charge' => 'require',
        ]);

        try{

            $entry = [
                'tipo' => $request->tipo,
                'contract_time_years' => $request->contract_time_years,
                'contract_time_months' => $request->contract_time_months,
                'contract_time_days' => $request->contract_time_days,
                'dependency' => $request->dependency,
                'category' => $request->category,
                'charge' => $request->charge,
                'id_user' => $request->id_user,
                'id_resolution' => $request->id_resolution,
            ];

            Entry::create($entry);

            Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
            return back();

        } catch(\Exception $e){
            Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            return redirect()->action('Profile\StaffManagementController@index');
        }
    }
}
