<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('capacity');

            $table->foreignId('teacher_id')->references('id')->on('users')->nullable();

            // $table->bigInteger('grade_level_id'); // reference to grade_levels table
            $table->foreignId('grade_level_id')->references('id')->on('grade_levels')->default(0); // reference to grade_levels table

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sections');
    }
};
