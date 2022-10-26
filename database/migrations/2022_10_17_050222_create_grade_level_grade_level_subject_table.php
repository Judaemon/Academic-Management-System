<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Not used
        // Grade levels has a "one to many" relationship to subjects
        Schema::create('grade_level_subject', function (Blueprint $table) {
            $table->foreignId('grade_level_id')->onDelete('cascade');
            $table->foreignId('subject_id')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('grade_level_subject');
    }
};
