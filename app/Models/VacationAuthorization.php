<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VacationAuthorization extends Model
{
    protected $table = 'vacation_authorization';
    protected $fillable = [
        'date_start',
        'date_end',
        'number_days',
        'comment',
        'id_resolution',
        'license_resolution_type',
        'suspension_document_type',
        'memorando_type'
    ];
}
