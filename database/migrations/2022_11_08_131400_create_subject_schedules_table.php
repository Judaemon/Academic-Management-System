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
        Schema::create('subject_schedules', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('time')->nullable();
            
            $table->date('day')
                  ->nullable();

            $table->foreignId('student_id')
                ->nullable()
                ->constrained('users', 'id')
                ->onDelete('cascade');

            $table->foreignId('subject_id')
                ->constrained()
                ->unsigned()
                ->onDelete('cascade');

            $table->foreignId('teacher_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_schedule');
    }
};
