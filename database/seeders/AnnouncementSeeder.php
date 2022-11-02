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
            'description' => 'qwerty uiop asdfg hjkl zxc vbnmm',
            'date' => Carbon::create('2022', '11', '01'),
            'main_image' => NULL,
            // 'category'
        ]);

        Announcement::create([
            'title' => 'All Souls Day',
            'description' => 'qwerty uiop asdfg hjkl zxc vbnmm',
            'date' => Carbon::create('2022', '11', '02'),
            'main_image' => NULL,
            // 'category'
        ]);

        Announcement::create([
            'title' => 'Academic Break',
            'description' => 'No classes and work for all gradde levels. From October 28, 2022 to November 3, 2022',
            'date' => Carbon::now(),
            'main_image' => NULL,
            // 'category'
        ]);
    }
}
