<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResolutionType extends Model
{
    protected $table = 'resolution_type';

    protected $fillable = [
        'id',
        'name',
        'alias',
        'description',
        'flag_vacations'
    ];

    protected $hidden = [

    ];
}
