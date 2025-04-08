<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuspensionVacation extends Model
{
    protected $table = 'suspension_vacation_authorization';
    protected $fillable = [
        'date_start',
        'date_end',
        'number_days',
        'comment',
        'id_resolution',
        'license_resolution_type',
        'suspension_document_type'
    ];
}
