<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ResolutionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resolution_type')->insert([
            ['name' => 'Designación', 'alias' => 'designacion', 'description' => 'Resoluciones de designación', 'flag_vacations' => false, 'created_at' => Carbon::now()],
            ['name' => 'Destaque', 'alias' => 'destaque', 'description' => 'Resoluciones de destaques', 'flag_vacations' => false, 'created_at' => Carbon::now()],
            ['name' => 'Rotación', 'alias' => 'rotacion', 'description' => 'Resoluciones de rotación', 'flag_vacations' => false, 'created_at' => Carbon::now()],
            ['name' => 'Encargo', 'alias' => 'encargo', 'description' => 'Resoluciones de encargo', 'flag_vacations' => false, 'created_at' => Carbon::now()],
            ['name' => 'Reasignación', 'alias' => 'reasignacion', 'description' => 'Resoluciones de reasignación', 'flag_vacations' => false, 'created_at' => Carbon::now()],
            ['name' => 'Permuta', 'alias' => 'permuta', 'description' => 'Resoluciones de permuta', 'flag_vacations' => false, 'created_at' => Carbon::now()],
            ['name' => 'Ascenso', 'alias' => 'ascenso', 'description' => 'Resoluciones de ascenso', 'flag_vacations' => false, 'created_at' => Carbon::now()],
            ['name' => 'Transferencia', 'alias' => 'transferencia', 'description' => 'Resoluciones de transferencia', 'flag_vacations' => false, 'created_at' => Carbon::now()],
            ['name' => 'Reubicación de personal', 'alias' => 'reubicacionPersonal', 'description' => 'Resoluciones de reubicación del personal administrativo', 'flag_vacations' => true, 'created_at' => Carbon::now()],
            ['name' => 'Incorporación de auxiliares', 'alias' => 'incorporacionAuxiliares', 'description' => 'Resoluciones de incorporación de auxiliares de educación al cargo de profesores', 'flag_vacations' => true, 'created_at' => Carbon::now()],
            ['name' => 'Reconocimiento de pago y/o contrato', 'alias' => 'reconocimientoPagoContrato', 'description' => 'Resoluciones de reconocimientos de pago y/o contratos', 'flag_vacations' => false, 'created_at' => Carbon::now()],
            ['name' => 'Nombramiento', 'alias' => 'nombramiento', 'description' => 'Resolución de nombramiento', 'flag_vacations' => false, 'created_at' => Carbon::now()],
            ['name' => 'Reingreso', 'alias' => 'reingreso', 'description' => 'Resolución de reingreso', 'flag_vacations' => false, 'created_at' => Carbon::now()],
            ['name' => 'Contratos Personales Educacion', 'alias' => 'contratosPersonalesEducacion', 'description' => 'Resolución de contratos personales en el sector educación', 'flag_vacations' => false, 'created_at' => Carbon::now()],
            ['name' => 'Reconocimiento Efecto Pago', 'alias' => 'reconocimientoEfectoPago', 'description' => 'Resolución de reconocimiento de efecto de pago', 'flag_vacations' => false, 'created_at' => Carbon::now()],
            ['name' => 'Termino Contrato Personal', 'alias' => 'terminoContratoPersonal', 'description' => 'Resolución de termino de contrato personal', 'flag_vacations' => false, 'created_at' => Carbon::now()],
        ]);
    }
}