<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('grade_levels', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            
            $table->timestamps();
        });
    }

    // testing

    public function down()
    {
        Schema::dropIfExists('grade_levels');
    }
};
