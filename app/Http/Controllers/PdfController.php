<?php

namespace App\Http\Controllers;

use App\Models\AcademicInformation\ProfessionalTitle;
use App\Models\Dependence;
use App\Models\LaborConditional;
use App\Models\LicensingAuthorization;
use App\Models\PersonalIdentification\PersonalIdentification;
use App\Models\Resolution;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Mockery\Exception;

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Element\Section;

class PdfController extends Controller
{

    public function retrivePersonalInfo($id)
    {
        $user = User::find($id);
        $personal = PersonalIdentification::where('id_user',$id)->first();
        $condition = LaborConditional::find($personal['id_labor_conditional'])['name'];
        $dependence = Dependence::find($personal['id_dependence'])['name'];
        $title = ProfessionalTitle::where('id_user',$id)->first();
        $jobs = Resolution::leftjoin('aditional_carrerpath','aditional_carrerpath.id_resolution','resolution.id')
                ->where('resolution.id_user', '=', $id)
                ->where('resolution.id_section','=',config('constants.sections.trayectoria_laboral'))
                ->select(
                    'resolution.resolution_number',
                    'resolution.issue_date',
                    'resolution.id',
                    'aditional_carrerpath.fecha_inicio',
                    'aditional_carrerpath.fecha_cese',
                    'aditional_carrerpath.cargo'
                )
                ->orderBy('resolution.id')
                ->get();
        $demerits = Resolution::where('resolution.id_user', '=', $id)
                ->where('resolution.id_section','=',config('constants.sections.sanciones'))
                ->select(
                    'resolution.resolution_number',
                    'resolution.issue_date',
                    'resolution.id'
                )
                ->orderBy('resolution.id')
                ->get();
        $licenses = LicensingAuthorization::join('resolution','resolution.id','licensing_authorization.id_resolution')
                ->where('resolution.id_user', '=', $id)
                ->where('licensing_authorization.with_remunerations','=',true)
                ->where('licensing_authorization.license_resolution_type', '=', 4)
                ->select(
                    'licensing_authorization.date_end',
                    'licensing_authorization.date_start',
                    'licensing_authorization.number_days',
                    'licensing_authorization.id',
                    'resolution.resolution_number',
                    'resolution.issue_date',
                    'licensing_authorization.with_remunerations',
                    'licensing_authorization.license_resolution_type'
                )
                ->orderBy('licensing_authorization.id')
                ->get();

        return [$user, $personal, $condition, $dependence, $title, $jobs, $demerits, $licenses];
    }

    private function defineHeader(Section $section)
    {
        
        $header = $section->addHeader();
        $header->addImage('images/login.png', array('positioning' => 'relative', 'width' => 50, 'height' => 50, 'wrappingStyle' => 'behind'));
        $header->addText("\t\t\t\t\tOficina General de Recursos Humanos",
            array('name' => 'Calibri', 'size' => 14, 'bold' => true),
            array('align' => 'center')
        );
        $header->addText("\t\t\t\t\tGerencia Regional de Recursos Humanos",
            array('name' => 'Calibri', 'size' => 11, 'bold' => true),
            array('align' => 'center')
        );
        $section->addTextBreak();
    }

    private function defineFooter(Section $section)
    {
        
        $footer = $section->addFooter();
        $footer->addText("Av. José Abelardo Quiñones km 1.5, Villa Belén",
            array('name' => 'Calibri', 'size' => 9),
            array('spaceBefore' => 0, 'spaceAfter' => 0)
        );
        $footer->addText("Gerencia Regional de Recursos Humanos", array('name' => 'Calibri', 'size' => 10, 'bold' => true));

    }

    public function recordTimeService($section, $record) 
    {
        $section->addText("Récord de Tiempo de Servicios:", array('underline' => 'single'));
        $section->addText("\t\t\t\t\t\t\t\t" . "Años/Meses/Días");

        if ($record->isEmpty()) {
            $section->addText("No tiene tiempo de servicio registrado con la institución.");
        }else {
            foreach ($record as $job) {
                if (empty($job->cargo) || empty($job->fecha_inicio) || empty($job->fecha_cese)) {
                    error_log("Data missing en el trabajo: " . json_encode($job));
                    continue;
                }
                try {
                    $section->addText($job->cargo, array('underline' => 'single'));
                    $section->addListItem("RR. N° " . $job->resolution_number . " (" . date('d-m-Y', strtotime($job->issue_date)) . ")");
                    $diff_dates_job = Carbon::createFromFormat('Y-m-d', $job->fecha_inicio)->diff(Carbon::createFromFormat('Y-m-d', $job->fecha_cese))->format('%y - %m - %d');
                    $section->addText("\tDel " . date('d-m-Y', strtotime($job->fecha_inicio)) . " al " . date('d-m-Y', strtotime($job->fecha_cese)) . " .............................. " . $diff_dates_job);
                } catch (Exception $e) {
                    error_log("Error procesando el trabajo: " . $e->getMessage());
                }
            }            
        }
        $section->addTextBreak();
    }

