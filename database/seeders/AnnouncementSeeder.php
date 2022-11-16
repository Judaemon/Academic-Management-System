<?php

namespace Database\Seeders;

use App\Models\Announcement;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Carbon\Carbon;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Announcement::create([
            'title' => 'All Saints Day',
            'description' => "In observance of the All Saints' Day on November 1, 2022, and All Souls' Day on November 2, 2022, all online and limited face-to-face classes in all levels and office operations are suspended.",
            'start_date' => Carbon::create('2022', '10', '30'),
            'end_date' => Carbon::create('2022', '11', '02'),
            'main_image' => NULL,
            'category' => 'Holiday'
        ]);

        Announcement::create([
            'title' => 'Academic Break',
            'description' => 'No classes and work for all gradde levels. From October 28, 2022 to November 3, 2022',
            'start_date' => Carbon::create('2022', '10', '27'),
            'end_date' => Carbon::create('2022', '11', '03'),
            'main_image' => NULL,
            'category' => 'Event'
        ]);

        Announcement::create([
            'title' => 'Bonifacio Day',
            'description' => 'It is a national holiday commemorating Andrés Bonifacio, a national hero. Bonifacio was one of the founders of a secret society of revolutionaries commonly known as the Katipunan. Acknowledged as the "Father of the Philippine Revolution", he initiated the Philippine revolution against the Spanish Empire.',
            'start_date' => Carbon::create('2022', '11', '29'),
            'end_date' => Carbon::create('2022', '11', '30'),
            'main_image' => NULL,
            'category' => 'Holiday'
        ]);

        Announcement::create([
            'title' => 'The standard Lorem Ipsum passage, used since the 1500s',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'start_date' => Carbon::create('2022', '11', '14'),
            'end_date' => Carbon::create('2022', '11', '18'),
            'main_image' => NULL,
            'category' => 'Event'
        ]);
    }
}
