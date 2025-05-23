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
        DB::table('users')->insert(
            [
            'name' => 'dev',
            'first_surname' => 'dev',
            'second_surname' => 'dev',
            'username' => 'devuser',
            'email' => 'ginopaflo001608@gmail.com',
            'password' => bcrypt('Hola5.2'),
            'profileEnable' => true,
            'created_at' => \Carbon\Carbon::now()
        ]);
    }
}