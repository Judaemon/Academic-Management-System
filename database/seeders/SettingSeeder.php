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
                'system_name' => 'CAIMS Name',
                'school_name' => 'CAIM School Name',
                'logo' => '/images/system-assets/logo/CAIMS_Logo_small.png',
                'address' => 'School Address',
                
                'mobile_1' => '1234567890',
                'mobile_2' => '0987654321',
                'telephone_1' => '1029384756',
                
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        Setting::insert($setting);
    }
}
