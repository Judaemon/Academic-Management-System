<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'Super Admin']);

        Role::create(['name' => 'Admin'])
        ->syncPermissions([
            'view_users',
            'create_user',
            'read_user',
            'update_user',

            'view_roles',
            'create_role',
            'read_role',
            'update_role',

            'view_system',
        ]);

        Role::create(['name' => 'Teacher']);
        // ->syncPermissions([
        //     // for viewing students (?)
        //     'view_users',
        //     'read_user',

        //     // can CRUD grades
        //     'view_grades',
        //     'create_grade',
        //     'read_grade',
        //     'update_grade',
        // ]);

        Role::create(['name' => 'Accountant']);

        Role::create(['name' => 'Student']);
        // ->syncPermissions([
        //     // view or read only
        //     'view_users',
        //     'read_user',

        //     'view_grades',
        //     'read_grade',

        //     'view_sections',
        //     'read_section',
        // ]);
    }
}
