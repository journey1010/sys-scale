<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'name' => 'Joseph',
            'first_surname' => 'Colonia',
            'second_surname' => 'Sanchez',
            'username' => 'administrador',
            'email' => 'administrador@regionloreto.gob.pe',
            'password' => bcrypt('Enchufate.2018'),
            'profileEnable' => true,
            'created_at' => \Carbon\Carbon::now()
        ],[
            'name' => 'Pedro',
            'first_surname' => 'Yarleque',
            'second_surname' => 'Yarleque',
            'username' => 'personal',
            'email' => 'personal@regionloreto.gob.pe',
            'password' => bcrypt('Enchufate.2018'),
            'profileEnable' => false,
            'created_at' => \Carbon\Carbon::now()
        ]]);
    }
}
