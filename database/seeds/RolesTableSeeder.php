<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('roles')->insert([[
            'name' => 'admin',
            'display_name' => 'Administrador',
            'description' => 'Administrator of the system.',
            'created_at' => \Carbon\Carbon::now()
        ],[
            'name' => 'personal',
            'display_name' => 'Personal',
            'description' => 'Employee of the system.',
            'created_at' => \Carbon\Carbon::now()
        ]]);
    }
}
 