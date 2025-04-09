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
                'name' => 'Rectorado',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Vicerrectorado Académico',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Vicerrectorado de Investigación',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Escuela de Postgrado',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Oficina de Asesoría Legal',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Oficina de Imagen Institucional',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Oficina de Relaciones Interinstitucionales y Cooperación',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Dirección General de Investigación',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Dirección General de Administración',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Unidad Ejecutiva de Contabilidad',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Unidad Ejecutiva de Tesorería',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Unidad Ejecutiva de Abastecimiento',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Oficina de Control Patrimonial',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Órgano Encargado de Contrataciones de la Entidad',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Oficina Central de Administración de Recursos Humanos',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Oficina General de Planificación y Presupuesto',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Oficina General de Bienestar Universitario',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Oficina General de Extensión y Proyección Universitaria',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Oficina General de Registro y Asuntos Académicos',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Oficina General de Calidad Universitaria',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Oficina Central de Servicios Generales y Transporte',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Oficina General de Investigación',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Oficina General de Infraestructura',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Biblioteca Central',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Dirección de Seguimiento del Graduado',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Colegio Experimental de la UNAP (CEUNAP)',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Centro de Idiomas',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Centro de Investigaciones de Recursos Naturales de la Amazonía (CIRNA)',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Institución Educativa Inicial “María Reiche”',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Facultad de Agronomía',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Facultad de Ciencias Biológicas',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Facultad de Ciencias de la Educación y Humanidades',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Facultad de Ciencias Económicas y de Negocios',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Facultad de Ciencias Forestales',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Facultad de Derecho y Ciencias Políticas',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Facultad de Enfermería',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Facultad de Farmacia y Bioquímica',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Facultad de Industrias Alimentarias',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Facultad de Ingeniería Química',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Facultad de Ingeniería de Sistemas e Informática',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Facultad de Medicina Humana',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Facultad de Odontología',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],[
                'name' => 'Facultad de Zootecnia',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ]
        ];

        DB::table('dependence')->insert($list);
    }
}
