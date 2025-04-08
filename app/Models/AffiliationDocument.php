<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliationDocument extends Model
{
    protected $table = "affiliation_document";

    protected $fillable =
        [
            'foto_size_carnet',
            'job_app',
            'home_certificate',
            'presentatio_document',
            'declaration_sworn_goods',
            'health_certificate',
            'judicial_certificate',
            'police_certificate',
            'birth_certificate',
            'title_nationalized',
            'marriage_certificate_nationality',
            'country_visa',
            'resolution_disability',
            'copy_essalud',
            'document_fap',
            'cv',
            'dni_legalized',
            'marriage_certificate',
            'notarial_of_coexistence',
            'children_document',
            'nationality_document',
            'path_foto_size_carnet',
            'path_job_app',
            'path_home_certificate',
            'path_presentatio_document',
            'path_declaration_sworn_goods',
            'path_health_certificate',
            'path_judicial_certificate',
            'path_police_certificate',
            'path_birth_certificate',
            'path_title_nationalized',
            'path_marriage_certificate_nationality',
            'path_country_visa',
            'path_resolution_disability',
            'path_copy_essalud',
            'path_document_fap',
            'path_cv',
            'path_dni_legalized',
            'path_marriage_certificate',
            'path_notarial_of_coexistence',
            'path_children_document',
            'path_nationality_document'
        ];
}
