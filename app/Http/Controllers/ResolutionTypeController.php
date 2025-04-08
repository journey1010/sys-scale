<?php

namespace App\Http\Controllers;

use App\Models\Resolution;
use App\Models\SectionResolutionType;
use Illuminate\Http\Request;
use App\Models\ResolutionType;
use App\Models\User;
use Alert;
use Mockery\Exception;

class ResolutionTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAll()
    {
        try
        {
            $resolution_types = ResolutionType::all();

            return view('resolutionType.index', compact('resolution_types'));

        }
        catch(Exception $e)
        {
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }

    }

    public function edit($id_resolution_type)
    {
        try
        {
            $model = ResolutionType::findOrFail($id_resolution_type);

            return view('resolutionType.edit', compact('model'));

        }
        catch(Exception $e)
        {
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'alias' => 'required|max:100',
            'description' => 'required|max:250',
            'flag_vacations' => 'required|boolean'
        ]);

        $resolution_type = new ResolutionType();
        $resolution_type->name = $request->input('name');
        $resolution_type->alias = $request->input('alias');
        $resolution_type->description = $request->input('description');
        $resolution_type->flag_vacations = $request->input('flag_vacations');

        $resolution_type->save();

        Alert()->success('Se guardaron los cambios','Completado')->persistent('Aceptar');
        return back();
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'id_resolution_type' => 'required|integer|exists:resolution_type,id',
            'name' => 'required',
            'alias' => 'required|max:100',
            'description' => 'required|max:250',
            'flag_vacations' => 'required|boolean'
        ]);

        $id_resolution_type = $request->input('id_resolution_type');
        $resolution_type = ResolutionType::findOrFail($id_resolution_type);
        $resolution_type->name = $request->input('name');
        $resolution_type->alias = $request->input('alias');
        $resolution_type->description = $request->input('description');
        $resolution_type->flag_vacations = $request->input('flag_vacations');

        $resolution_type->save();

        Alert()->success('Se guardaron los cambios correctamente.', 'Éxito')->persistent('Aceptar');

        return back();
    }

    public function delete($id_resolution_type)
    {
        $resolution_type = ResolutionType::findOrFail($id_resolution_type);

        $resolution = SectionResolutionType::where('id_resolution_type','=', $id_resolution_type)->first();

        if($resolution == null)
        {
            Alert()->success('Se guardaron los cambios correctamente.', 'Éxito')->persistent('Aceptar');
            $resolution_type->delete();
        }
        else
        {
            Alert()->error('No se pudo eliminar, el tipo de resolución se encuentra en uso.', 'Error')->persistent('Aceptar');
        }

        return back();
    }

}
