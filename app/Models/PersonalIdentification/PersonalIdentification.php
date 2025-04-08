<?php

namespace App\Models\PersonalIdentification;

use Illuminate\Database\Eloquent\Model;

class PersonalIdentification extends Model
{
    protected $table = 'personal_identification';

    protected $fillable = [
        'photo_path',
        'photo_url',
        'modular_code',
        'birth_date',
        'birth_id_department',
        'birth_id_province',
        'birth_id_district',
        'address',
        'home_id_department',
        'home_id_province',
        'home_id_district',
        'phone',
        'cellphone',
        'email',
        'dni',
        'sex',
        'blood_type',
        'employment_regime',
        'category',
        'position',
        'pension_regime',
        'pension_system',
        'affiliation_date',
        'cuspp',
        'essalud',
        'civil_status',
        'spouse_name',
        'spouse_surname',
        'id_user',
        'id_labor_conditional',
        'id_dependence',
        'id_affiliation_document'
    ];

    protected $hidden = [

    ];

}

//TODO: Cambiar modelo para reflejar comportamiento de nuevas vistas