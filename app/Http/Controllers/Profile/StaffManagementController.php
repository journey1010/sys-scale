<?php

namespace App\Http\Controllers\Profile; 

use App\Models\AffiliationDocument;
use App\Models\PersonalIdentification\PersonalIdentification;
use App\ViewModels\StaffManagement\UserViewModel;
use Illuminate\Http\Request;
use App\ViewModels\StaffManagement\IndexViewModel;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Session;
use DB;

class StaffManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $model = new IndexViewModel();

        Session::forget('userName' );
        Session::forget('userId' );

        try{
            $model->users = User::join('role_user','role_user.user_id','users.id')
                ->join('roles','roles.id','role_user.role_id')
                ->select('users.name' ,'users.first_surname', 'users.second_surname' ,'users.email','users.id', 'users.username','users.profileEnable')
                ->where('roles.name','=','personal')
                ->get();

        } catch (\Exception $e){
            return route('/');
        }

        return view('staffManagement.index', compact('model'));
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:191',
            'first_surname' => 'required|max:100',
            'second_surname' => 'required|max:100',
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required'
        ]);


        try
        {


            $objUser = User::where('email', '=', $request->email)->first();

            if(empty($objUser)){
                $objUser = new User();
            }
            else{
                Alert()->error('Ya existe un usuario con ese email', 'Ocurrio un error')->persistent('Aceptar');
                return back();
            }

            $objUserDeleted = DB::table("users")->where('email', '=', $request->email)->orWhere('username', '=', $request->username)->first();

            if(empty($objUserDeleted)){

		$objUser->name = $request->name;
            	$objUser->first_surname = $request->input('first_surname');
            	$objUser->second_surname = $request->input('second_surname');
            	$objUser->email = $request->email;
            	$objUser->username = $request->username;
            	$objUser->password = bcrypt($request->password);
		//$objUser->profileEnable = is_null($request->profileEnable) ? 0 : $request->profileEnable;
            	$objUser->profileEnable = true;

            	$objUser->save();

            	DB::table('role_user')->insert([[
                	'user_id' => $objUser->id,
                	'role_id' => DB::table('roles')->where('name', 'personal')->first()->id,
            	]]);


            	$objAffiDoc = new AffiliationDocument();
            	$objAffiDoc->save();


            	DB::table('personal_identification')->insert([[
                	'email' => $objUser->email,
                	'id_user' => $objUser->id,
                	'id_affiliation_document' => $objAffiDoc->id,
                ]]);		

            }
            else{
		$userEnabled = DB::table("users")->where("id",$objUserDeleted->id)->update([
			"deleted_at" => null
		]);

		$roleEnabled = DB::table('role_user')->where("user_id",$objUserDeleted->id)->first();
		if(empty($roleEnabled)){
			DB::table('role_user')->insert([[
                		'user_id' => $objUserDeleted->id,
                		'role_id' => DB::table('roles')->where('name', 'personal')->first()->id,
            		]]);
		}		
            }

            Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
            return redirect()->action('Profile\StaffManagementController@index');
        }
        catch (\Exception $e) {
		Alert()->error('No pudimos completar su solicitud', 'Ocurrio un error')->persistent('Aceptar');
            	return redirect()->action('Profile\StaffManagementController@index');
        }
    }

    public function edit(Request $request)
    {
        try
        {
            $this->validate($request,[
                'name' => 'required|max:191',
                'first_surname' => 'required|max:100',
                'second_surname' => 'required|max:100',
                'email' => 'required|email',
                'username' => 'required'
            ]);


            if(is_null($request->invisible_update)){
                Alert()->warning('Ocurrio un error al actualizar los datos del usuario', 'Advertencia')->persistent('Aceptar');
                return null;
            }

            $e = $request->email;
            $u = $request->username;
            $aux = User::where('id','!=',$request->invisible_update)
                ->where(function ($w) use ($e,$u){
                    $w->where('email','=',$e)
                        ->orWhere('username','=',$u);
                })->first();

            if(!is_null($aux)){
                Alert()->warning("El correo o usuario ya estan siendo utilizados", 'Advertencia')->persistent('Aceptar');
                return redirect()->action('Profile\StaffManagementController@index');

            }



            $aux = User::find($request->invisible_update);

            $aux->name = $request->name;
            $aux->first_surname = $request->first_surname;
            $aux->second_surname = $request->second_surname;
            $aux->email = $request->email;
            $aux->username = $request->username;
//            $aux->profileEnable = is_null($request->profileEnable) ? 0 : 1;
            if(!is_null($request->password) && !(Hash::check($request->password, $aux->password)))
                $aux->password = bcrypt($request->password);

            $aux->save();


            Alert()->success('Se actualizaron los cambios correctamente','Completado')->persistent('Aceptar');
            return redirect()->action('Profile\StaffManagementController@index');

        }
        catch (\Exception $e)
        {
            Alert()->warning($e->getMessage(), 'Advertencia')->persistent('Aceptar');
            return redirect()->action('Profile\StaffManagementController@index');

        }
    }

    public function delete($id)
    {
        try
        {
            $obj = User::find($id);
            $obj->delete();

            Alert()->success('Eliminado!', 'Se elimino correctamente el usuario')->persistent('Aceptar');
            return 200;
        }
        catch (\Exception $e)
        {
            Alert()->warning('La Dependencia se encuentra en uso.', 'Advertencia')->persistent('Aceptar');
            return null;
        }
    }
}