    public function recordTimeLicenses(Section $section, $record)
    {
        $section->addText("Récord de Licencias por capacitación con goce de remuneraciones:", array('underline' => 'single'));
        $section->addTextBreak();
        if (($record->isEmpty())) {
            $section->addText("No hizo uso de licencias por capacitación con goce de remuneraciones con el compromiso de devolver el doble del tiempo de la licencia otorgada.");
        } else {
            $section->addText("Se le otorgó licencias por capacitación con goce de remuneraciones con el compromiso de devolver el doble del tiempo de la licencia otorgada, para seguir sus estudios; de acuerdo a los siguientes documentos:");
            $section->addTextBreak();
            foreach ($record as $license) {
                $section->addListItem("Resolución N° " . $license->resolution_number . " (" . date('d-m-Y', strtotime($license->issue_date)) . ")");
                $section->addText("\tDel " . date('d-m-Y', strtotime($license->date_start)) . " al " . date('d-m-Y', strtotime($license->date_end)) . ", por (" . $license->number_days . ") días.");
            }
        }
    }

    public function recordTimeDemerits(Section $section, $record)
    {
        $section->addText("Récord de deméritos:", array('underline' => 'single'));
        $section->addTextBreak();
        
        
        if (($record->isEmpty())) {
            $section->addListItem("A la fecha, no existe en su legajo personal documento alguno sobre llamada de atención y/o sanción por falta disciplinaria y/o por proceso administrativo disciplinario.");
        } else {
            foreach ($record as $demerit) {
                $section->addListItem("Resolución N° " . $demerit->resolution_number . " (" . date('d-m-Y', strtotime($demerit->issue_date)) . ") se realizó una sanción.");
            }
        }
        $section->addTextBreak();
    }

    public function escalafonPdf($id) {
        try{
            list($user, $personal, $condition, $dependence, $title, $jobs, $demerits, $licenses) = $this->retrivePersonalInfo($id);

            $phpWord = new PhpWord();
            $properties = $phpWord->getDocInfo();
            $properties->setTitle('Informe Escalafonario');
            $phpWord->setDefaultFontName('Calibri');
            $phpWord->setDefaultFontSize(8);
            $phpWord->setDefaultParagraphStyle(
                array(
                    'spaceBefore' => 0,
                    'spaceAfter' => 0
                )
            );

            $section = $phpWord->addSection([
                'marginTop'    => 2200,
                'marginBottom' => 1000,
                'marginLeft'   => 1000,
                'marginRight'  => 1000,
            ]);
            
            $this->defineHeader($section);
            $this->defineFooter($section);          

            $section->addTextBreak();
            $section->addText("INFORME ESCALAFONARIO",
                array('name' => 'Calibri', 'size' => 11, 'bold' => true, 'underline' => 'single'),
                array('align' => 'center'));
            $section->addTextBreak();
            $section->addText("APELLIDOS\t\t\t:\t" . strtoupper($user->first_surname . " " . $user->second_surname));
            $section->addText("NOMBRES\t\t\t:\t" . strtoupper($user->name));
            $section->addText("DNI N°\t\t\t:\t" . strtoupper($personal['dni']));
            $section->addText("SERVIDOR\t\t\t:\t" . strtoupper($personal['position']));
            $section->addText("CONDICION\t\t:\t" . strtoupper($condition));
            $section->addText("CATEGORÍA\t\t:\t" . strtoupper($personal['category']));
            $section->addText("DEPENDENCIA\t\t:\t" . strtoupper($dependence));
            $section->addText("TÍTULO PROFESIONAL\t:\t" . strtoupper($title['concentration']));

            if ($personal['affiliation_date']) {
                $fecha_ingreso = \DateTime::createFromFormat('Y-m-d', $personal['affiliation_date']);
                $section->addText("FECHA INGRESO UNAP\t:\t" .  $fecha_ingreso->format('d') . " de " . config('constants.month_name')[$fecha_ingreso->format('m')*1] . " de " . $fecha_ingreso->format('Y') );
                $section->addText("TIEMPO DE SERVICIOS\t\t");
                $fecha_ingreso2 = Carbon::instance($fecha_ingreso);
                $diff_days = Carbon::now()->diff($fecha_ingreso2);
                $section->addText("AL " . Carbon::now()->format('d-m-Y') . "\t\t:\t\t\t\t\t" . "AÑO\t: (" . $diff_days->format('%y') . ")");
                $section->addText("\t\t\t\t\t\t\t\t" . "MESES\t: (" . $diff_days->format('%m') . ")");
                $section->addText("\t\t\t\t\t\t\t\t" . "DÍAS\t: (" . $diff_days->format('%d') . ")");
            }

            $this->recordTimeService($section, $jobs);
            $this->recordTimeLicenses($section, $licenses);
            $this->recordTimeDemerits($section, $demerits);

            $section->addText("Es así como consta en los archivos que obran en esta dependencia a los cuales me remito. Se expide el presente documento a solicitud de la parte interesada para los fines que estime convenientes.");
            $section->addTextBreak();
            $section->addText("Iquitos, " . Carbon::now()->day . " de " . config('constants.month_name')[Carbon::now()->month] . " de " . Carbon::now()->year,
                null,
                array('align' => 'right'));

            $objectWriter = IOFactory::createWriter($phpWord, 'Word2007');
            try {
                $objectWriter->save(storage_path('app/public/InformeEscalafonario.docx'));
            } catch (Exception $e) {
                return redirect('/');
            }

            return response()->download(storage_path('app/public/InformeEscalafonario.docx'))->deleteFileAfterSend(true);
        }
        catch(\Exception $e){
            return;
        }
    }    
}