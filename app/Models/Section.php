<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'section';

    protected $fillable = [
        'id',
        'name',
        'alias'
    ];

    protected $hidden = [

    ];
}
