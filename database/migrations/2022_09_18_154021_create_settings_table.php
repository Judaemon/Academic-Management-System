<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string("institute_name")->default("Sample CAIMS");
            $table->string("institute_acronym")->default("Sample CAIMS");
            $table->string("logo")->default("images\system-assets\default\logo\CAIMS_Logo_small_1.png");
            $table->string("address")->default('Sample CAIMS Address');

            $table->foreignId('academic_year_id')->constrained('academic_years', 'id')->onDelete('cascade');

            // settings
            $table->boolean("notify_grades")->default(false);
            $table->boolean("notify_payments")->default(false);
            // ['Email', 'SMS', 'Email and SMS']
            $table->string("notification_channel")->default('email');
            // ['First quarter', 'Second quarter', 'Third quarter', 'Fourth quarter']
            $table->string("current_quarter")->default('First quarter');
            $table->boolean("isAbleToUploadGrade")->default(false);

            // theme
            $table->string("theme_color");
            $table->string("theme_background");

            // contacts
            $table->string("email")->default('caims@gmail.com');
            $table->string("mobile_1")->default('0968-227-6795');
            $table->string("mobile_2")->default('0917-895-0544');
            $table->string("telephone_1")->default('(074) 620 0585');

            // social links
            $table->string("website_link")->default('google.com');
            $table->string("facebook_link")->default('google.com');
            $table->string("instagram_link")->default('google.com');
            $table->string("twitter_link")->default('google.com');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
