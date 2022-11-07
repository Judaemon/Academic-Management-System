<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();

            $table->string('first_quarter')->nullable();
            $table->string('second_quarter')->nullable();
            $table->string('third_quarter')->nullable();
            $table->string('fourth_quarter')->nullable();

            //$table->foreignId('subject_grade_level')->references('id')->on('grade_level_subject')->nullable();
            //$table->foreignId('subject_id')->references('id')->on('subjects')->nullable();
            $table->foreignId('student_id')->references('id')->on('users')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grades');
    }
};
