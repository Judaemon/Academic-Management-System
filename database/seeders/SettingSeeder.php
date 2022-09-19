<?php

namespace Database\Seeders;

use App\Models\Setting;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'id' => '1',
                'system_name' => 'CAIMS',
                'school_name' => 'CAIMS',
                // 'logo' => '',
                'address' => 0,
                
                'mobile_1' => '9631532939',
                'mobile_2' => '9719646154',
                'telephone_1' => '2124567890',
                
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        Setting::insert($setting);
    }
}
