<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermitAuthorization extends Model
{
    protected $table = 'permit_authorization';
    protected $fillable = [
        'date_start',
        'date_end',
        'number_days',
        'comment',
        'id_resolution',
        'with_remunerations',
        'permit_reason'
    ];
}
