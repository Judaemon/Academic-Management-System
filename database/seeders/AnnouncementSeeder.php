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
            'title' => 'Christmas Break',
            'description' => 'No classes all levels.',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(7),
            'main_image' => NULL,
            'category' => 'Holiday'
        ]);
    }
}
