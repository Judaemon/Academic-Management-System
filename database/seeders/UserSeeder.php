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
        // Super Admin
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

            'mobile_number' => '09176820721',
            'email' => 'sadmin@sadmin.com',
            'address' => 'Guisad Central, Baguio City',

            'kinder_name' => 'super kinder',
            'kinder_grad_date' => '2004',

            'elementary_name' => 'Calvary Baptist Elementary School',
            'elementary_grad_date' => '2010',

            'junior_high_name' => 'University of Baguio',
            'junior_high_grad_date' => '2014',

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

        // Admin | Staff
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

            'password' => Hash::make('student'),

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

        // Accountants
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

        // Teachers
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

        // Teacher 2
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

        // Teacher 3
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

        // Students
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

        // Student 2
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

        // Student 3
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

        // Student 4
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

        // Student 5
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

        // Student 6
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

        // Student 7
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

        // Student 8
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

        // Student 9
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

        // Student 10
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

        // Student 11
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

        // Student 12
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

        // Student 13
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

        // Student 14
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

        // Student 15
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

        // Student 16
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

        // Student 17
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

        // Student 18
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

        // Student 19
        User::create([
            'first_name' => 'Joni',
            'middle_name' => 'Algones',
            'last_name' => 'Aglipay',

            'birth_date' => '2006-07-23',
            'birth_place' => 'Baguio City',
            'religion' => 'Jehovah',
            'gender' => 'Female',
            'mother_tongue' => 'English',
            'nationality' => 'Filipino',

            'height' => '154.4',
            'weight' => '68.2',

            'mobile_number' => '09333862009',
            'email' => 'aglipayjoni@s.caims.edu',
            'address' => 'Tip Top, Baguio City',
            'emergency_contact_name' => 'John Doe',
            'emergency_contact_number' => '09656906472',
            'emergency_contact_address' => 'Trancoville',
            'emergency_contact_relationship' => 'Uncle',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('student17'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Student');

        // Student 20
        User::create([
            'first_name' => 'Johnrev',
            'middle_name' => 'Sayan',
            'last_name' => 'Gat-eb',

            'birth_date' => '2007-04-26',
            'birth_place' => 'Baguio City',
            'religion' => 'Born Again',
            'gender' => 'Male',
            'mother_tongue' => 'Tagalog',
            'nationality' => 'Filipino',

            'height' => '164.3',
            'weight' => '80.4',

            'mobile_number' => '09333235321',
            'email' => 'gatebjohnrev@s.caims.edu',
            'address' => 'Fairview, Baguio City',
            'emergency_contact_name' => 'John Doe',
            'emergency_contact_number' => '09657801423',
            'emergency_contact_address' => 'Trancoville',
            'emergency_contact_relationship' => 'Uncle',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('student17'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ])->assignRole('Student');
    }
}
