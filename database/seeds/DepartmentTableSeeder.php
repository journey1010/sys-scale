<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $list = [
            ['name' => 'Amazonas'],
            ['name' => 'Áncash'],
            ['name' => 'Apurímac'],
            ['name' => 'Arequipa'],
            ['name' => 'Ayacucho'],
            ['name' => 'Cajamarca'],
            ['name' => 'Callao'],
            ['name' => 'Cusco'],
            ['name' => 'Huancavelica'],
            ['name' => 'Huánuco'],
            ['name' => 'Ica'],
            ['name' => 'Junín'],
            ['name' => 'La Libertad'],
            ['name' => 'Lambayeque'],
            ['name' => 'Lima'],
            ['name' => 'Loreto'],
            ['name' => 'Madre de Dios'],
            ['name' => 'Moquegua'],
            ['name' => 'Pasco'],
            ['name' => 'Piura'],
            ['name' => 'Puno'],
            ['name' => 'San Martín'],
            ['name' => 'Tacna'],
            ['name' => 'Tumbes'],
            ['name' => 'Ucayali']
        ];

        DB::table('department')->insert($list);
    }
}
