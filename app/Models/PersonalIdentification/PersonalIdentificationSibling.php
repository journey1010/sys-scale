<?php

namespace App\Models\PersonalIdentification;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonalIdentificationSibling extends Model
{
    use SoftDeletes;

    protected $table = 'personal_identification_sibling';

    protected $fillable = [
        'name',
        'surname',
        'sex',
        'birth_date',
        'id_user'
    ];

    protected $hidden = [

    ];

    protected $dates = ['deleted_at'];

}
