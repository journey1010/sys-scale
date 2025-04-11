<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LaborConditional extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            ['name' => 'Funcionario - 276', 'created_at' => Carbon::now()],
            ['name' => 'Funcionario - CAS', 'created_at' => Carbon::now()], 
            ['name' => 'Funcionario - FAG', 'created_at' => Carbon::now()],
            ['name' => 'Nombrado - 276', 'creadted_at' =>  Carbon::now()],
            ['name' => 'CAS - Determinado', 'created_at' => Carbon::now()],
            ['name' => 'CAS - Indeterminado', 'created_at' => Carbon::now()],
            ['name' => 'CAS - Cautelar', 'created_at' => Carbon::now()],
            ['name' => 'CAS - Cosa juzgada', 'created_at' => Carbon::now()]
        ];
        
        DB::table('labor_conditional')->insert($list);
    }
}