<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('section')->insert([
            ['name' => 'Informacion personal y familiar', 'alias' => 'informacionPersonal', 'created_at' => Carbon::now()],
            ['name' => 'Incorporación', 'alias' => 'incorporacion', 'created_at' => Carbon::now()],
            ['name' => 'Formación Académica', 'alias' => 'formacionAcademica', 'created_at' =>  Carbon::now()],
            ['name' => 'Experiencia laboral', 'alias' => 'experienciaLaboral', 'created_at' => Carbon::now()],
            ['name' => 'Movimientos Personal', 'alias' => 'movimientosPersonal', 'created_at' => Carbon::now()],
            ['name' => 'Compensaciones', 'alias' => 'compensaciones', 'created_at' => Carbon::now()],
            ['name' => 'Evaluación de desempeño, progresión en la carrera y desplazamiento', 'alias' => 'EvaluacionDesempeñoProgresiónCarreraDesplazamiento', 'created_at' => Carbon::now()],
            ['name' => 'Reconocimiento y sanciones disciplinarias', 'alias' => 'reconocimientoSancionesDisciplinarias', 'created_at' => Carbon::now()],
            ['name' => 'Relaciones laborales individuales y colectivas', 'alias' => 'relacionesLaboralesIndividualesColectivas', 'created_at' => Carbon::now()],
            ['name' => 'Seguridad y Salud en el Trabajo (SST) y bienestar social', 'alias' => 'seguridadSaludTrabajoBienestarSocial', 'created_at' => Carbon::now()],
            ['name' => 'Desvinculación', 'alias' => 'desvinculacion', 'created_at' => Carbon::now()],
            ['name' => 'Otros', 'alias' => 'otros', 'created_at' => Carbon::now()]
        ]);
    }
}
