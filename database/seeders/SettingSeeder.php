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
                'institute_name' => 'International State College of the Philippines',
                'institute_acronym' => 'ISCP AIMS',
                'logo' => 'images\system-assets\default\logo\iscp_logo.png',
                'address' => 'Biringan Philippines',
                'academic_year_id' => '1',
                
                'email' => 'iscp@gmail.com',
                'mobile_1' => '0968-227-6795',
                'mobile_2' => '0917-895-0544',

                'profile_editing' => false,
                'notify_grades' => false,
                'notify_payments' => false,
                'notification_type' => "none",
                
                'website_link' => 'google.com',
                'facebook_link' => 'facebook.com',
                'instagram_link' => 'instagram.com',
                'twitter_link' => 'twitter.com',
                
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        Setting::insert($setting);
    }
}
