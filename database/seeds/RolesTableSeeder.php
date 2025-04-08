<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('roles')->insert([[
            'name' => 'admin',
            'display_name' => 'Administrador',
            'description' => 'Encargado de gestionar las solicitudes y datos del personal.',
            'created_at' => \Carbon\Carbon::now()
        ],[
            'name' => 'personal',
            'display_name' => 'Personal',
            'description' => 'Personal de la institución.',
            'created_at' => \Carbon\Carbon::now()
        ]]);
    }
}
