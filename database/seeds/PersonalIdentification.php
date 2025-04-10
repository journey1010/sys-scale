<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonalIdentification extends Seeder
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
                'id_user' => 2,
                'id_labor_conditional' => null,
                'id_dependence' => null,
                'id_affiliation_document' => 1,
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ]
        ];

        DB::table('personal_identification')->insert($list);
    }
}
