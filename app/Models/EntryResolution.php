<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 3/10/2017
 * Time: 18:16
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class EntryResolution
{
    protected $table = 'entryResolution';

    protected $fillable = [
        'resolutionNumber',
        'resolutionType',
        'issueDate',
        'issuingOrgan',
        'startDate',
        'endDate',
        'description',
        'constancyUrl',
        'constancyPath',
        'state',
        'id_user',
    ];
}