<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LicenceTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('licence_type')->insert([[
            'name' => 'Vacaciones',
            'alias' => 'VAC',
            'created_at' => \Carbon\Carbon::now()
        ],[
            'name' => 'Licencias o permisos a cuenta de vacaciones',
            'alias' => 'LPCV',
            'created_at' => \Carbon\Carbon::now()
        ],[
            'name' => 'Licencias o permisos sin goce de haber',
            'alias' => 'LPSGH',
            'created_at' => \Carbon\Carbon::now()
        ],[
            'name' => 'Licencias por enfermedad',
            'alias' => 'LPE',
            'created_at' => \Carbon\Carbon::now()
        ],[
            'name' => 'Licencias por capacitación y comición de servicio',
            'alias' => 'LPCV',
            'created_at' => \Carbon\Carbon::now()
        ]]);
    }
}