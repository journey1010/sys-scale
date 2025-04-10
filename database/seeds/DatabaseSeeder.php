<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Actualmente en desuso para no generar conflictos con el seeder de la base de datos
        //$this->call(PreDatabaseSeeder::class);
        
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UserRoleTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(ProvinceTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
        
        //Actualmente en desuso para no generar conflictos con el seeder de la base de datos
        //$this->call(EntriesTableSeeder::class);
        
        $this->call(ResolutionTypeSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(SectionResolutionTypeSeeder::class);
        $this->call(LicenceTypeSeeder::class);
        $this->call(Dependence::class);
        $this->call(LaborConditional::class);
        $this->call(AffiliationDocument::class);
        $this->call(PersonalIdentification::class);
    }
}
