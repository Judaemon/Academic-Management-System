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

            $table->string("system_name")->default("Sample CAIMS");
            $table->string("school_name")->default("School Name Sample");
            $table->string("logo")->default("images\system-assets\default\logo\CAIMS_Logo_small_1.png");
            $table->string("address")->default('Addresss Sample');

            $table->string("mobile_1")->default('0968-227-6795');
            $table->string("mobile_2")->default('0917-895-0544');
            $table->string("telephone_1")->default('(074) 620 0585');
            
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
