<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'Super Admin']);

        // Employee
        Role::create(['name' => 'Admin'])
            ->syncPermissions([
                'view_users',
                'create_student',
                'create_account',
                'read_user',
                'update_user',

                'view_roles',
                'create_role',
                'read_role',
                'update_role',

                'view_announcement',
                'create_announcement',
                'update_announcement',
                'delete_announcement',

                'view_setting',

                'change_password',
            ]);

        Role::create(['name' => 'Teacher'])
            ->syncPermissions([
                // for viewing students (?)
                'view_users',
                'read_user',

                // can CRUD grades
                //'view_grades',
                'assign_grades',
                
                'create_grade',
                'read_grade',
                'update_grade',
                'delete_grade',

                'view_attendance',
                'create_attendances',
                'read_attendances',
                'update_attendances',
                'delete_attendances',

                'change_password',
            ]);

        Role::create(['name' => 'Accountant'])
            ->syncPermissions([
                'create_fee',
                'update_fee',
                'delete_fee',

                'read_payment',
                'create_payment',
                'delete_payment',

                'view_fees',
                'view_payments',

                'change_password',
            ]);;
        // Employee

        Role::create(['name' => 'Student'])
            ->syncPermissions([
                // view or read only
                'view_users',
                'read_user',

                'view_grades',
                'read_grade',

                'view_sections',
                'read_section',

                'change_password',
            ]);
    }
}
