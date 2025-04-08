<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Displacement extends Model
{
    protected $table = 'aditional_fields_displacement_of_personal';

    protected $fillable = [
        'tipo',
        'charge',
        'dependencia_origen',
        'dependencia_destino',
        'displacement_time_years',
        'displacement_time_months',
        'displacement_time_days',
        'id_user',
        'id_resolution'
    ];
}