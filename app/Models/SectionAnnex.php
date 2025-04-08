<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionAnnex extends Model
{
    protected $table = 'section_annex';

    protected $fillable = [
        'name',
        'description',
        'number_doc',
        'date',
        'file_path',
        'file_url',
        'id_section',
        'id_user'
    ];

    protected $hidden = [

    ];
}
