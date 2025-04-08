<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionResolutionType extends Model
{
    protected $table = 'section_resolution_type';

    protected $fillable = [
        'id',
        'id_section',
        'id_resolution_type'
    ];

    protected $hidden = [

    ];
}
