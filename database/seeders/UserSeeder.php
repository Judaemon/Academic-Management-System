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
            'firstname' => 'Super Admin',
            'middlename' => 'Super Admin',
            'lastname' => 'Super Admin',
            'suffix' => 'SA',
            'birthdate' => '2000-10-21',
            'birthplace' => 'Baguio City',
            'religion' => 'Catholic',
            'gender' => 'Male',
            'mothertongue' => 'English',
            'nationality' => 'Filipino',
            'pwdid' => 'ASDF1234',
            'height' => '168',
            'weight' => '70',
            'mobilenumber' => '09176820721',
            'email' => 'sadmin@sadmin.com',
            'address' => 'Guisad Central, Baguio City',
            'school_kinder' => 'SLU-LES',
            'school_kindergrad' => '2007',
            'school_elementary' => 'Calvary Baptist Elementary School',
            'school_elementarygrad' => '2010',
            'school_juniorhigh' => 'University of Baguio',
            'lrn' => 'QWER1234',
            'esc' => 'ZXCV1234',
            'qvr' => 'HJKL1234',
            'public' => 'UIOP1234',
            'beneficiary' => 'Juan Dela Cruz',
            'guardian_name' => 'John Doe',
            'guardian_number' => '09176820722',
            'guardian_occupation' => 'Pastor',
            'guardian_address' => 'Trancoville',
            'guardian_relationship' => 'Uncle',
            'mparent_name' => 'Jane Doe',
            'mparent_number' => '09176820723',
            'mparent_occupation' => 'Teacher',
            'mparent_address' => 'General Luna',
            'fparent_name' => 'Jonathan Doe',
            'fparent_number' => '09176820724',
            'fparent_occupation' => 'Police',
            'fparent_address' => 'General Luna',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('sadmin123'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Super Admin');

        //Accountant
        User::create([
            'firstname' => 'Leonardo',
            'middlename' => 'Haroon',
            'lastname' => 'Jamie',
            'suffix' => 'SA',
            'birthdate' => '1995-12-01',
            'birthplace' => 'Baguio City',
            'religion' => 'Catholic',
            'gender' => 'Male',
            'mothertongue' => 'English',
            'nationality' => 'Filipino',
            'height' => '170',
            'weight' => '70',
            'mobilenumber' => '09164739198',
            'email' => 'leonardJamie@a.caims.com',
            'address' => 'Guisad Central, Baguio City',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('finance'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Accountant');

        User::create([
            'firstname' => 'Julie',
            'middlename' => 'Ambakols',
            'lastname' => 'Killi',
            'suffix' => 'Ms.',
            'birthdate' => '1998-11-01',
            'birthplace' => 'Baguio City',
            'religion' => 'Catholic',
            'gender' => 'Female',
            'mothertongue' => 'English',
            'nationality' => 'Filipino',
            'height' => '150',
            'weight' => '58',
            'mobilenumber' => '09165438293',
            'email' => 'julsKilli@t.caims.com',
            'address' => 'Guisad Central, Baguio City',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('teacher'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Teacher');

        
        User::create([
            'firstname' => 'Alexander',
            'middlename' => 'Churro',
            'lastname' => 'Am-uno',
            'suffix' => 'Mr.',
            'birthdate' => '2013-08-01',
            'birthplace' => 'Baguio City',
            'religion' => 'Catholic',
            'gender' => 'Male',
            'mothertongue' => 'English',
            'nationality' => 'Filipino',
            'height' => '124',
            'weight' => '43',
            'mobilenumber' => '09158390231',
            'email' => 'alexanderamuno@s.caims.com',
            'address' => 'Guisad Central, Baguio City',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('student'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Students');
    }
}
