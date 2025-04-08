<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Profile\PersonalIdentificationController;
use App\Models\AffiliationDocument;
use App\Models\Dependence;
use App\Models\LaborConditional;
use App\Models\PersonalIdentification\PersonalIdentification;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class ManageController extends Controller
{
    public function getIndexLaborConditional()
    {
        try
        {
            $list = LaborConditional::All();
            return view('manage.AffiliationManage',compact('list'));
        }
        catch (\Exception $e)
        {
            return null;
        }
    }

    public function getIndexDependenc()
    {
        try
        {
            $list = Dependence::All();
            return view('manage.ConditionDependenceManage',compact('list'));
        }
        catch (\Exception $e)
        {
            return null;
        }
    }


    public function postLaborConditional(Request $request)
    {
        try
        {
            $arr = [
                'name' => $request['name']
            ];

            LaborConditional::create($arr);

            Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
            return redirect('depcon/laborconditional');
        }
        catch (\Exception $e)
        {
            return null;
        }
    }

    public function postLaborConditionalUpdate(Request $request)
    {
        try
        {
         $objeto = LaborConditional::find($request['invisible_update']);
         $objeto->name = $request['name'];
         $objeto->save();

            Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
            return redirect('depcon/laborconditional');
        }
        catch (\Exception $e)
        {
            return null;
        }
    }

    public function postLaborConditionalDelete($id)
    {
        try
        {
            $aux = PersonalIdentification::where('id_labor_conditional','=',$id)->first();

            if(!is_null($aux)){

                Alert()->warning('La condición laboral se encuentra en uso.', 'Advertencia')->persistent('Aceptar');
                return null;
            }
            $obj = LaborConditional::find($id);
            $obj->delete();


            Alert()->success('Se guardaron los cambios', 'Completado!')->persistent('Aceptar');
            return 200;
        }
        catch (\Exception $e)
        {
            Alert()->warning('La condición laboral se encuentra en uso.', 'Advertencia')->persistent('Aceptar');
            return null;
        }
    }

    public function postDependence(Request $request)
    {
        try
        {
            $arr = [
                'name' => $request['name']
            ];

            Dependence::create($arr);

            Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
            return redirect('depcon/dependence');
        }
        catch (\Exception $e)
        {
            Alert()->warning('La Dependencia se encuentra en uso.', 'Advertencia')->persistent('Aceptar');
            return redirect('depcon/dependence');
        }
    }

    public function postDependenceUpdate(Request $request)
    {
        try
        {
            $objeto = Dependence::find($request['invisible_update']);
            $objeto->name = $request['name'];
            $objeto->save();

            Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
            return redirect('depcon/dependence');
        }
        catch (\Exception $e)
        {
            Alert()->warning('No se pudo completar la actualización de datos.', 'Advertencia')->persistent('Aceptar');
            return redirect('depcon/dependence');
        }
    }

    public function postDependenceDelete($id)
    {
        try
        {
            $aux = PersonalIdentification::where('id_dependence','=',$id)->first();

            if(!is_null($aux)){
                Alert()->warning('La Dependencia se encuentra en uso.', 'Advertencia')->persistent('Aceptar');
                return null;
            }
            $obj = Dependence::find($id);
            $obj->delete();

            Alert()->success('Eliminado!', 'Se elimino correctamente el registro')->persistent('Aceptar');
            return 200;
        }
        catch (\Exception $e)
        {
            Alert()->warning('La Dependencia se encuentra en uso.', 'Advertencia')->persistent('Aceptar');
            return null;
        }
    }



    public function getModal(Request $request)
    {
        try
        {

        }
        catch (\Exception $e)
        {
            return null;
        }
    }
}
