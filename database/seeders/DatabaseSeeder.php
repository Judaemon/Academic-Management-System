<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            AcademicYearSeeder::class,
            SettingSeeder::class,
            UserSeeder::class,
            FeeSeeder::class,
            
            SectionSeeder::class,
            SubjectSeeder::class,
        ]);
    }
}
