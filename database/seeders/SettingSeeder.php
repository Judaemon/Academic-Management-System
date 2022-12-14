<?php

namespace Database\Seeders;

use App\Models\Setting;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

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
                'logo' => 'images\system\iscp_logo.png',
                'address' => 'Biringan Philippines',
                'academic_year_id' => '2',

                'notify_grades' => false,
                'notify_payments' => false,
                'notification_channel' => 'Email',
                'current_quarter' => "First quarter",
                'isAbleToUploadGrade' => false,

                'theme_color' => 'color1',
                'theme_background' => 'light-bg',
                'custom_theme_color' => '7c3aed',

                'email' => 'iscp@gmail.com',
                'mobile_1' => '0968-227-6795',
                'mobile_2' => '0917-895-0544',

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
