<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Special_License extends Model
{
    protected $table = 'special_license_authorization';
    protected $fillable = [
        'date_start',
        'date_end',
        'number_days',
        'comment',
        'id_resolution',
        'with_remunerations',
        'license_resolution_type'
    ];
}
