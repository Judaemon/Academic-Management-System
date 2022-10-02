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

        Role::create(['name' => 'Student']);
    }
}
