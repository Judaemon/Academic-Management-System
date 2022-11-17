<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    // 20 Students
    // 3 Student per grade level
    // 2 student pending for admission

    // ID starts with 8
    public function run()
    {
        User::create([
            'first_name' => 'Cayden',
            'middle_name' => 'Zackary',
            'last_name' => 'Jackson',
            'suffix' => 'SA',

            'birth_date' => '2012-01-12',
            'birth_place' => 'Baguio City',
            'nationality' => 'Filipino',
            'gender' => 'Male',
            'mother_tongue' => 'English',
            'religion' => 'Iglesia ni Cristo',

            'height' => '165',
            'weight' => '57.2',

            'mobile_number' => '09274294577',
            'email' => 'jacksoncayden@s.caims.edu',
            'address' => 'Pablo Ocampo Sr. Ext, Baguio City',

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
            'birth_place' => 'Sarrat, Ilocos Norte',
            'nationality' => 'Filipino',
            'gender' => 'Male',
            'mother_tongue' => 'Ilokano',
            'religion' => 'None',

            'height' => '143.5',
            'weight' => '41.6',

            'mobile_number' => '09983315305',
            'email' => 'balonfrederick@s.caims.edu',
            'address' => 'San Agustin, Baguio City',

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
            'birth_place' => 'Baguio City',
            'nationality' => 'Filipino',
            'gender' => 'Female',
            'mother_tongue' => 'Ilokano',
            'religion' => 'Catholic',

            'height' => '162.5',
            'weight' => '63.9',

            'mobile_number' => '09664861698',
            'email' => 'reyesjacqueline@s.caims.edu',
            'address' => 'Ben Harrison, Baguio City',

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
        // Jacqueline is student_id = 10

        User::create([
            'first_name' => 'Jose',
            'middle_name' => 'Go',
            'last_name' => 'Chan',

            'birth_date' => '2004-10-02',
            'birth_place' => 'Baguio City',
            'religion' => 'Catholic',
            'gender' => 'Male',
            'mother_tongue' => 'English',
            'nationality' => 'Filipino',

            'height' => '170.2',
            'weight' => '70.4',

            'mobile_number' => '09224661698',
            'email' => 'chanjose@s.caims.edu',
            'address' => 'Legarda, Baguio City',

            'emergency_contact_name' => 'John Doe',
            'emergency_contact_number' => '09176885662',
            'emergency_contact_address' => 'Trancoville',
            'emergency_contact_relationship' => 'Uncle',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('student4'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Student');

        User::create([
            'first_name' => 'Stacey',
            'middle_name' => 'Balicha',
            'last_name' => 'Bautista',

            'birth_date' => '2005-04-04',
            'birth_place' => 'Baguio City',
            'religion' => 'Catholic',
            'gender' => 'Female',
            'mother_tongue' => 'English',
            'nationality' => 'Filipino',

            'height' => '156.8',
            'weight' => '65.2',

            'mobile_number' => '09334861423',
            'email' => 'bautistastacey@s.caims.edu',
            'address' => 'Crystal Cave, Baguio City',
            'emergency_contact_name' => 'John Doe',
            'emergency_contact_number' => '09176853251',
            'emergency_contact_address' => 'Trancoville',
            'emergency_contact_relationship' => 'Uncle',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('student5'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Student');
        // Stacey is student_id = 12

        User::create([
            'first_name' => 'Beatrice',
            'middle_name' => 'Tan',
            'last_name' => 'Choy',

            'birth_date' => '2007-11-11',
            'birth_place' => 'Baguio City',
            'religion' => 'Catholic',
            'gender' => 'Female',
            'mother_tongue' => 'English',
            'nationality' => 'Filipino',

            'height' => '165',
            'weight' => '65',

            'mobile_number' => '09174861699',
            'email' => 'choybeatrice@s.caims.edu',
            'address' => 'Easter Hills, Baguio City',
            'emergency_contact_name' => 'John Doe',
            'emergency_contact_number' => '09216820760',
            'emergency_contact_address' => 'Trancoville',
            'emergency_contact_relationship' => 'Uncle',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('student6'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Student');

        User::create([
            'first_name' => 'Ivan',
            'middle_name' => 'Carpio',
            'last_name' => 'Aquino',

            'birth_date' => '2006-01-04',
            'birth_place' => 'Baguio City',
            'religion' => 'None',
            'gender' => 'Male',
            'mother_tongue' => 'Ilokano',
            'nationality' => 'Filipino',

            'height' => '166.5',
            'weight' => '76.3',

            'mobile_number' => '09124861694',
            'email' => 'aquinoivan@s.caims.edu',
            'address' => 'San Luis, Baguio City',
            'emergency_contact_name' => 'John Doe',
            'emergency_contact_number' => '09246820532',
            'emergency_contact_address' => 'Trancoville',
            'emergency_contact_relationship' => 'Uncle',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('student7'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Student');

        User::create([
            'first_name' => 'Eric',
            'middle_name' => 'Bondad',
            'last_name' => 'Labos',

            'birth_date' => '2005-12-25',
            'birth_place' => 'Baguio City',
            'religion' => 'Anglican',
            'gender' => 'Male',
            'mother_tongue' => 'English',
            'nationality' => 'Filipino',

            'height' => '164.3',
            'weight' => '62.4',

            'mobile_number' => '09334861532',
            'email' => 'laboseric@s.caims.edu',
            'address' => 'Brookside, Baguio City',
            'emergency_contact_name' => 'John Doe',
            'emergency_contact_number' => '09666820436',
            'emergency_contact_address' => 'Trancoville',
            'emergency_contact_relationship' => 'Uncle',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('student8'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Student');
        // Eric is student_id = 15

        User::create([
            'first_name' => 'Charles',
            'middle_name' => 'Lim',
            'last_name' => 'Choi',

            'birth_date' => '2003-11-13',
            'birth_place' => 'Baguio City',
            'religion' => 'Catholic',
            'gender' => 'Male',
            'mother_tongue' => 'English',
            'nationality' => 'Filipino',

            'height' => '169.4',
            'weight' => '72.6',

            'mobile_number' => '09094861321',
            'email' => 'choicharles@s.caims.edu',
            'address' => 'Malvar, Baguio City',
            'emergency_contact_name' => 'John Doe',
            'emergency_contact_number' => '09776820654',
            'emergency_contact_address' => 'Trancoville',
            'emergency_contact_relationship' => 'Uncle',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('student9'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Student');

        User::create([
            'first_name' => 'Jin',
            'middle_name' => 'Daewo',
            'last_name' => 'Mori',

            'birth_date' => '2012-10-21',
            'birth_place' => 'Seoul',
            'religion' => 'None',
            'gender' => 'Male',
            'mother_tongue' => 'Hangugeo',
            'nationality' => 'Korean',

            'height' => '147.2',
            'weight' => '43.4',

            'mobile_number' => '09334864215',
            'email' => 'morijin@s.caims.edu',
            'address' => 'Goshen Land, Baguio City',
            'emergency_contact_name' => 'John Doe',
            'emergency_contact_number' => '09776820420',
            'emergency_contact_address' => 'Trancoville',
            'emergency_contact_relationship' => 'Uncle',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('student10'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Student');

        User::create([
            'first_name' => 'Inori',
            'middle_name' => 'Bijin',
            'last_name' => 'Minase',

            'birth_date' => '2010-11-21',
            'birth_place' => 'Tokyo',
            'religion' => 'None',
            'gender' => 'Female',
            'mother_tongue' => 'Hiragana',
            'nationality' => 'Japanese',

            'height' => '154.4',
            'weight' => '54.5',

            'mobile_number' => '09224423215',
            'email' => 'minaseinori@s.caims.edu',
            'address' => 'Megatower Residences, Baguio City',
            'emergency_contact_name' => 'John Doe',
            'emergency_contact_number' => '09226820690',
            'emergency_contact_address' => 'Trancoville',
            'emergency_contact_relationship' => 'Uncle',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('student11'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Student');

        User::create([
            'first_name' => 'Kyla',
            'middle_name' => 'Garcia',
            'last_name' => 'Lao',

            'birth_date' => '2007-04-03',
            'birth_place' => 'La Union',
            'religion' => 'Catholic',
            'gender' => 'Female',
            'mother_tongue' => 'Tagalog',
            'nationality' => 'Filipino',

            'height' => '157.8',
            'weight' => '77.5',

            'mobile_number' => '09125331215',
            'email' => 'laokyla@s.caims.edu',
            'address' => 'Loakan, Baguio City',
            'emergency_contact_name' => 'John Doe',
            'emergency_contact_number' => '09758392300',
            'emergency_contact_address' => 'Trancoville',
            'emergency_contact_relationship' => 'Uncle',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('student12'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Student');

        User::create([
            'first_name' => 'Philip',
            'middle_name' => 'Algones',
            'last_name' => 'Sy',

            'birth_date' => '2004-05-15',
            'birth_place' => 'Baguio City',
            'religion' => 'Catholic',
            'gender' => 'Male',
            'mother_tongue' => 'English',
            'nationality' => 'Filipino',

            'height' => '173',
            'weight' => '72.4',

            'mobile_number' => '09234864530',
            'email' => 'syphilip@s.caims.edu',
            'address' => 'Camp 7, Baguio City',
            'emergency_contact_name' => 'John Doe',
            'emergency_contact_number' => '09770000420',
            'emergency_contact_address' => 'Trancoville',
            'emergency_contact_relationship' => 'Uncle',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('student13'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Student');
        // 20

        User::create([
            'first_name' => 'Derek',
            'middle_name' => 'Arboleda',
            'last_name' => 'Sanchez',

            'birth_date' => '2006-04-26',
            'birth_place' => 'Pangasinan',
            'religion' => 'Catholic',
            'gender' => 'Male',
            'mother_tongue' => 'Tagalog',
            'nationality' => 'Filipino',

            'height' => '164',
            'weight' => '78.3',

            'mobile_number' => '09114324234',
            'email' => 'sanchezderek@s.caims.edu',
            'address' => 'Quezon Hill, Baguio City',
            'emergency_contact_name' => 'John Doe',
            'emergency_contact_number' => '09996869420',
            'emergency_contact_address' => 'Trancoville',
            'emergency_contact_relationship' => 'Uncle',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('student14'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Student');

        User::create([
            'first_name' => 'Jenevy',
            'middle_name' => 'Rabina',
            'last_name' => 'Paran',

            'birth_date' => '2012-08-09',
            'birth_place' => 'Cagayan',
            'religion' => 'Catholic',
            'gender' => 'Female',
            'mother_tongue' => 'Tagalog',
            'nationality' => 'Filipino',

            'height' => '147.3',
            'weight' => '54.3',

            'mobile_number' => '09116544790',
            'email' => 'paranjenevy@s.caims.edu',
            'address' => 'Camdas, Baguio City',
            'emergency_contact_name' => 'John Doe',
            'emergency_contact_number' => '09090894231',
            'emergency_contact_address' => 'Trancoville',
            'emergency_contact_relationship' => 'Uncle',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('student15'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Student');

        User::create([
            'first_name' => 'Aaron',
            'middle_name' => 'Co',
            'last_name' => 'Aoyong',

            'birth_date' => '2006-02-28',
            'birth_place' => 'Baguio City',
            'religion' => 'None',
            'gender' => 'Male',
            'mother_tongue' => 'English',
            'nationality' => 'Filipino',

            'height' => '181.3',
            'weight' => '75.7',

            'mobile_number' => '09224866520',
            'email' => 'aoyongaaron@s.caims.edu',
            'address' => 'Legarda, Baguio City',
            'emergency_contact_name' => 'John Doe',
            'emergency_contact_number' => '09336827565',
            'emergency_contact_address' => 'Trancoville',
            'emergency_contact_relationship' => 'Uncle',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('student16'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Student');

        User::create([
            'first_name' => 'Cedrix',
            'middle_name' => 'Lourdes',
            'last_name' => 'Orendain',

            'birth_date' => '2008-06-01',
            'birth_place' => 'Baguio City',
            'religion' => 'Iglesia ni Cristo',
            'gender' => 'Male',
            'mother_tongue' => 'Tagalog',
            'nationality' => 'Filipino',

            'height' => '160.2',
            'weight' => '63.6',

            'mobile_number' => '09444862213',
            'email' => 'orendaincedrix@s.caims.edu',
            'address' => 'San Carlos, Baguio City',
            'emergency_contact_name' => 'John Doe',
            'emergency_contact_number' => '09110903421',
            'emergency_contact_address' => 'Trancoville',
            'emergency_contact_relationship' => 'Uncle',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('student17'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Student');

        User::create([
            'first_name' => 'Dahren',
            'middle_name' => 'Bautista',
            'last_name' => 'Aquino',

            'birth_date' => '2004-10-30',
            'birth_place' => 'Baguio City',
            'religion' => 'None',
            'gender' => 'Male',
            'mother_tongue' => 'English',
            'nationality' => 'Filipino',

            'height' => '168.4',
            'weight' => '70.4',

            'mobile_number' => '09554863421',
            'email' => 'aquinodahren@s.caims.edu',
            'address' => 'Suello, Baguio City',
            'emergency_contact_name' => 'John Doe',
            'emergency_contact_number' => '09770900908',
            'emergency_contact_address' => 'Trancoville',
            'emergency_contact_relationship' => 'Uncle',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('student17'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Student');

        User::create([
            'first_name' => 'ff',
            'middle_name' => 'mm',
            'last_name' => 'll',

            'birth_date' => '2004-10-30',
            'birth_place' => 'Baguio City',
            'religion' => 'None',
            'gender' => 'Male',
            'mother_tongue' => 'English',
            'nationality' => 'Filipino',

            'height' => '168.4',
            'weight' => '70.4',

            'mobile_number' => '09554863422',
            'email' => 'ffmm@s.caims.edu',
            'address' => 'Suello, Baguio City',
            'emergency_contact_name' => 'John Doe',
            'emergency_contact_number' => '09770900909',
            'emergency_contact_address' => 'Trancoville',
            'emergency_contact_relationship' => 'Uncle',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('student19'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Student');

        User::create([
            'first_name' => 'f',
            'middle_name' => 'm',
            'last_name' => 'l',

            'birth_date' => '2004-10-30',
            'birth_place' => 'Baguio City',
            'religion' => 'None',
            'gender' => 'Male',
            'mother_tongue' => 'English',
            'nationality' => 'Filipino',

            'height' => '168.4',
            'weight' => '70.4',

            'mobile_number' => '09554863425',
            'email' => 'fm@s.caims.edu',
            'address' => 'Suello, Baguio City',
            'emergency_contact_name' => 'John Doe',
            'emergency_contact_number' => '097709009081',
            'emergency_contact_address' => 'Trancoville',
            'emergency_contact_relationship' => 'Uncle',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('student20'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Student');
        // 27

        // teacher_id = 28
        User::create([
            'first_name' => 'Arceli',
            'middle_name' => 'Sanchez',
            'last_name' => 'Arboleda',

            'birth_date' => '1995-08-03',
            'birth_place' => 'Pangasinan',
            'religion' => 'Born Again',
            'gender' => 'Female',
            'mother_tongue' => 'English',
            'nationality' => 'Filipino',
            'gender' => 'Female',
            'religion' => 'Catholic',

            'height' => '157',
            'weight' => '62',

            'mobile_number' => '09175458200',
            'email' => 'arceliarboleda@t.caims.com',
            'address' => 'Quezon Hill, Baguio City',

            'emergency_contact_name' => 'John Doe',
            'emergency_contact_number' => '09162345344',
            'emergency_contact_address' => 'Trancoville',
            'emergency_contact_relationship' => 'Father',
            'pag_ibig' => 'FSAD4431',
            'philhealth' => 'FADS4440',
            'sss' => 'DASF1444',
            'tin' => 'FSAD4444',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('teacher4'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Teacher');
    }
}
