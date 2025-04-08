<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LicensingAuthorization extends Model
{
    protected $table = 'licensing_authorization';
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
