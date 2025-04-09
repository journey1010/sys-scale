<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => 'dev',
            'first_surname' => 'dev',
            'second_surname' => 'dev',
            'username' => 'devuser',
            'email' => 'administrador@regionloreto.gob.pe',
            'password' => bcrypt('Hola5.2'),
            'profileEnable' => true,
            'created_at' => \Carbon\Carbon::now()
        ],
        [
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