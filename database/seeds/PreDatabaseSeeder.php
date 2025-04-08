<?php

use Illuminate\Database\Seeder;

class PreDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET @@auto_increment_increment = 1;');
        DB::statement('SET @@auto_increment_offset = 1;');
        
        $tables = DB::select('SHOW TABLES');

        foreach ($tables as $table) {
            $tableName = head($table);
            
            DB::update('ALTER TABLE `' . $tableName . '` AUTO_INCREMENT = 1;');
        }
    }
}
