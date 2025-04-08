<?php

namespace App\Models\AcademicInformation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfessionalTitle extends Model
{
    use SoftDeletes;

    protected $table = 'professional_title';

    protected $fillable = [
        'id', 'concentration', 'name_college', 'id_user', 'number_register_title',
        'id_district', 'id_department', 'id_province', 'date_begin',
        'date_end', 'url_certificate', 'state_validation', 'date_register_title',
        'mention','years_diff', 'months_diff', 'days_diff'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    protected $dates = ['deleted_at'];
}