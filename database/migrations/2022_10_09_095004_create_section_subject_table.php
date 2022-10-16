<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('section_subject', function (Blueprint $table) {
            $table->foreignId('subject_id')
                ->constrained()
                ->unsigned()
                ->onDelete('cascade');
            $table->foreignId('section_id')
                ->constrained()
                ->unsigned()
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('section_subject');
    }
};
