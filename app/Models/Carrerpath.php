<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrerpath extends Model
{
    protected $table = 'aditional_carrerpath';
    protected $fillable = [
        'tipo',
        'denominacion_cargo',
        'motivo_cese',
        'nivel',
        'cargo',
        'dependencia',
        'fecha_inicio',
        'fecha_fin',
        'dias_laborados',
        'observaciones',
        'id_resolution',
        'created_at',
        'update_at'
    ];

}
