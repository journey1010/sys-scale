<?php

namespace App\Models\PersonalIdentification;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonalIdentificationParent extends Model
{
    use SoftDeletes;

    protected $table = 'personal_identification_parent';

    protected $fillable = [
        'name',
        'surname',
        'life_state',
        'id_user'
    ];

    protected $hidden = [

    ];

    protected $dates = ['deleted_at'];

}
