<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dependence extends Model
{
    protected $table = "dependence";

    protected $fillable =
        [
            'name'
        ];
}
