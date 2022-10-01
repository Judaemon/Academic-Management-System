<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'id' => '1',
            'firstname' => 'Super Admin',
            'lastname' => 'Super Admin',
            'email' => 'sadmin@sadmin.com',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('sadmin123'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        // ->assignRole('Super Admin');

        // User::create([
        //     'id' => '2',
        //     'firstname' => 'stafff',
        //     'lastname' => 'staffl',
        //     'email' => 'staff@staff.com',
        //     'account_type' => 'Staff',
        //     'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'password' => Hash::make('staff'),
        //     'remember_token' => NULL,
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ])
        // ->assignRole('Staff');

        
        User::create([
            'id' => '3',
            'firstname' => 'teacherf',
            'lastname' => 'teacherl',
            'email' => 'teacher@teacher.com',
            'account_type' => 'Teacher',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('teacher'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Teacher');

        User::create([
            'id' => '4',
            'firstname' => 'studentf',
            'lastname' => 'studentl',
            'email' => 'student@student.com',
            'account_type' => 'Student',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('student'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Student');
    }
}
