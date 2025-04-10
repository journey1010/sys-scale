<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->insert([[
            'user_id' => DB::table('users')->where('email', 'administrador@regionloreto.gob.pe')->first()->id,
            'role_id' => DB::table('roles')->where('name', 'admin')->first()->id,
        ],[
            'user_id' => DB::table('users')->where('email', 'personal@regionloreto.gob.pe')->first()->id,
            'role_id' => DB::table('roles')->where('name', 'personal')->first()->id,
        ]]);
    }
}
