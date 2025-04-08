<?php

namespace App\Http\Controllers\Profile;

use App\Models\AffiliationDocument;
use App\Models\Dependence;
use App\Models\LaborConditional;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PersonalIdentification\PersonalIdentification;
use App\Models\PersonalIdentification\PersonalIdentificationSibling;
use App\Models\PersonalIdentification\PersonalIdentificationParent;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;
use Alert;


class PersonalIdentificationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id = null)
    {
        try {

            $objUser = User::select('id', 'name')->find($id);


            if(is_null($objUser))
            {
                alert()->warning('Esta ingresando a un enlace no valido', '¡ Advertencia !')->persistent('Aceptar');
                return redirect('staff_management');
            }

            Session::put('userName', $objUser->name );
            Session::put('userId', $objUser->id );


            $rec = PersonalIdentification::where('id_user','=',$objUser->id)->get()->first();


            $Afill = AffiliationDocument::find($rec->id_affiliation_document);

            return view('personalIdentification.index', compact('id','Afill'));
        }
        catch (Exception $e)
        {
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }

    }

    public function postData(Request $request)
    {
        try
        {

            $rec = AffiliationDocument::find($request['invisible']);

            $A = $request->foto_size_carnet;

            if (!empty($request->foto_size_carnet)) {
                $A = $A->store('public/affiliationdocument');
                $rec->path_foto_size_carnet = '/' . $A;
                $rec->foto_size_carnet = '/storage/' . explode('/', $A)[1] . '/' . explode('/', $A)[2];
            }


            $B = $request->job_app;

            if (!empty($request->job_app))
            {
                $B = $B->store('public/affiliationdocument');
                $rec->path_job_app = '/' . $B;
                $rec->job_app = '/storage/' . explode('/', $B)[1] . '/' . explode('/', $B)[2];
            }


            $C = $request->home_certificate;

            if (!empty($request->home_certificate))
            {
                $C = $C->store('public/affiliationdocument');
                $rec->path_home_certificate = '/' . $C;
                $rec->home_certificate = '/storage/' . explode('/', $C)[1] . '/' . explode('/', $C)[2];
            }


            $D = $request->presentatio_document;

            if (!empty($request->presentatio_document))
            {
                $D = $D->store('public/affiliationdocument');
                $rec->path_presentatio_document = '/' . $D;
                $rec->presentatio_document = '/storage/' . explode('/', $D)[1] . '/' . explode('/', $D)[2];
            }


            $E = $request->declaration_sworn_goods;

            if (!empty($request->declaration_sworn_goods))
            {
                $E = $E->store('public/affiliationdocument');
                $rec->path_declaration_sworn_goods = '/' . $E;
                $rec->declaration_sworn_goods = '/storage/' . explode('/', $E)[1] . '/' . explode('/', $E)[2];
            }


            $F = $request->health_certificate;

            if (!empty($request->health_certificate))
            {
                $F = $F->store('public/affiliationdocument');
                $rec->path_health_certificate = '/' . $F;
                $rec->health_certificate = '/storage/' . explode('/', $F)[1] . '/' . explode('/', $F)[2];
            }


            $G = $request->judicial_certificate;

            if (!empty($request->judicial_certificate))
            {
                $G = $G->store('public/affiliationdocument');
                $rec->path_judicial_certificate = '/' . $G;
                $rec->judicial_certificate = '/storage/' . explode('/', $G)[1] . '/' . explode('/', $G)[2];
            }


            $H = $request->police_certificate;

            if (!empty($request->police_certificate))
            {
                $H = $H->store('public/affiliationdocument');
                $rec->path_police_certificate = '/' . $H;
                $rec->police_certificate = '/storage/' . explode('/', $H)[1] . '/' . explode('/', $H)[2];
            }


            $I = $request->birth_certificate;

            if (!empty($request->birth_certificate))
            {
                $I = $I->store('public/affiliationdocument');
                $rec->path_birth_certificate = '/' . $I;
                $rec->birth_certificate = '/storage/' . explode('/', $I)[1] . '/' . explode('/', $I)[2];
            }


            $J = $request->title_nationalized;

            if (!empty($request->title_nationalized))
            {
                $J = $J->store('public/affiliationdocument');
                $rec->path_title_nationalized = '/' . $J;
                $rec->title_nationalized = '/storage/' . explode('/', $J)[1] . '/' . explode('/', $J)[2];
            }


            $K = $request->marriage_certificate_nationality;

            if (!empty($request->marriage_certificate_nationality))
            {
                $K = $K->store('public/affiliationdocument');
                $rec->path_marriage_certificate_nationality = '/' . $K;
                $rec->marriage_certificate_nationality = '/storage/' . explode('/', $K)[1] . '/' . explode('/', $K)[2];
            }


            $L = $request->country_visa;

            if (!empty($request->country_visa))
            {
                $L = $L->store('public/affiliationdocument');
                $rec->path_country_visa = '/' . $L;
                $rec->country_visa = '/storage/' . explode('/', $L)[1] . '/' . explode('/', $L)[2];
            }


            $LL = $request->resolution_disability;

            if (!empty($request->resolution_disability))
            {
                $LL = $LL->store('public/affiliationdocument');
                $rec->path_resolution_disability = '/' . $LL;
                $rec->resolution_disability = '/storage/' . explode('/', $LL)[1] . '/' . explode('/', $LL)[2];
            }


            $M = $request->copy_essalud;

            if (!empty($request->copy_essalud))
            {
                $M = $M->store('public/affiliationdocument');
                $rec->path_copy_essalud = '/' . $M;
                $rec->copy_essalud = '/storage/' . explode('/', $M)[1] . '/' . explode('/', $M)[2];
            }


            $N = $request->document_fap;

            if (!empty($request->document_fap))
            {
                $N = $N->store('public/affiliationdocument');
                $rec->path_document_fap = '/' . $N;
                $rec->document_fap = '/storage/' . explode('/', $N)[1] . '/' . explode('/', $N)[2];
            }


            $O = $request->cv;

            if (!empty($request->cv))
            {
                $O = $O->store('public/affiliationdocument');
                $rec->path_cv = '/' . $O;
                $rec->cv = '/storage/' . explode('/', $O)[1] . '/' . explode('/', $O)[2];
            }


            $P = $request->dni_legalized;

            if (!empty($request->dni_legalized))
            {
                $P = $P->store('public/affiliationdocument');
                $rec->path_dni_legalized = '/' . $P;
                $rec->dni_legalized = '/storage/' . explode('/', $P)[1] . '/' . explode('/', $P)[2];
            }


            $Q = $request->marriage_certificate;

            if (!empty($request->marriage_certificate))
            {
                $Q = $Q->store('public/affiliationdocument');
                $rec->path_marriage_certificate = '/' . $Q;
                $rec->marriage_certificate = '/storage/' . explode('/', $Q)[1] . '/' . explode('/', $Q)[2];
            }


            $R = $request->notarial_of_coexistence;

            if (!empty($request->notarial_of_coexistence))
            {
                $R = $R->store('public/affiliationdocument');
                $rec->path_notarial_of_coexistence = '/' . $R;
                $rec->notarial_of_coexistence = '/storage/' . explode('/', $R)[1] . '/' . explode('/', $R)[2];
            }


            $S = $request->children_document;

            if (!empty($request->children_document))
            {
                $S = $S->store('public/affiliationdocument');
                $rec->path_children_document = '/' . $S;
                $rec->children_document = '/storage/' . explode('/', $S)[1] . '/' . explode('/', $S)[2];
            }



            $T = $request->nationality_document;

            if (!empty($request->nationality_document))
            {
                $T = $T->store('public/affiliationdocument');
                $rec->path_nationality_document = '/' . $T;
                $rec->nationality_document = '/storage/' . explode('/', $T)[1] . '/' . explode('/', $T)[2];
            }



            $rec->save();

            return back();
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function sheet($id = null)
    {
        try {

            $user = User::find($id);

            $personalIdentification = PersonalIdentification::where('id_user','=',$id)->first();


            if(is_null($personalIdentification))
            {
                alert()->warning('Esta ingresando a un enlace no valido', '¡ Advertencia !')->persistent('Aceptar');
                return redirect('staff_management');
            }

            $rec = PersonalIdentification::where('id_user','=',$id)->get()->first();

            $Afill = AffiliationDocument::find($rec->id_affiliation_document);

            $personalIdentificationSibling = PersonalIdentificationSibling::where('id_user', $id)->get();
            if ($personalIdentificationSibling == null)
                $personalIdentificationSibling = array();

            $personalIdentificationParent = PersonalIdentificationParent::where('id_user', $id)->get();
            if ($personalIdentificationParent == null)
                $personalIdentificationParent = array();

            $select_birthDepartment = DB::table('department')->where('id', $personalIdentification->birth_id_department)->select('name')->first();
            $birth_department = $select_birthDepartment ? $select_birthDepartment->name : null;

            $select_birthProvince = DB::table('province')->where('id', $personalIdentification->birth_id_province)->select('name')->first();
            $birth_province = $select_birthProvince ? $select_birthProvince->name : null;

            $select_birthDistrict = DB::table('district')->where('id', $personalIdentification->birth_id_district)->select('name')->first();
            $birth_district = $select_birthDistrict ? $select_birthDistrict->name : null;

            $select_homeDepartment = DB::table('department')->where('id', $personalIdentification->home_id_department)->select('name')->first();
            $home_department = $select_homeDepartment ? $select_homeDepartment->name : null;

            $select_homeProvince = DB::table('province')->where('id', $personalIdentification->home_id_province)->select('name')->first();
            $home_province = $select_homeProvince ? $select_homeProvince->name : null;

            $select_homeDistrict = DB::table('district')->where('id', $personalIdentification->home_id_district)->select('name')->first();
            $home_district = $select_homeDistrict ? $select_homeDistrict->name : null;

            $departments = DB::table('department')->orderBy('name', 'asc')->get();


            $dependence = Dependence::orderBy('name','desc')->get()->pluck('name','id')->toArray();


            $laborconditional = LaborConditional::orderBy('name','desc')->get()->pluck('name','id')->toArray();




            return view('personalIdentification.sheet', compact(
                    'user',
                    'personalIdentification',
                    'personalIdentificationSibling',
                    'personalIdentificationParent',
                    'birth_department',
                    'birth_province',
                    'birth_district',
                    'home_department',
                    'Afill',
                    'home_province',
                    'home_district','id', 'departments','dependence','laborconditional'
                )
            );

        }
        catch (Exception $e)
        {
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }

    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'dni' => 'max:8',
        ]);

        try {


            $objuser = User::find($request['invisible']);

            if(!empty($request['nombres']) && !empty($request['apellidoPaterno']) && !empty($request['apellidoMaterno']))
            {
                $objuser->name = $request['nombres'];
                $objuser->first_surname = $request['apellidoPaterno'];
                $objuser->second_surname = $request['apellidoMaterno'];

                $objuser->save();
            }


            $PI = PersonalIdentification::where('id_user','=',$request['invisible'])
                ->select('photo_path','photo_url')->first();

            if (!empty($request->photo))
            {
                if ($PI->photo_path != null)
                {
                    \Storage::delete($PI->photo_path);
                }
                $file = $request->photo;
                $filename = $file->store('public/personalIdentification');
                $photo_path = '/' . $filename;
                $photo_url = '/storage/' . explode('/', $filename)[1] . '/' . explode('/', $filename)[2];
            }
            else
            {
                $photo_path = $PI->photo_path;
                $photo_url = $PI->photo_url;
            }


            $arr = [
                'photo_path' => $photo_path,
                'photo_url' => $photo_url,
                'modular_code' => $request['codigoModular'],
                'birth_date' => Carbon::parse($request['fechaNacimiento']), // FECHA
                'birth_id_department' => $request['birth_id_department'],
                'birth_id_province' => $request['provinciaNacimiento'],
                'birth_id_district' => $request['distritoNacimiento'],
                'address' => $request['domicilioActual'],
                'home_id_department' => $request['home_id_department'],
                'home_id_province' => $request['provinciaVivienda'],
                'home_id_district' => $request['distritoVivienda'],
                'phone' => $request['telefonoFijo'],
                'cellphone' => $request['telefonoCelular'],
                'email' => $request['email'],
                'dni' => $request['dni'],
                'sex' => $request['sex'],
                'blood_type' => $request['blood_type'],
                'category' => $request['category'],
                'position' => $request['position'],
                'employment_regime' => $request['employment_regime'],
                'pension_regime' => $request['pension_regime'],
                'pension_system' => $request['pension_system'],
                'affiliation_date' => Carbon::parse($request['fechaAfiliacion']), // FECHA
                'cuspp' => $request['cuspp'],
                'essalud' => $request['essalud'],
                'civil_status' => $request['civil_status'],
                'spouse_name' => $request['nombresConyugue'],
                'spouse_surname' => $request['apellidosConyugue'],
                'id_labor_conditional' => $request['labor_conditional'],
                'id_dependence' => $request['dependence'],
            ];
            PersonalIdentification::where('id_user','=',$request['invisible'])->update($arr);



            if(!is_null($request['estadoV_padre']))
            {
                for($i = 0; $i < count($request['estadoV_padre']); $i++)
                {
                    if(is_null($request['nombre_padre'][$i]) || is_null($request['nombre_padre'][$i]))
                    {
                        alert()->warning('Es obligatorio el llenado completo de datos del padre', '¡ Atención !')->persistent('Aceptar');
                        return redirect('personal_identification/sheet/'.$request['invisible']);
                    }

                    $padres = [
                        'name' => $request['nombre_padre'][$i],
                        'surname' => $request['apellido_padre'][$i],
                        'life_state' => $request['estadoV_padre'][$i],
                        'id_user' => $request['invisible']
                    ];

                    PersonalIdentificationParent::create($padres);
                }
            }


            if(!is_null($request['fechaN_hijo']))
            {
                for($i = 0; $i < count($request['fechaN_hijo']); $i++)
                {
                    if(is_null($request['nombre_hijo'][$i]) || is_null($request['apellido_hijo'][$i]))
                    {
                        alert()->warning('Es obligatorio el llenado completo de datos del hijo', '¡ Atención !')->persistent('Aceptar');
                        return redirect('personal_identification/sheet/'.$request['invisible']);
                    }
                    $hijos = [
                        'name' => $request['nombre_hijo'][$i],
                        'surname' => $request['apellido_hijo'][$i],
                        'sex' => $request['sexo_hijo'][$i],
                        'birth_date' => Carbon::parse($request['fechaN_hijo'][$i]),
                        'id_user' => $request['invisible']
                    ];

                    PersonalIdentificationSibling::create($hijos);
                }
            }



            return back();
        }
        catch (Exception $e)
        {
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }
    }

    public function open(Request $request)
    {
        try
        {

        }
        catch (\Exception $e)
        {
            return null;
        }
    }

    public function getProvinces(Request $request)
    {
        $id_department = $request->input('id_department');
        $provinces = DB::table('province')->where('id_department', $id_department)->orderBy('name', 'asc')->get();
        return $provinces;
    }

    public function getDistricts(Request $request)
    {
        $id_province = $request->input('id_province');
        $districts = DB::table('district')->where('id_province', $id_province)->orderBy('name', 'asc')->get();
        return $districts;
    }

}