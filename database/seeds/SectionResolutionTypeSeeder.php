<?php

use Illuminate\Database\Seeder;

class SectionResolutionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('section_resolution_type')->insert([
            //
            //---INICIO SECCIÓN TRAYECTORIA LABORAL
            [
                'id_section' => DB::table('section')->where('alias', 'trayectoriaLaboral')->first()->id,
                'id_resolution_type' => DB::table('resolution_type')->where('alias', 'designacion')->first()->id,
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id_section' => DB::table('section')->where('alias', 'trayectoriaLaboral')->first()->id,
                'id_resolution_type' => DB::table('resolution_type')->where('alias', 'destaque')->first()->id,
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id_section' => DB::table('section')->where('alias', 'trayectoriaLaboral')->first()->id,
                'id_resolution_type' => DB::table('resolution_type')->where('alias', 'rotacion')->first()->id,
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id_section' => DB::table('section')->where('alias', 'trayectoriaLaboral')->first()->id,
                'id_resolution_type' => DB::table('resolution_type')->where('alias', 'encargo')->first()->id,
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id_section' => DB::table('section')->where('alias', 'trayectoriaLaboral')->first()->id,
                'id_resolution_type' => DB::table('resolution_type')->where('alias', 'reasignacion')->first()->id,
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id_section' => DB::table('section')->where('alias', 'trayectoriaLaboral')->first()->id,
                'id_resolution_type' => DB::table('resolution_type')->where('alias', 'permuta')->first()->id,
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id_section' => DB::table('section')->where('alias', 'trayectoriaLaboral')->first()->id,
                'id_resolution_type' => DB::table('resolution_type')->where('alias', 'ascenso')->first()->id,
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id_section' => DB::table('section')->where('alias', 'trayectoriaLaboral')->first()->id,
                'id_resolution_type' => DB::table('resolution_type')->where('alias', 'transferencia')->first()->id,
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id_section' => DB::table('section')->where('alias', 'trayectoriaLaboral')->first()->id,
                'id_resolution_type' => DB::table('resolution_type')->where('alias', 'reubicacionPersonal')->first()->id,
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id_section' => DB::table('section')->where('alias', 'trayectoriaLaboral')->first()->id,
                'id_resolution_type' => DB::table('resolution_type')->where('alias', 'incorporacionAuxiliares')->first()->id,
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id_section' => DB::table('section')->where('alias', 'trayectoriaLaboral')->first()->id,
                'id_resolution_type' => DB::table('resolution_type')->where('alias', 'incorporacionProfesoresNombrados')->first()->id,
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id_section' => DB::table('section')->where('alias', 'trayectoriaLaboral')->first()->id,
                'id_resolution_type' => DB::table('resolution_type')->where('alias', 'incorporacionProfesores')->first()->id,
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id_section' => DB::table('section')->where('alias', 'trayectoriaLaboral')->first()->id,
                'id_resolution_type' => DB::table('resolution_type')->where('alias', 'reconocimientoPagoContrato')->first()->id,
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'id_section' => DB::table('section')->where('alias', 'trayectoriaLaboral')->first()->id,
                'id_resolution_type' => DB::table('resolution_type')->where('alias', 'nombramiento')->first()->id,
                'created_at' => \Carbon\Carbon::now()
            ]
            //---FIN SECCIÓN TRAYECTORIA LABORAL
            //


            //TODO: Agregar las relaciones entre secciones y tipos de resolución faltantes

        ]);
    }
}
