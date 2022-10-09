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
            SettingSeeder::class,
            UserSeeder::class,
            
            SectionSeeder::class,
            SubjectSeeder::class,
        ]);
    }
}
