<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Dependence extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            [
                'name' => 'ADMINISTRACION-GRDFFS',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
           ],
           [
                'name' => ' ARCHIVO CENTRAL',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
           ],
           [
                'name' => 'ARCHIVO REGIONAL',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
           ],
           [
                'name' => 'AREA ADMINISTRATIVA DEL COMITÉ DE SEGURIDAD Y SALUD EN EL TRABAJO',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
           ],
           [
                'name' => 'AREA DE ARCHIVO TECNICO-CONTABILIDAD',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
           ],
           [
                'name' => 'AREA DE ASESORIA LEGAL-RR.HH',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
           ],
           [
                'name' => 'AREA DE CONTABILIDAD PATRIMONIAL-CONTABILIDADAD',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
      
           ],
           [
                'name' => 'ÁREA DE CONTROL PRESUPUESTAL - CONTABILIDAD',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'AREA DE CONTROL PREVIO - CONTABILIDAD',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
           ],
           [
                'name' => 'AREA DE COORDINACION DE DESARROLLO INSTITUCIONAL,ORGANIZACION Y METODOS',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'AREA DE COORDINACION INTERNA - GRCEYT',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
           ],
           [
                'name' => 'ÁREA DE COORDINACIÓN INTERNA ARCHIVO TÉCNICO - LOGÍSTICA',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
           ],
           [
                'name' => 'AREA DE COORDINACION INTERNA DE ADMINISTRACION - GRCEYT',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
           ],
           [
                'name' => 'AREA DE COORDINACION INTERNA DE BIENESTAR SOCIAL - ACIBS - RR.HH',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
           ],
           [
                'name' => 'AREA DE COORDINACION INTERNA DE CAPACITACION Y ADMINISTRACION DE PERSONAL - ACIAPC-RR.HH',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'AREA DE COORDINACION INTERNA DE DESARROLLO INSTITUCIONAL',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'AREA DE COORDINACION INTERNA DE PLANIFICACION - GRCEYT',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'AREA DE COORDINACIÓN INTERNA DE PROGRAMACIÓN - LOGÍSTICA',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'AREA DE COORDINACION INTERNA DE REGISTRO Y ESCALAFON - ACIRE - RR.HH',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'AREA DE COORDINACION INTERNA DE REMUNERACIONES - ACIREM-RR.HH',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'AREA DE COORDINACION INTERNA DE SIGA - LOGISTICA',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'AREA DE COORDINACION, DISEÑO DE PROCESOS, SIMPLIFICACION ADM. Y DOCUMENTOS DE GESTION',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'AREA DE PRENSA',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'AUTORIDAD PORTUARIA REGIONAL',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'CAFAE',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'CENTRO DE OPERACIONES DE EMERGENCIA REGIONAL - COER ',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'COMISION DE AUDITORIA - CONTRALORIA GENERAL DE LA REPUBLICA',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'COMISION DE RECOMENDACIONES',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'COMISIÓN DE TRANSPARENCIA Y ACCESO A LA INFORMACIÓN PUBLICA',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'COMISION ESPECIAL',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'COMISIÓN ESPECIAL DE PROCESOS ADMINISTRATIVOS , DISCIPLINARIO - CEPAD',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'COMISION GOREL-DEVIDA',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'COMISION PERMANENTE PARA PROCESOS DE SELECCION DE CAS',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'COMITE CONTROL INTERNO',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'COMITE DE CARACTER PERMANENTE PARA ELABORACION Y APROBACION DEL LISTADO DE OBLIGACIONES DERIVADAS DE SENTENCIA',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'COMITE DE GOBIERNO Y TRANSFORMACION DIGITAL  ',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'COMITE DE OBRAS POR IMPUESTOS',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'COMITE DE PROMOCION DE LA INVERSION PRIVADA',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'COMITÉ DE SEGUIMIENTO DE INVERSIONES',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'COMITE DE SELECCION BIENES',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'COMITE DE SELECCION DE EJECUCION DE OBRAS PARA LICITACION PUBLICA',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'COMITE DE SELECCION DE OBRAS',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'COMITE DE SELECCION SERVICIOS',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'COMITE DE TOMA DE INVENTARIO',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'COMITE ESPECIAL DE OBRAS POR IMPUESTOS',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'COMITE ESPECIAL DE OBRAS POR IMPUESTOS - GRAM',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'COMITE REGIONAL DE SEGURIDAD CIUDADANA',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'COMITE TEC. REFINANCIAMIENTO O FRACCIONAMIENTO DE DEUDA',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'COMITE TECNICO DEL PROCEDIMIENTO ABREVIADO - DEFFS',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'CONSEJO DELEGADO ',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'CONSEJO DELEGADO ',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'CONSEJO REGIONAL DE CIENCIA Y TECNOLOGIA - CORCYTEC.',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'CONSEJO REGIONAL/ CARMEN GUISELA PANDURO VALLES',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'CONSEJO REGIONAL/ CESAR HUMBERTO URQUIA RAMIREZ',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
      
           ],
           [
                'name' => 'CONSEJO REGIONAL/ JAVIER  VILLACORTA NACIMIENTO',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
           ],
           [
                'name' => 'CONSEJO REGIONAL/ JESUS JAMBO TIRADO',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
                [
                     'name' => 'CONSEJO REGIONAL/ JOSE ALFREDO VALERA FLORES',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'CONSEJO REGIONAL/ JOSUE IRACUDE CALDERON',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'CONSEJO REGIONAL/ MAMERTO MAICUA PEREZ',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'CONSEJO REGIONAL/ PEDRO RAUL PACAYA TAMANI',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'CONSEJO REGIONAL/ALAN BERNAND RODRIGUEZ FASANANDO',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'CONSEJO REGIONAL/CARLOS SANDI',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'CONSEJO REGIONAL/FRANCISCO JAVIER LOPEZ ROBLES',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'CONSEJO REGIONAL/GEORGE ANTONHY LOPEZ TORRES',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'CONSEJO REGIONAL/JANET REATEGUI RIVADENEYRA',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'CONSEJO REGIONAL/JOSE ALBERTO TRUJILLO PAIRA',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'CONSEJO REGIONAL/LUIS HONORATO PITA DIAZ',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'CONSEJO REGIONAL/OFELIA CHAVEZ BARDALES',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'CONSEJO REGIONAL/ROGER CHANCHARI HUYAMBE',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'CRL/COMISIÓN ORDINARIA DE FISCALIZACION',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'CRL/COMISIÓN ORDINARIA DE DESARROLLO ECONOMICO',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'CRL/COMISIÓN ORDINARIA DE DESARROLLO SOCIAL',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'CRL/COMISIÓN ORDINARIA DE INFRAESTRUCTURA',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'CRL/COMISIÓN ORDINARIA DE PLANEAMIENTO, PRESUPUESTO Y ACONDICIONAMIENTO TERRITORIAL',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'CRL/COMISIÓN ORDINARIA DE RECURSOS NATURALES, GESTIÓN DEL MEDIO AMBIENTE Y NACIONALIDADES',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'CRL/COMISIÓN ORDINARIA DE TRANSPORTE Y COMUNICACIONES',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'DIRECCION REGIONAL DE DESARROLLO E INCLUSION SOCIAL',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'DIRECCION REGIONAL DE ENERGIA Y MINAS',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'DIRECCION REGIONAL DE LA MUJER Y POBLACIONES VULNERABLES',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'DIRECCION REGIONAL DE LA PRODUCCION',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'DIRECCION REGIONAL DE TRABAJO Y PROMOCION DEL EMPLEO',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'DIRECCION REGIONAL DE VIVIENDA, CONSTRUCCION Y SANEAMIENTO',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'DIRECTORIO DE GERENTES REGIONALES',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'DIRECTORIO-APR',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA GENERAL REGIONAL',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA REGIONAL DE ADMINISTRACION',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA REGIONAL DE ASESORIA JURIDICA',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA REGIONAL DE COMERCIO EXTERIOR Y TURISMO',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA REGIONAL DE DESARROLLO AGRARIO Y RIEGO',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA REGIONAL DE DESARROLLO DE LOS PUEBLOS ORIGINARIOS',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA REGIONAL DE DESARROLLO ECONOMICO',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA REGIONAL DE DESARROLLO FORESTAL Y DE FAUNA SILVESTRE',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA REGIONAL DE DESARROLLO SOCIAL',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA REGIONAL DE EDUCACION DE LORETO',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA REGIONAL DE INFRAESTRUCTURA',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA REGIONAL DE PLANEAMIENTO, PRESUPUESTO E INVERSION PUBLICA',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA REGIONAL DE RECURSOS HUMANOS',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA REGIONAL DE SALUD',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA REGIONAL DE SEGURIDAD CIUDADANA',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA REGIONAL DE TECNOLOGIA DE LA INFORMACION',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA REGIONAL DE TRANSPORTES Y COMUNICACIONES',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA REGIONAL DEL AMBIENTE',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA SUB REGIONAL DE ALTO AMAZONAS - YURIMAGUAS',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA SUB REGIONAL DE LORETO - NAUTA',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA SUB REGIONAL DE RAMON CASTILLA - CABALLO COCHA',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA SUB REGIONAL DE REQUENA - REQUENA',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA SUB REGIONAL DE UCAYALI - CONTAMANA',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA SUB REGIONAL DE YAQUERANA - COLONIA ANGAMOS',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA SUB REGIONAL DEL DATEM DEL MARAÑÓN - SAN LORENZO',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA SUB REGIONAL DEL NAPO - SANTA CLOTILDE',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                [
                     'name' => 'GERENCIA SUB REGIONAL DEL PUTUMAYO - EL ESTRECHO',
                     'created_at' => Carbon\Carbon::now(),
                     'updated_at' => Carbon\Carbon::now()
                ],
                ['name' => 'MESA DE PARTES', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA DE ASESORIA DE LA PRESIDENCIA', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA DE ADMINISTRACION DOCUMENTARIA', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA DE ASESORIA JURIDICA - GRDFFS', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA DE COORDINACIÓN REGIONAL - UTMFC', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA DE COORDINACION Y ENLACE LIMA', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA DE PARTICIPACION CIUDADANA', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA DE SECRETARIA TECNICA DE LOS PROCEDIMIENTOS ADMINISTRATIVOS DISCIPLINARIOS', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA EJECUTIVA DE ACONDICIONAMIENTO TERRITORIAL Y DESARROLLO FRONTERIZO', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA EJECUTIVA DE COBRANZA COACTIVA', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA EJECUTIVA DE CONTABILIDAD', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA EJECUTIVA DE CONTROL PATRIMONIAL', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA EJECUTIVA DE DESARROLLO INSTITUCIONAL Y PROCESOS', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA EJECUTIVA DE GESTION DOCUMENTAL Y ATENCION AL CIUDADANO', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA EJECUTIVA DE GESTIÓN Y DESARROLLO DE RR.HH', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA EJECUTIVA DE INFRAESTRUCTURA TECNOLOGICA', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA EJECUTIVA DE LOGISTICA - AREA DE COORDINACION INTERNA DE SERVICIOS', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA EJECUTIVA DE LOGISTICA - BIENES', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA EJECUTIVA DE LOGISTICA - INTERNA DE ALMACEN', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA EJECUTIVA DE LOGISTICA Y SERVICIOS GENERALES', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA EJECUTIVA DE MAQUINARIA,VEHÍCULOS MENORES Y FLUVIALES', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA EJECUTIVA DE PLANEAMIENTO Y ESTADISTICA', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA EJECUTIVA DE PRESUPUESTO', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA EJECUTIVA DE PROGRAMACION MULTIANUAL DE INVERSIONES', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA EJECUTIVA DE SISTEMAS DE INFORMACION', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA EJECUTIVA DE TESORERIA', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA REGIONAL DE ARCHIVO-REGIÓN LORETO', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA REGIONAL DE ATENCIÓN A LA PERSONA CON DISCAPACIDAD', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA REGIONAL DE COMUNICACIONES E IMAGEN INSTITUCIONAL', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA REGIONAL DE DEFENSA NACIONAL Y GESTION DE RIESGOS DE DESASTRES', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OFICINA REGIONAL DE DIALOGO, PREVENCIÓN Y GESTIÓN DE CONFLICTOS SOCIALES', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OPIPP - COMITE DE PROCESOS DE SELECCION', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OPIPP - DIRECCION DE ADMINISTRACION', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OPIPP - DIRECCION DE ASESORIA JURIDICA', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OPIPP - DIRECCION DE INGENIERIA', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OPIPP - DIRECCION DE PLANEAMIENTO Y PRESUPUESTO', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OPIPP - DIRECCION EJECUTIVA', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OPIPP - OFICINA DE CONTABILIDAD', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OPIPP - OFICINA DE LOGISTICA', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OPIPP - OFICINA DE RECURSOS HUMANOS', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OPIPP - OFICINA DE TESORERIA', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OPIPP - OFICINA DE UNIDAD FORMULADORA', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OPIPP - OFICINA ESTUDIOS Y PROYECTOS', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'OPIPP-MESA DE PARTE', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'ORGANISMO PUBLICO DE INFRAESTRUCTURA PARA LA PRODUCTIVIDAD-OPIPP', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'ORGANISMO TECNICO DE ADMINISTRACION ESPECIAL-OTAE', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'ORGANO DE CONTROL INSTITUCIONAL', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'PLATAFORMA REGIONAL DE DEFENSA CIVIL', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'PORTAL DE TRANSPARENCIA ESTANDAR', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'PRENSA - IMAGEN INSTITUCIONAL', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
                ['name' => 'PRESIDENCIA', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'PROCURADURIA PUBLICA REGIONAL', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'PROGRAMA REGIONAL DE CREDITOS', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'PROTOCOLO - IMAGEN INSTITUCIONAL', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'PROYECTO ESPACIOS VERDES GERFOR CUI 2483629', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'PROYECTO MEJORAMIENTO DE LOS SERVICIOS DE INFORMACION EN INFRAESTRUCTURA DIGITAL Y EQUIPAMIENTO TECNOLOGICO DE LA SEDE CENTRAL', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SECRETARIA DEL CONSEJO REGIONAL', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SECRETARIA TECNICA DE LA APRL', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SECRETARIA TECNICA DEL COMITE REGIONAL DE DESARROLLO DE FRONTERA E INTEGRACION FRONTERIZA', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SECRETARIO TECNICO DE LA PLATAFORMA DE DEFENSA CIVIL DEL GOBIERNO REGIONAL DE LORETO', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SINDICATO UNICO DE TRABAJADORES DEL GOREL', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SINDICATO UNITARIO DE TRABAJADORES', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SUB GERENCIA REGIONAL DE ASUNTOS INTERCULTURALES', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SUB GERENCIA DE PROMOCIÓN CULTURAL', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SUB GERENCIA DE TURISMO - GRCEYT', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SUB GERENCIA REGIONAL DE ARTICULACION INTERSECTORIAL', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SUB GERENCIA REGIONAL DE CONSERVACION Y DIVERSIDAD BIOLOGICA', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SUB GERENCIA REGIONAL DE ESTUDIOS Y PROYECTOS', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SUB GERENCIA REGIONAL DE GESTION AMBIENTAL', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SUB GERENCIA REGIONAL DE GESTION DE FAUNA SILVESTRE', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SUB GERENCIA REGIONAL DE GESTION FORESTAL', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SUB GERENCIA REGIONAL DE OBRAS', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SUB GERENCIA REGIONAL DE ORDENAMIENTO TERRITORIAL Y DATOS ESPACIALES', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SUB GERENCIA REGIONAL DE PROGRAMAS SOCIALES', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SUB GERENCIA REGIONAL DE PROMOCION COMERCIAL', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SUB GERENCIA REGIONAL DE PROMOCION CULTURAL Y DE DEPORTES', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SUB GERENCIA REGIONAL DE PROMOCION DE INVERSIONES', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SUB GERENCIA REGIONAL DE SUPERVISION Y CONTROL DE OBRAS', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SUB GERENCIA REGIONAL DE SUPERVISION, FISCALIZACION Y CONTROL FORESTAL Y DE FAUNA SILVESTRE', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'SUPERVISION DEL PROYECTO MEJORAMIENTO DE LOS SERVICIOS DE INFORMACION EN INFRAESTRUCTURA DIGITAL Y EQUIPAMIENTO TECNOLOGICO DE LA SEDE CENTRAL', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UGFFS-PROVINCIA UCAYALI-GRDFFS', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UGFFS-PROVINCIA ALTO AMAZONAS-GRDFFS', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UGFFS-PROVINCIA DATEM DEL MARAÃ?ON-GRDFFS', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UGFFS-PROVINCIA LORETO NAUTA-GRDFFS', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UGFFS-PROVINCIA MAYNAS-GRDFFS', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UGFFS-PROVINCIA PUTUMAYO-GRDFFS', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UGFFS-PROVINCIA RAMON CASTILLA-GRDFFS', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UGFFS-PROVINCIA REQUENA-GRDFFS', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UNIDAD DE AREAS VERDES - LOGISTICA', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UNIDAD DE CARPINTERIA - LOGISTICA', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UNIDAD DE CENTRAL TELEFONICA - LOGISTICA', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UNIDAD DE ELECTRICIDAD', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UNIDAD DE LIMPIEZA - LOGISTICA', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UNIDAD DE SEGURIDAD - LOGISTICA', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UNIDAD EJECUTORA DE INVERSIONES - GRDFFS', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UNIDAD FORMULADORA', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UNIDAD FORMULADORA - GRDE', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UNIDAD FORMULADORA - GRDFFS', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UNIDAD FORMULADORA - GRI', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UNIDAD FORMULADORA - OREDIS', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UNIDAD FORMULADORA DE LA GERENCIA REGIONAL DE DESARROLLO DE LOS PUEBLOS ORIGINARIOS', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UNIDAD FUNCIONAL DE GESTION DE LA INFORMACION FORESTAL Y DE FAUNA SILVESTRE - GERFOR', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UNIDAD FUNCIONAL DE INTEGRIDAD INSTITUCIONAL', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'UNIDAD FUNCIONAL DE MANEJO FORESTAL COMUNITARIO - GERFOR', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
           ['name' => 'VICEGOBERNACION', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()]      
        ];

        DB::table('dependence')->insert($list);
    }
}
