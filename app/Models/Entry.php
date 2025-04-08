<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $table = 'aditional_fields_entries';

    protected $fillable = [
        'tipo',
        'contract_time_years',
        'contract_time_months',
        'contract_time_days',
        'dependency',
        'category',
        'charge',
        'id_user',
        'id_resolution',
    ];
}
