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
        // ID order
        // 1 - Super Admin
        // 2 - Admin
        // 3 - Accountant
        // 4 - Accountant
        // 5 - Teacher
        // 6 - Teacher
        // 7 - Teacher

        // 1 Super Admin
        User::create([
            'first_name' => 'Super Admin',
            'middle_name' => 'Super Admin',
            'last_name' => 'Super Admin',
            'suffix' => 'SA',

            'birth_date' => '2000-10-21',
            'birth_place' => 'Baguio City',
            'nationality' => 'Filipino',
            'gender' => 'Male',
            'mother_tongue' => 'English',
            'religion' => 'Catholic',

            'weight' => '70',
            'height' => '168',
            'pwd_id' => 'ASDF1234',

            'mobile_number' => '+63 976 054 2645',
            'email' => 'sadmin@sadmin.com',
            'address' => 'Guisad Central, Baguio City',

            'kinder_name' => 'kinder school ABC',
            'kinder_grad_date' => '2001',

            'elementary_name' => 'Calvary Baptist Elementary School',
            'elementary_grad_date' => '2007',

            'junior_high_name' => 'University of Baguio',
            'junior_high_grad_date' => '2010',

            'lrn' => 'QWER1234',
            'esc' => 'ZXCV1234',
            'qvr' => 'HJKL1234',

            'mother_name' => 'Jane Doe',
            'mother_number' => '09176820723',
            'mother_email' => 'm@gmail.com',
            'mother_address' => 'General Luna',

            'father_name' => 'Jonathan Doe',
            'father_number' => '09176820724',
            'father_email' => 'f@gmail.com',
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

        // 1 Admin
        User::create([
            'first_name' => 'Alexander',
            'middle_name' => 'Churro',
            'last_name' => 'Am-uno',
            'suffix' => 'Jr.',

            'birth_date' => '2013-08-01',
            'birth_place' => 'Baguio City',
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

            'pag_ibig' => 'FSAD4239',
            'philhealth' => 'FADS4281',
            'sss' => 'DAFS2034',
            'tin' => 'SADF1434',

            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('staff123'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Admin');

        // 2 Accountant
        User::create([
            'first_name' => 'Leonardo',
            'middle_name' => 'Haroon',
            'last_name' => 'Jamie',
            'suffix' => 'II',

            'birth_date' => '1995-12-01',
            'birth_place' => 'Baguio City',
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
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('finance1'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Accountant');

        User::create([
            'first_name' => 'Mary',
            'middle_name' => 'Grace',
            'last_name' => 'Dela Cruz',

            'birth_date' => '1993-10-21',
            'birth_place' => 'Baguio City',
            'religion' => 'Anglican',
            'gender' => 'Female',
            'mother_tongue' => 'Tagalog',
            'nationality' => 'Filipino',

            'height' => '143',
            'weight' => '56',

            'mobile_number' => '09178492301',
            'email' => 'marygrace@a.caims.com',
            'address' => 'Trancoville, Baguio City',

            'emergency_contact_name' => 'Carding Dalisay',
            'emergency_contact_number' => '09152735932',
            'emergency_contact_address' => 'Bakakeng',
            'emergency_contact_relationship' => 'Uncle',

            'pag_ibig' => 'UIOP4213',
            'philhealth' => 'FSDA5231',
            'sss' => 'HJKL4213',
            'tin' => 'QWER0593',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('finance2'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Accountant');

        // 3 Teacher
        User::create([
            'first_name' => 'Julie',
            'middle_name' => 'Bondad',
            'last_name' => 'Abalos',

            'birth_date' => '1998-11-01',
            'birth_place' => 'Baguio City',
            'religion' => 'Catholic',
            'gender' => 'Female',
            'nationality' => 'Filipino',
            'gender' => 'Female',
            'mother_tongue' => 'English',
            'religion' => 'Catholic',

            'height' => '150',
            'weight' => '58',

            'mobile_number' => '09165438293',
            'email' => 'julsabalos@t.caims.com',
            'address' => 'Guisad Central, Baguio City',

            'emergency_contact_name' => 'John Doe',
            'emergency_contact_relationship' => 'Uncle',
            'emergency_contact_number' => '09176820744',
            'emergency_contact_address' => 'Trancoville',

            'pag_ibig' => '4231FSAD',
            'philhealth' => 'FADS4221',
            'sss' => 'DAFS3134',
            'tin' => 'SADF1534',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('teacher1'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Teacher');

        User::create([
            'first_name' => 'Russel',
            'middle_name' => 'Liclic',
            'last_name' => 'Fernandez',

            'birth_date' => '1990-05-14',
            'birth_place' => 'Baguio City',
            'religion' => 'Catholic',
            'gender' => 'Male',
            'mother_tongue' => 'English',
            'nationality' => 'Filipino',

            'height' => '175',
            'weight' => '76',

            'mobile_number' => '09215438295',
            'email' => 'russfernandez@t.caims.com',
            'address' => 'Leonila Hill, Baguio City',

            'emergency_contact_name' => 'John Doe',
            'emergency_contact_number' => '09216821021',

            'emergency_contact_address' => 'Crystal Cave',
            'emergency_contact_relationship' => 'Brother',
            'pag_ibig' => 'FSAD4643',
            'philhealth' => 'TYUI6894',
            'sss' => 'BNMA1453',
            'tin' => 'TYRU4213',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('teacher2'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Teacher');

        User::create([
            'first_name' => 'Heidi',
            'middle_name' => 'Jukutan',
            'last_name' => 'Tabanda',

            'birth_date' => '1997-07-02',
            'birth_place' => 'Baguio City',
            'religion' => 'Iglesia ni Cristo',
            'gender' => 'Female',
            'mother_tongue' => 'English',
            'nationality' => 'Filipino',
            'gender' => 'Female',
            'religion' => 'Catholic',

            'height' => '155',
            'weight' => '63',

            'mobile_number' => '09165438295',
            'email' => 'heiditabanda@t.caims.com',
            'address' => 'Badihoy, Baguio City',

            'emergency_contact_name' => 'John Doe',
            'emergency_contact_number' => '09166825342',
            'emergency_contact_address' => 'Trancoville',
            'emergency_contact_relationship' => 'Father',
            'pag_ibig' => 'FSAD0031',
            'philhealth' => 'FADS4200',
            'sss' => 'DASF1134',
            'tin' => 'FSAD6784',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('teacher3'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Teacher');
    }
}
