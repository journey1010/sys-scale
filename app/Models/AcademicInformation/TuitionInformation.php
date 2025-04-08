<?php

namespace App\Models\AcademicInformation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TuitionInformation extends Model
{
    use SoftDeletes;

    protected $table = 'tuition_information';

    protected $fillable = [
        'id', 'number_tuition', 'id_user',
        'url_certificate', 'state_validation'
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