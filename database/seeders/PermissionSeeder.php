<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    
    // potential permissions
    // assign_role
    // 
    
    public function run()
    {
        $user_permissions = [
            'view_users',
            'create_user',
            'read_user',
            'update_user',
            'delete_user',
        ];

        foreach ($user_permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $role_permissions = [
            'view_roles',
            'create_role',
            'read_role',
            'update_role',
            'delete_role',
        ];
        
        foreach ($role_permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $system_permissions = [
            'view_system',
            'read_system',
            'update_system',
        ];
        
        foreach ($system_permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
