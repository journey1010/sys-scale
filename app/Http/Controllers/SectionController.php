<?php

namespace App\Http\Controllers;

use App\Models\SectionAnnex;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\SectionResolutionType;
use App\Models\ResolutionType;
use Alert;
use Exception;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAll()
    {
        try
        {
            $sections = Section::all();

            return view('section.index', compact('sections'));

        }
        catch(Exception $e)
        {
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }
    }

    public function detail($id_section)
    {
        try
        {
            $section = Section::findOrFail($id_section);

            //Buscar los tipos de resolución que le pertenesca y agregarlos al arreglo
            $assignments = array();

            $sections_resolution_types = SectionResolutionType::where('id_section', $id_section)->get();
            foreach ($sections_resolution_types as $section_resolution_type) {
                $resolution_type = ResolutionType::find($section_resolution_type->id_resolution_type);
                array_push($assignments, $resolution_type->alias);
            }

            return view('section.detail', compact('section', 'assignments'));

        }
        catch(Exception $e)
        {
            Alert()->error('Intentelo de nuevo o compruebe su conexión a Internet', 'Ocurrio un error')->persistent('Aceptar');
            return redirect('/');
        }

    }

    public function edit($id_section)
    {
        try
        {
            $model = Section::findOrFail($id_section);

            //Buscar los tipos de resolución que le pertenesca y agregarlos al arreglo,
            $assignments = SectionResolutionType::where('id_section', $id_section)->get();
            if($assignments == null)
                $assignments = array();

            //Hacer una tabla de tipos de resolucion con id => alias para pasarlos a la vista
            $resolution_types = ResolutionType::all();
            $resolution_types_table = array();
            foreach($resolution_types as $resolution_type)
                $resolution_types_table[$resolution_type->id] = $resolution_type->alias;

            return view('section.edit', compact('model', 'assignments', 'resolution_types_table'));

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
        ]);

        $section = new Section();
        $section->name = $request->input('name');
        $section->description = $request->input('alias');

        $section->save();

        return back();
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'id_section' => 'required|integer|exists:section,id',
            'assignment.*.id' => 'sometimes|required|integer',
            'assignment.*.alias' => 'sometimes|required|integer',
        ]);

        $id_section = $request->input('id_section');
        $section = Section::findOrFail($id_section);
        $section->save();


        $asignaciones = $request->input('assignment');
        $this->updateAssignments($id_section, $asignaciones);

        Alert()->success('Completado!', 'Se guardaron los cambios')->persistent('Aceptar');
        return back();
    }

    public function delete($id_section)
    {
        $section = Section::findOrFail($id_section);
        $section->delete();

        return back();
    }

    private function updateAssignments($id_section, $asignaciones)
    {
        //Asegurarse que asignaciones por lo menos sea un array para que los foreach funcionen
        if($asignaciones == null)
            $asignaciones = array();

        $assignments = SectionResolutionType::where('id_section', $id_section)->get();

        $aux = [];
        $assign = [];

        foreach($asignaciones as $elementKey => $asignacion)
        {
            $value = array_search($asignacion['idSelected'],$aux);
            if($value === false)
            {
                array_push($aux,$asignacion['idSelected']);
                array_push($assign,$asignacion);
            }else{
                unset($asignaciones[$elementKey]);
            }
        }

        $asignaciones = $assign;

        foreach($asignaciones as $asignacion)
        {
            if($asignacion['id'] < 0)
            {
                //SOLO CREAR SI AUN NO EXISTE EN BD
                $assignmentInBD = SectionResolutionType::where('id_section', $id_section)->where('id_resolution_type', $asignacion['id'])->first();
                if($assignmentInBD == null)
                {
                    //CREAR NUEVO
                    $newAssignment = new SectionResolutionType();
                    $newAssignment->id_section = $id_section;
                    $newAssignment->id_resolution_type = $asignacion['idSelected'];
                    $newAssignment->save();
                }
            }
            else
            {
                //ACTUALIZAR
                $assignmentInBD = SectionResolutionType::where('id_section', $id_section)->where('id_resolution_type', $asignacion['id'])->first();
                $assignmentInBD->id_resolution_type = $asignacion['idSelected'];
                $assignmentInBD->save();
            }

        }

        //Buscar asignaciones de la BD y compararlos con la lista, si no estan ahi removerlas
        foreach ($assignments as $assignment)
        {
            $flagEncontrado = false;

            foreach($asignaciones as $asignacion)
            {
                if($asignacion['id'] >= 0 && $asignacion['id'] == $assignment->id_resolution_type)
                {
                    $flagEncontrado = true;
                    break;
                }
            }

            if($flagEncontrado == false)
                $assignment->delete();
        }
    }

    public function ResolutionsBySection($id_section)
    {
        $section = Section::findOrFail($id_section);
        $section->delete();

        return back();
    }

    public function createAnnex(Request $request)
    {
        $this->validate($request,[
            'id_section' => 'required|integer|exists:section,id',
            'id_user' => 'required|integer|exists:users,id',
            'name' => 'required',
            'date' => 'nullable|regex:#^\d{1,4}[-/]\d{1,2}[-/]\d{1,4}$#',
            'file_url' => 'nullable|file'
        ]);

        $section_annex = new SectionAnnex();
        $section_annex->name = $request->input('name');
        $section_annex->description = $request->input('description');
        $section_annex->number_doc = $request->input('number_doc');
        $section_annex->date = $this->parseAnnexDate($request->input('date'));
        $section_annex->id_section = $request->input('id_section');
        $section_annex->id_user = $request->input('id_user');

        //El archivo es opcional: hay anexos que solo son una referencia (por
        //ejemplo un numero de documento) y no llevan nada adjunto. Antes el
        //campo era obligatorio y, si venia vacio, $file->store() reventaba con
        //"Call to a member function store() on null".
        if($request->hasFile('file_url'))
        {
            //store() devuelve "public/section_annex/<hash>.<ext>"
            $parts = explode('/', $request->file_url->store('public/section_annex'));

            $section_annex->file_path = '/' . implode('/', $parts);
            $section_annex->file_url = '/storage/' . $parts[1] . '/' . $parts[2];
        }

        $section_annex->save();

        Alert()->success('Completado!', 'Se completo todo con éxito.')->persistent('Aceptar');

        return back();
    }

    public function deleteAnnex($id_section_annex)
    {
        $section_annex = SectionAnnex::findOrFail($id_section_annex);
        $section_annex->delete();

        return back();
    }

    //Las vistas de anexos configuran bootstrap-datepicker con format:"dd-mm-yyyy",
    //mientras sanction/index.blade.php usa Form::date() y manda "Y-m-d". Se normaliza
    //a cualquiera de los dos en vez de delegar en strtotime, que lanza una excepcion
    //500 ante cualquier separador que no reconozca (por ejemplo "29/09/2026").
    private function parseAnnexDate($value)
    {
        $value = is_string($value) ? trim($value) : '';

        if($value === '')
            return null;

        //createFromFormat de Carbon 1.x revienta con formatos que llevan "/", asi que
        //se unifica el separador. El datepicker siempre manda dd y mm con dos digitos,
        //pero si el usuario teclea la fecha a mano hay que rellenar los ceros.
        $value = str_replace('/', '-', $value);

        if(preg_match('#^(\d{1,2})-(\d{1,2})-(\d{4})$#', $value, $m))
            $value = sprintf('%02d-%02d-%s', $m[1], $m[2], $m[3]);

        foreach(['d-m-Y', 'Y-m-d'] as $format)
        {
            //El "!" deja en cero los campos que no aparecen en el formato; sin el,
            //createFromFormat rellena la hora con la actual y el anexo se guardaba
            //con la hora del momento de subirlo en vez de a medianoche.
            try
            {
                $date = Carbon::createFromFormat('!'.$format, $value);
            }
            catch(Exception $e)
            {
                //Carbon 1.x lanza InvalidArgumentException en vez de devolver false
                //cuando sobra data tras la fecha, por ejemplo "2026-09-29" con "d-m-Y".
                continue;
            }

            //createFromFormat ignora el resto de la cadena y desborda dias y meses
            //outofrange, asi que se confirma que la fecha leida sea identica a la
            //recibida. "2026-13-45" no debe acabar guardado como 2027-02-14.
            if($date->format($format) === $value)
                return $date;
        }

        return null;
    }

}