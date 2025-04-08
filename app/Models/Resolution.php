<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resolution extends Model
{
    use SoftDeletes;

    protected $table = 'resolution';
//    protected $dates = ['issue_date','start_date','end_date','created_at','deleted_at'];

    protected $fillable = [
        'id',
        'resolution_number',
        'id_resolution_type',
        'memorando_type',
        'issue_date',
        'issuing_organ',
        'start_date',
        'end_date',
        'description',
        'work_position',
        'workplace',
        'constancy_path',
        'constancy_url',
        'state_validation',
        'id_user',
        'id_section'
    ];

    protected $hidden = [];

}

//TODO: Cambiar modelo para reflejar comportamiento de nuevas vistas