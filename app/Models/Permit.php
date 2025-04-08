<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    protected $table = 'aditional_fields_permit_eco_benefit';

    protected $fillable = [
        'tipo',
        'quinquenio',
        'fecha_cumplimiento_quinquenio',
        'beneficio_otorgado',
        'monto_otorgado',
        'id_user',
        'id_resolution'
    ];
}