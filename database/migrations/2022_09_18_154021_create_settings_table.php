<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            // institute dapat
            $table->string("institute_name")->default("Sample CAIMS");
            $table->string("institute_acronym")->default("Sample CAIMS");
            $table->string("logo")->default("images\system-assets\default\logo\CAIMS_Logo_small_1.png");
            $table->string("address")->default('Sample CAIMS Addresss');
            
            // settings
            $table->string("academic_year")->default('2022');
            $table->boolean("profile_editing")->default(false);
            $table->string("notification_type")->default(null); // none | email | sms | both (email and sms)
            $table->boolean("notify_grades")->default(false);
            $table->boolean("notify_payments")->default(false);
            // mga feature na pedeng enable and disable
            // profile editing: bool
            // notification type: none | email | sms | both (email and sms)
            // notify grades: bool
            // notify payments: bool
            // skins: [presets names] //tailwind class

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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
