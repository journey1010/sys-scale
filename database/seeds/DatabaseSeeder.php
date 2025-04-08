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
        $this->call(PreDatabaseSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UserRoleTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(ProvinceTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
        $this->call(EntriesTableSeeder::class);
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
