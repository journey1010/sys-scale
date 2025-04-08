<?php
/**
 * Created by PhpStorm.
 * User: kanzaki
 * Date: 15/09/17
 * Time: 12:18 PM
 */

namespace App\Models\AcademicInformation;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class MasterDoctorDegree extends Model
{
    use SoftDeletes;

    protected $table = 'master_doctor_degree';

    protected $fillable = [
        'id', 'concentration', 'name_school', 'id_user', 'date_expedition',
        'date_begin', 'date_end', 'url_certificate', 'state_validation',
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