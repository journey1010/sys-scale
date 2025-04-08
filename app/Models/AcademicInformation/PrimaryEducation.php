<?php

namespace App\Models\AcademicInformation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrimaryEducation extends Model
{
    use SoftDeletes;

    protected $table = 'primary_education';

    protected $fillable = [
        'id','name_school', 'id_user', 'id_district',
        'id_department', 'id_province', 'date_begin',
        'date_end', 'url_certificate', 'state_validation',
        'years_diff', 'months_diff', 'days_diff'
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
