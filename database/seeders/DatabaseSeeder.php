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
            StudentSeeder::class,

            AcademicYearSeeder::class,
            SettingSeeder::class,

            AnnouncementSeeder::class,

            ProgramSeeder::class,
            GradeLevelSeeder::class,

            SectionSeeder::class,
            SubjectSeeder::class,
            GradeSeeder::class,
            AttendanceSeeder::class,

            AdmissionSeeder::class,

            FeeSeeder::class,
        ]);
    }
}
