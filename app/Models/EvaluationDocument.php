<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluationDocument extends Model
{

    protected $table = 'evaluation_document';

    protected $fillable = [
        'tipo',
        'fecha_emision',
        'puntaje',
        'calificacion',
        'observaciones',
        'informepath',
        'informeurl',
        'id_resolution',
        'created_at',
        'update_at'
    ];

}
