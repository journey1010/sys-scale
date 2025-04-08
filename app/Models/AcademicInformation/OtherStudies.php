<?php
/**
 * Created by PhpStorm.
 * User: kanzaki
 * Date: 15/09/17
 * Time: 05:09 PM
 */

namespace App\Models\AcademicInformation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OtherStudies extends Model
{
    use SoftDeletes;

    protected $table = 'others_studies';

    protected $fillable = [
        'id', 'name_studie', 'name_school', 'type_studie', 'id_user',
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