<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            [
                'name' => 'Ingresos o reingresos',
                'alias' => 'ingresosReingresos',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Trayectoria laboral',
                'alias' => 'trayectoriaLaboral',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Asignaciones e incentivos temporales, retenciones judiciales y pagos indebidos',
                'alias' => 'asignacionesIncentivos',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Retiro y régimen pensionario',
                'alias' => 'retiroRegimen',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Permisos y estímulos',
                'alias' => 'permisosEstimulos',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Méritos y Sanciones',
                'alias' => 'sanciones',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Licencias y vacaciones',
                'alias' => 'licenciasVacaciones',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Otros',
                'alias' => 'otros',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Renuncias y Liquidaciones',
                'alias' => 'renuncias',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Evaluaciones',
                'alias' => 'evaluacion',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Producción Intelectual',
                'alias' => 'produccionIntelectual',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Desplazamiento de Personal',
                'alias' => 'desplazamientoPersonal',
                'created_at' => \Carbon\Carbon::now()
            ]
        ]);
    }
}
