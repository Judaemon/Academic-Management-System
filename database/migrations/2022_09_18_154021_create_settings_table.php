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

            $table->string("system_name")->default("CAIMS");
            $table->string("school_name")->default("CAIMS School");
            $table->string("logo")->nullable();
            $table->string("address")->nullable();

            $table->string("mobile_1")->nullable();
            $table->string("mobile_2")->nullable();
            $table->string("telephone_1")->nullable();
            
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
