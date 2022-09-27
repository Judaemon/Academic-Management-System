<?php

namespace Database\Seeders;

use App\Models\Setting;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = [
            [
                'system_name' => 'ISCP AIMS',
                'school_name' => 'International State College of the Philippines',
                'logo' => 'images\system-assets\default\logo\iscp_logo.png',
                'address' => 'Biringan Philippines',
                
                'mobile_1' => '0968-227-6795',
                'mobile_2' => '0917-895-0544',
                'telephone_1' => '(02) 470-8922',
                
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        Setting::insert($setting);
    }
}
