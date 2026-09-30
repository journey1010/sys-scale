<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 13/09/2017
 * Time: 11:57
 */

namespace App\ViewModels\Entry;

use Illuminate\Support\Collection;

class IndexViewModel
{
    //Inicializar a coleccion vacia en vez de dejarlos en null: las vistas
    //hacen $model->resolutions->isEmpty() y foreach, que reventan con
    //"Call to a member function isEmpty() on null" cuando el controller
    //devuelve la vista sin haberlos llenado (por ejemplo, sin $id).
    /** @var Collection */
    public $entries;
    /** @var Collection */
    public $resolutions;
    public $user_id;
    public $section_id;

    public function __construct()
    {
        $this->entries = collect();
        $this->resolutions = collect();
    }
}