<?php

use Illuminate\Database\Seeder;

class AffiliationDocument extends Seeder
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
                'foto_size_carnet' => null,
                'job_app' => null,
                'home_certificate' => null,
                'presentatio_document' => null,
                'declaration_sworn_goods' => null,
                'health_certificate' => null,
                'judicial_certificate' => null,
                'police_certificate' => null,
                'birth_certificate' => null,
                'title_nationalized' => null,
                'marriage_certificate_nationality' => null,
                'country_visa' => null,
                'resolution_disability' => null,
                'copy_essalud' => null,
                'document_fap' => null,
                'cv' => null,
                'dni_legalized' => null,
                'marriage_certificate' => null,
                'notarial_of_coexistence' => null,
                'children_document' => null,
                'nationality_document' => null,
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ]
        ];

        DB::table('affiliation_document')->insert($list);
    }
}
