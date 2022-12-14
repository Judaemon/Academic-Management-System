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

                'create_fee',
                'update_fee',
                'delete_fee',

                'read_payment',
                'create_payment',
                'update_payment',

                'view_payments',
                'view_fees',

                'view_roles',
                'create_role',
                'read_role',
                'update_role',

                'create_announcement',
                'update_announcement',
                'delete_announcement',

                'view_setting',

                'change_password',
            ]);

        Role::create(['name' => 'Teacher'])
            ->syncPermissions([
                // 'view_users',
                // 'read_user',

                'assign_grades',

                'create_grade',
                'read_grade',
                'update_grade',
                'delete_grade',

                'change_password',

                'update_emergency_contact_information',
                'update_contact_information',
            ]);

        Role::create(['name' => 'Accountant'])
            ->syncPermissions([
                'read_payment',
                'create_payment',
                'update_payment',

                'view_payments',

                'change_password',

                'update_emergency_contact_information',
                'update_contact_information',
            ]);;
        // Employee

        Role::create(['name' => 'Student'])
            ->syncPermissions([
                'view_grades',
                'read_grade',

                // 'view_users',
                // 'read_user',

                'create_payment',

                'change_password',

                'update_emergency_contact_information',
                'update_contact_information',
            ]);
    }
}
