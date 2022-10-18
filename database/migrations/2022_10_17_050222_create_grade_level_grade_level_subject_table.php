<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('grade_level_subject', function (Blueprint $table) {
            $table->foreignId('grade_level_id')->references('id')->on('grade_levels');
            $table->foreignId('subject_id')->references('id')->on('subjects');
        });
    }

    public function down()
    {
        Schema::dropIfExists('grade_level_subject');
    }
};
