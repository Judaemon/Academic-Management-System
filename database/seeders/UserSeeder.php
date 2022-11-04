<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'first_name' => 'Super Admin',
            'middle_name' => 'Super Admin',
            'last_name' => 'Super Admin',
            'suffix' => 'SA',

            'birth_date' => '2000-10-21',
            'birthplace' => 'Baguio City',
            'nationality' => 'Filipino',
            'gender' => 'Male',
            'mother_tongue' => 'English',
            'religion' => 'Catholic',

            'weight' => '70',
            'height' => '168',
            'pwd_id' => 'ASDF1234',

            'mobile_number' => '09176820721',
            'email' => 'sadmin@sadmin.com',
            'address' => 'Guisad Central, Baguio City',

            'elementary_name' => 'Calvary Baptist Elementary School',
            'elementary_grad_date' => '2010',

            'junior_high_name' => 'University of Baguio',
            'junior_high_grad_date' => '2010',

            'lrn' => 'QWER1234',
            'esc' => 'ZXCV1234',
            'qvr' => 'HJKL1234',


            'mother_name' => 'Jane Doe',
            'mother_number' => '09176820723',
            'mother_email' => '09176820723',
            'mother_address' => 'General Luna',

            'father_name' => 'Jonathan Doe',
            'father_number' => '09176820724',
            'father_email' => '09176820724',
            'father_address' => 'General Luna',

            'emergency_contact_name' => 'John Doe',
            'emergency_contact_relationship' => 'Uncle',
            'emergency_contact_number' => '09176820722',
            'emergency_contact_address' => 'Trancoville',

            'password' => Hash::make('sadmin123'),

            'pag_ibig' => 'FSAD4235',
            'philhealth' => 'FADS4251',
            'sss' => 'DAFS2534',
            'tin' => 'SADF5234',

            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Super Admin');

        User::create([
            'first_name' => 'Alexander',
            'middle_name' => 'Churro',
            'last_name' => 'Am-uno',
            'suffix' => 'Mr.',

            'birth_date' => '2013-08-01',
            'birthplace' => 'Baguio City',
            'nationality' => 'Filipino',
            'gender' => 'Male',
            'mother_tongue' => 'English',
            'religion' => 'Catholic',

            'height' => '124',
            'weight' => '43',

            'mobile_number' => '09158390231',
            'email' => 'alexanderamuno@s.caims.com',
            'address' => 'Guisad Central, Baguio City',

            'emergency_contact_name' => 'John Doe',
            'emergency_contact_relationship' => 'Uncle',
            'emergency_contact_number' => '09176820766',
            'emergency_contact_address' => 'Trancoville',

            'password' => Hash::make('student'),

            'pag_ibig' => 'FSAD4239',
            'philhealth' => 'FADS4281',
            'sss' => 'DAFS2034',
            'tin' => 'SADF1434',

            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Admin');

        User::create([
            'first_name' => 'Leonardo',
            'middle_name' => 'Haroon',
            'last_name' => 'Jamie',
            'suffix' => 'SA',

            'birth_date' => '1995-12-01',
            'birthplace' => 'Baguio City',
            'nationality' => 'Filipino',
            'gender' => 'Male',
            'mother_tongue' => 'English',
            'religion' => 'Catholic',

            'height' => '170',
            'weight' => '70',

            'mobile_number' => '09164739198',
            'email' => 'leonardJamie@a.caims.com',
            'address' => 'Guisad Central, Baguio City',

            'emergency_contact_name' => 'John Doe',
            'emergency_contact_relationship' => 'Uncle',
            'emergency_contact_number' => '09176820733',
            'emergency_contact_address' => 'Trancoville',

            'pag_ibig' => 'FSDD4331',
            'philhealth' => 'FADS4431',
            'sss' => 'DAFS2154',
            'tin' => 'SADF1264',

            'password' => Hash::make('finance'),

            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Accountant');

        User::create([
            'first_name' => 'Julien',
            'middle_name' => 'Ambakod',
            'last_name' => 'Killi',
            'suffix' => 'Ms.',

            'birth_date' => '1998-11-01',
            'birthplace' => 'Baguio City',
            'nationality' => 'Filipino',
            'gender' => 'Female',
            'mother_tongue' => 'English',
            'religion' => 'Catholic',

            'height' => '150',
            'weight' => '58',

            'mobile_number' => '09165438293',
            'email' => 'julsKilli@t.caims.com',
            'address' => 'Guisad Central, Baguio City',

            'emergency_contact_name' => 'John Doe',
            'emergency_contact_relationship' => 'Uncle',
            'emergency_contact_number' => '09176820744',
            'emergency_contact_address' => 'Trancoville',

            'pag_ibig' => '4231FSAD',
            'philhealth' => 'FADS4221',
            'sss' => 'DAFS3134',
            'tin' => 'SADF1534',

            'password' => Hash::make('teacher'),

            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Teacher');

        User::create([
            'first_name' => 'Juliett',
            'middle_name' => 'Ambaken',
            'last_name' => 'Killiy',
            'suffix' => 'Ms.',

            'birth_date' => '1996-11-11',
            'birthplace' => 'Baguio City',
            'nationality' => 'Filipino',
            'gender' => 'Female',
            'mother_tongue' => 'English',
            'religion' => 'Catholic',

            'height' => '155',
            'weight' => '63',

            'mobile_number' => '09165438295',
            'email' => 'juliettKilliy@t.caims.com',
            'address' => 'Guisad Central, Baguio City',

            'emergency_contact_name' => 'John Doe',
            'emergency_contact_number' => '09176820755',
            'emergency_contact_address' => 'Trancoville',
            'emergency_contact_relationship' => 'Uncle',

            'pag_ibig' => 'FSAD4231',
            'philhealth' => 'FADS4231',
            'sss' => 'DAFS2134',
            'tin' => 'SADF1234',

            'password' => Hash::make('teacher123'),

            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Teacher');

        User::create([
            'first_name' => 'Cayden',
            'middle_name' => 'Zackary',
            'last_name' => 'Jackson',
            'suffix' => 'SA',

            'birth_date' => '2012-01-12',
            'birthplace' => 'Baguio City',
            'nationality' => 'Filipino',
            'gender' => 'Male',
            'mother_tongue' => 'English',
            'religion' => 'Iglesia ni Cristo',

            'height' => '165',
            'weight' => '57.2',

            'mobile_number' => '09274294577',
            'email' => 'jacksoncayden@s.caims.edu',
            'address' => 'Pablo Ocampo Sr. Ext, Baguio City',

            // For admission
            'grade_level' => 'Kinder',
            'latest_average_grade' => 'Passed',
            'status' => 'Able to Enroll',

            'emergency_contact_name' => 'John Doe',
            'emergency_contact_relationship' => 'Uncle',
            'emergency_contact_number' => '09176820767',
            'emergency_contact_address' => 'Trancoville',

            'password' => Hash::make('student1'),

            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Student');

        User::create([
            'first_name' => 'Frederick',
            'middle_name' => 'Miguel',
            'last_name' => 'Balon',
            'suffix' => 'SA',

            'birth_date' => '2011-06-20',
            'birthplace' => 'Sarrat, Ilocos Norte',
            'nationality' => 'Filipino',
            'gender' => 'Male',
            'mother_tongue' => 'Ilokano',
            'religion' => 'None',

            'height' => '143.5',
            'weight' => '41.6',

            'mobile_number' => '09983315305',
            'email' => 'balonfrederick@s.caims.edu',
            'address' => 'San Agustin, Baguio City',

            // For admission
            'grade_level' => 'Kinder',
            'latest_average_grade' => 'Passed',
            'status' => 'Able to Enroll',

            'emergency_contact_name' => 'John Doe',
            'emergency_contact_relationship' => 'Uncle',
            'emergency_contact_number' => '09176820768',
            'emergency_contact_address' => 'Trancoville',

            'password' => Hash::make('student2'),

            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Student');

        User::create([
            'first_name' => 'Jacqueline',
            'middle_name' => 'Audrina',
            'last_name' => 'Reyes',
            'suffix' => 'SA',

            'birth_date' => '2006-09-13',
            'birthplace' => 'Baguio City',
            'nationality' => 'Filipino',
            'gender' => 'Female',
            'mother_tongue' => 'Ilokano',
            'religion' => 'Catholic',

            'height' => '162.5',
            'weight' => '63.9',

            'mobile_number' => '09664861698',
            'email' => 'reyesjacqueline@s.caims.edu',
            'address' => 'Ben Harrison, Baguio City',

            // For admission
            'grade_level' => 'Kinder',
            'latest_average_grade' => 'Passed',
            'status' => 'Able to Enroll',

            'emergency_contact_name' => 'John Doe',
            'emergency_contact_relationship' => 'Uncle',
            'emergency_contact_number' => '09176820769',
            'emergency_contact_address' => 'Trancoville',

            'password' => Hash::make('student3'),

            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Student');
    }
}
