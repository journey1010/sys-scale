<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $table = 'aditional_fields_production_intelect';

    protected $fillable = [
        'tipo',
        'tipo_trabajo',
        'titulo_trabajo',
        'year',
        'id_user',
        'id_resolution'
    ];
}