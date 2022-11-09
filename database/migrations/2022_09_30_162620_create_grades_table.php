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

            $table->foreignId('student_id')
                ->nullable()
                ->constrained('users', 'id')
                ->onDelete('cascade');

            $table->foreignId('section_id')
                ->nullable()
                ->constrained('sections', 'id')
                ->onDelete('cascade');

            $table->foreignId('subject_id')
                ->nullable()
                ->constrained('subjects', 'id')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grades');
    }
};
