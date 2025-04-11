<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class DocSeeder extends Seeder
{
    public $informacionPersonal;
    public $incorporacion;
    public $formacionAcademica;
    public $experienciaLaboral;
    public $movimientosPersonal;
    public $compensaciones;
    public $evaluacionDesempeno;
    public $reconocimientoSancionesDisciplinarias;
    public $relacionesLaboralesIndividualesColectivas;
    public $seguridadSaludTrabajoBienestarSocial;
    
    public function __construct()
    {
        $this->informacionPersonal = [
            [
                'name' => 'Ficha de Información Personal',
                'alias' => 'fichaInformacionPersonal',
                'description' => 'Ficha de información personal y familiar',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Copia de Documento Nacional de Identidad',
                'alias' => 'copiaDNI',
                'description' => 'Copia de Documento Nacional de Identidad – DNI, o de ser el caso, copia de título de nacionalidad, certificado de haber adquirido la nacionalidad por matrimonio o visa de residencia en el país.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Declaración jurada o Certificado de antecedentes penales',
                'alias' => 'declaracionJuradaAntecedentesPenales',
                'description' => 'Declaración Jurada o Certificado de antecedentes penales, según corresponda, emitido por la autoridad competente del país de origen o residencia, en caso de ser extranjero',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Declaración jurada o certificado de antecedentes policiales',
                'alias' => 'declaracionJuradaAntecedentesPoliciales',
                'description' => 'Declaración Jurada o Certificado de antecedentes policiales, según corresponda, emitido por la autoridad competente del país de origen o residencia, en caso de ser extranjero',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Declaración Jurada de bienes y rentas',
                'alias' => 'declaracionJuradaBienesRentas',
                'description' => 'Declaración Jurada de bienes y rentas, en caso corresponda',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Declaración Jurada de no tener impedimentos',
                'alias' => 'declaracionJuradaNoImpedimentos',
                'description' => 'Declaración Jurada de no tener impedimentos para ser designado funcionario público o directivo público de libre designación y remoción, en el marco de la Ley N° 31419',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Copia de partida de matrimonio o constancia de concubinato',
                'alias' => 'copiaPartidaMatrimonioConcubinato',
                'description' => 'Copia de partida de matrimonio o constancia de concubinato (unión de hecho)',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Información de impedimentos e inhabilitaciones',
                'alias' => 'informacionImpedimentosInhabilitaciones',
                'description' => 'Información de impedimentos e inhabilitaciones (RNSSC, REDJUM, entre otros)',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Copia del DNI de el/la cónyuge o concubino/a',
                'alias' => 'copiaDniConyugeConcubino',
                'description' => 'Copia del DNI de el/la cónyuge o concubino/a',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Copia de DNI de los/las hijos/as menores de edad',
                'alias' => 'copiaDniHijosMenores',
                'description' => 'Copia de DNI de los/las hijos/as menores de edad',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Certificado de discapacidad',
                'alias' => 'certificadoDiscapacidad',
                'description' => 'Certificado de discapacidad de el/la servidor/a o de sus hijos/as emitido por el CONADIS, en caso corresponda',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ]
        ];
    
        $this->incorporacion = [
            // 2.1. Documentación del Proceso de Selección
            [
                'name' => 'Resultado final del proceso de selección',
                'alias' => 'resultadoFinalSeleccion',
                'description' => 'Resultado final del proceso de selección donde el/la servidor/a resultó ganador/a.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Informe de la Oficina de Recursos Humanos',
                'alias' => 'informeRecursosHumanos',
                'description' => 'Informe de la Oficina de Recursos Humanos, o la que haga sus veces, que verifique el cumplimiento de los requisitos del puesto.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
        
            // 2.2. Documentación de Formalización del Vínculo
            [
                'name' => 'Resolución administrativa de designación',
                'alias' => 'resolucionDesignacion',
                'description' => 'Resolución administrativa de designación.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Resolución administrativa de renovación',
                'alias' => 'resolucionRenovacion',
                'description' => 'Resolución administrativa de renovación.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Resolución administrativa del servicio civil de carrera',
                'alias' => 'resolucionServicioCivilCarrera',
                'description' => 'Resolución administrativa del servicio civil de carrera.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Contrato',
                'alias' => 'contrato',
                'description' => 'Contrato firmado entre el/la servidor/a y la entidad.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Adenda',
                'alias' => 'adenda',
                'description' => 'Adenda al contrato firmado.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
        
            // 2.3. Documentación de la Inducción del Personal
            [
                'name' => 'Registro de inducción',
                'alias' => 'registroInduccion',
                'description' => 'Registro de inducción (general y específica).',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Cargo de entrega de perfil del puesto y funciones',
                'alias' => 'cargoEntregaPerfilFunciones',
                'description' => 'Cargo de entrega de perfil del puesto y funciones.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Cargo de entrega de reglamento interno',
                'alias' => 'cargoEntregaReglamentoInterno',
                'description' => 'Cargo de entrega de reglamento interno de servidores civiles.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Cargo de entrega del código de conducta y ética',
                'alias' => 'cargoEntregaCodigoConducta',
                'description' => 'Cargo de entrega del código de conducta y ética.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Otros similares',
                'alias' => 'otrosSimilaresInduccion',
                'description' => 'Otros documentos similares relacionados con la inducción del personal.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
        
            // 2.4. Documentación del Período de Prueba
            [
                'name' => 'Evaluación y resultados del período de prueba',
                'alias' => 'evaluacionPeriodoPrueba',
                'description' => 'Evaluación y resultados del período de prueba.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ]
        ];
        
        $this->formacionAcademica = [
            [
                'name' => 'Copia del certificado oficial de estudios básicos',
                'alias' => 'certificadoEstudiosBasicos',
                'description' => 'Copia del certificado oficial de estudios básicos, en los casos que se hubiera requerido para el puesto.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Copia de títulos o grados de estudios superiores no universitarios o universitarios',
                'alias' => 'titulosGradosSuperiores',
                'description' => 'Copia de títulos o grados de estudios superiores no universitarios (técnicos) o estudios superiores universitarios.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Copia de colegiatura y habilitación profesional',
                'alias' => 'colegiaturaHabilitacionProfesional',
                'description' => 'Copia de colegiatura y habilitación profesional (de corresponder).',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Copia de certificados o diplomas de postgrado',
                'alias' => 'certificadosDiplomasPostgrado',
                'description' => 'Copia de certificados o diplomas de postgrado (diplomados o programa de especialización).',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Copia de diploma de grado académico de Maestría y/o Doctorado',
                'alias' => 'diplomaMaestriaDoctorado',
                'description' => 'Copia de diploma de grado académico de Maestría y/o Doctorado (de corresponder).',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Certificados, constancias o diplomas de cursos y/o programas de capacitación',
                'alias' => 'certificadosCapacitacion',
                'description' => 'Certificados, constancias o diplomas de cursos y/o programas de capacitación.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Constancias de participación en eventos académicos',
                'alias' => 'constanciasEventosAcademicos',
                'description' => 'Constancias de participación en congresos, convenciones, seminarios, talleres, forums, simposios, conferencias, charlas y otros similares.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Otros documentos relacionados a la formación académica y capacitación',
                'alias' => 'otrosFormacionAcademica',
                'description' => 'Otros documentos relacionados a la formación académica y capacitación.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ]
        ];
    
        $this->experienciaLaboral = [
            [
                'name' => 'Copia de certificados o constancias de trabajos',
                'alias' => 'certificadosConstanciasTrabajos',
                'description' => 'Copia de certificados, constancias de trabajos u otros documentos donde se indique el tiempo de servicio en el sector público o privado que acrediten la experiencia declarada.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Resoluciones, memorándums u otros documentos',
                'alias' => 'resolucionesMemorandumsFunciones',
                'description' => 'Resoluciones, memorándums, u otros documentos, que acrediten la asignación de funciones desempeñadas.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ]
        ];
    
        $this->movimientosPersonal = [
            [
                'name' => 'Documento que aprueba la licencia o permiso solicitado',
                'alias' => 'documentoAprobacionLicenciaPermiso',
                'description' => 'Documento que aprueba la licencia o permiso solicitado por el/la servidor/a.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Documento que sustenta el goce vacacional',
                'alias' => 'documentoGoceVacacional',
                'description' => 'Documento que sustenta el goce vacacional correspondiente.',
                'flag_vacations' => true,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Documento que sustenta el adelanto o postergación de vacaciones',
                'alias' => 'documentoAdelantoPostergacionVacaciones',
                'description' => 'Documento que sustenta el adelanto o postergación de vacaciones.',
                'flag_vacations' => true,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Rol de vacaciones',
                'alias' => 'rolVacaciones',
                'description' => 'Rol de vacaciones.',
                'flag_vacations' => true,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Licencias otorgadas',
                'alias' => 'licenciasOtorgadas',
                'description' => 'Licencias otorgadas (maternidad, paternidad, lactancia, adopción, sindical, familiares graves, comité SST, asistencia médica a un familiar, ser bombero voluntario u otros).',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ]
        ];
    
        $this->compensaciones = [
            [
                'name' => 'Documento de reconocimiento de tiempo de servicios',
                'alias' => 'reconocimientoTiempoServicios',
                'description' => 'Documento de reconocimiento de tiempo de servicios.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Documentación referente al pago de compensaciones económicas y no económicas',
                'alias' => 'documentacionCompensaciones',
                'description' => 'Documentación referente al pago de compensaciones económicas y no económicas.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Certificado de retención de quinta categoría, cuarta categoría, entre otros',
                'alias' => 'certificadoRetencion',
                'description' => 'Certificado de retención de quinta categoría, cuarta categoría, entre otros, en caso corresponda.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Liquidación de beneficios sociales',
                'alias' => 'liquidacionBeneficiosSociales',
                'description' => 'Liquidación de beneficios sociales.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ]
        ];
    
        $this->evaluacionDesempeno = [
            // 7.1. Evaluación de Desempeño
            [
                'name' => 'Formato para la gestión del rendimiento',
                'alias' => 'formatoGestionRendimiento',
                'description' => 'Formato para la gestión del rendimiento (fijación de factores de evaluación, registro de evidencias y formato de reunión de seguimiento y notificación de la evaluación obtenida).',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Actas de retroalimentación de resultados de desempeño y plan de mejora',
                'alias' => 'actasRetroalimentacionDesempeno',
                'description' => 'Actas de retroalimentación de resultados de desempeño y plan de mejora.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
    
            // 7.2. Documentación de Progresión en la Carrera
            [
                'name' => 'Resolución de progresión en la carrera',
                'alias' => 'resolucionProgresionCarrera',
                'description' => 'Resolución de progresión en la carrera.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
    
            // 7.3. Documentación de Desplazamiento
            [
                'name' => 'Designación',
                'alias' => 'designacion',
                'description' => 'Documentación de designación.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Rotación',
                'alias' => 'rotacion',
                'description' => 'Documentación de rotación.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Destaque',
                'alias' => 'destaque',
                'description' => 'Documentación de destaque.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Encargo de puestos o de funciones',
                'alias' => 'encargoPuestosFunciones',
                'description' => 'Documentación de encargo de puestos o de funciones.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Otros relacionados al desplazamiento',
                'alias' => 'otrosDesplazamiento',
                'description' => 'Otros documentos relacionados al desplazamiento.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ]
        ];
    
        $this->reconocimientoSancionesDisciplinarias = [
            // 8.1. Reconocimientos
            [
                'name' => 'Cartas, oficios, memorandos de felicitación, condecoraciones o diplomas',
                'alias' => 'cartasFelicitacionDiplomas',
                'description' => 'Cartas, oficios, memorandos de felicitación, condecoraciones, o diplomas otorgados en reconocimiento por excepcional participación en proyectos o eventos.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Certificados o constancias de reconocimiento por labor docente',
                'alias' => 'certificadosReconocimientoDocente',
                'description' => 'Certificados o constancias de reconocimiento excepcional por labor docente.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Certificados o constancias de reconocimiento por tiempo de servicios',
                'alias' => 'certificadosReconocimientoTiempoServicios',
                'description' => 'Certificados o constancias de reconocimientos por tiempo de servicios.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
    
            // 8.2. Sanciones Disciplinarias
            [
                'name' => 'Documentos que formalizan y comunican sanciones disciplinarias',
                'alias' => 'documentosSancionesDisciplinarias',
                'description' => 'Documentos que formalizan y comunican las sanciones de amonestación escrita, suspensión y destitución.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Documentos sobre recursos impugnatorios relativos a sanciones',
                'alias' => 'documentosRecursosImpugnatoriosSanciones',
                'description' => 'Documentos por los que se declare fundado, infundado o improcedente los recursos impugnatorios relativos a las sanciones impuestas.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ]
        ];
    
        $this->relacionesLaboralesIndividualesColectivas = [
            [
                'name' => 'Documentación relacionada a controversias individuales',
                'alias' => 'documentacionControversiasIndividuales',
                'description' => 'Documentación relacionada a controversias individuales.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Documentación relacionada a controversias colectivas',
                'alias' => 'documentacionControversiasColectivas',
                'description' => 'Documentación relacionada a controversias colectivas.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Resolución, acta o documento de afiliación al sindicato',
                'alias' => 'documentoAfiliacionSindicato',
                'description' => 'Resolución, acta o documento en el que se indique la afiliación al sindicato.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ]
        ];
    
        $this->seguridadSaludTrabajoBienestarSocial = [
            // 10.1. Seguridad y Salud en el Trabajo (SST)
            [
                'name' => 'Cargo de entrega del Reglamento de Seguridad y Salud en el Trabajo',
                'alias' => 'cargoEntregaReglamentoSST',
                'description' => 'Cargo de entrega del Reglamento de Seguridad y Salud en el Trabajo.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Registro de entrenamiento y simulacros de emergencia',
                'alias' => 'registroEntrenamientoSimulacros',
                'description' => 'Registro de entrenamiento y simulacros de emergencia donde participe el/la servidor/a civil.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Lista de asistencia de capacitaciones brindadas por la entidad pública',
                'alias' => 'listaAsistenciaCapacitaciones',
                'description' => 'Lista de asistencia de capacitaciones brindadas por la entidad pública.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
    
            // 10.2. Bienestar Social
            [
                'name' => 'Trámites y gestiones de seguro',
                'alias' => 'tramitesGestionesSeguro',
                'description' => 'Trámites y gestiones de seguro.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Trámites y gestiones de subsidios',
                'alias' => 'tramitesGestionesSubsidios',
                'description' => 'Trámites y gestiones de subsidios.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Descansos médicos',
                'alias' => 'descansosMedicos',
                'description' => 'Documentación relacionada con descansos médicos.',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Afiliaciones a Entidades Prestadoras de Salud (EPS)',
                'alias' => 'afiliacionesEPS',
                'description' => 'Documentación relacionada con afiliaciones a Entidades Prestadoras de Salud (EPS).',
                'flag_vacations' => false,
                'created_at' => Carbon::now()
            ]
        ];
    }

    public function run()
    {  
        try {
            DB::statement('START TRANSACTION;'); // Inicia la transacción
            $result = array_merge(
                $this->informacionPersonal,
                $this->incorporacion,
                $this->formacionAcademica,
                $this->experienciaLaboral,
                $this->movimientosPersonal,
                $this->compensaciones,
                $this->evaluacionDesempeno,
                $this->reconocimientoSancionesDisciplinarias,
                $this->relacionesLaboralesIndividualesColectivas,
                $this->seguridadSaludTrabajoBienestarSocial
            );
        
            //DB::table('resolution_type')->insert($result);
            $this->runSectionResolutionType();
        
            DB::statement('COMMIT;'); // Confirma la transacción
        } catch (\Exception $e) {
            DB::statement('ROLLBACK;'); // Cancela la transacción si hay un error
            Log::error('Error inserting data: ' . $e->getMessage());
        }
        
  
    }
    public function runSectionResolutionType()
    {
        $package = [
            'informacionPersonal' => $this->informacionPersonal,
            'incorporacion' => $this->incorporacion,
            'formacionAcademica' => $this->formacionAcademica,
            'experienciaLaboral' => $this->experienciaLaboral,
            'movimientosPersonal' => $this->movimientosPersonal,
            'compensaciones' => $this->compensaciones,
            'evaluacionDesempeno' => $this->evaluacionDesempeno,
            'reconocimientoSancionesDisciplinarias' => $this->reconocimientoSancionesDisciplinarias,
            'relacionesLaboralesIndividualesColectivas' => $this->relacionesLaboralesIndividualesColectivas,
            'seguridadSaludTrabajoBienestarSocial' => $this->seguridadSaludTrabajoBienestarSocial,
        ];

        $data = [];
        foreach($package as $key => $value){
            $id = DB::table('section')->where('alias', $key)->value('id');
            foreach($value as $document){
                $resolutionId  = DB::table('resolution_type')->where('alias', $document['alias'])->value('id');
                $data[] = [
                    'id_section' => $id,
                    'id_resolution_type' => $resolutionId,
                    'created_at' => Carbon::now()
                ];
            }
        }
        DB::table('section_resolution_type')->insert($data);
    }
}