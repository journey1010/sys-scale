<?php

namespace App\Models\AcademicInformation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostgraduateInformation extends Model
{
    use SoftDeletes;

    protected $table = 'postgraduate_information';

    protected $fillable = [
        'id', 'concentration', 'name_school', 'id_user', 'date_expedition',
        'date_begin', 'date_end', 'url_certificate', 'state_validation', 'hours',
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