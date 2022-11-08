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
            UserSeeder::class,

            AcademicYearSeeder::class,
            SettingSeeder::class,

            ProgramSeeder::class,
            GradeLevelSeeder::class,
            AnnouncementSeeder::class,

            SectionSeeder::class,
            SubjectSeeder::class,
            SectionSeeder::class,

            AdmissionSeeder::class,

            FeeSeeder::class,
        ]);
    }
}
