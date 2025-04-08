<?php

use Illuminate\Database\Seeder;

class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entries')->insert([[
            'resolutionNumber' => '00545961',
            'resolutionType' => 'Original',
            'issueDate' => \Carbon\Carbon::now(),
            'issuingOrgan' => 'Derrama Magistral',
            'startDate' => \Carbon\Carbon::now(),
            'endDate' => \Carbon\Carbon::now(),
            'description' => 'Esto es una descripción',
            'constancyUrl' => 'www.google.com.pe',
            'constancyPath' => 'www.google.com.pe',
            'state' => 1,
            'id_user' => DB::table('users')->where('email', 'personal@regionloreto.gob.pe')->first()->id,
            'created_at' => \Carbon\Carbon::now()
        ],[
            'resolutionNumber' => '00895316',
            'resolutionType' => 'Original',
            'issueDate' => \Carbon\Carbon::now(),
            'issuingOrgan' => 'Ministerio de Educación',
            'startDate' => \Carbon\Carbon::now(),
            'endDate' => \Carbon\Carbon::now(),
            'description' => 'Esto es una descripción',
            'constancyUrl' => 'www.google.com.pe',
            'constancyPath' => 'www.google.com.pe',
            'state' => 1,
            'id_user' => DB::table('users')->where('email', 'personal@regionloreto.gob.pe')->first()->id,
            'created_at' => \Carbon\Carbon::now()
        ]]);
    }
}
