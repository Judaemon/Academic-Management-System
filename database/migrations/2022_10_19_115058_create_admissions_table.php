<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();

            // Pending, Admitted, Passed
            $table->string('status');

            $table->foreignId('academic_year_id')
                ->constrained('academic_years', 'id')
                ->onDelete('cascade');

            $table->foreignId('student_id')
                ->nullable()
                ->constrained('users', 'id')
                ->onDelete('cascade');

            $table->foreignId('enrolled_by')
                ->nullable()
                ->constrained('users', 'id')
                ->onDelete('cascade');

            $table->foreignId('admit_to_grade_level')
                ->constrained('grade_levels', 'id')
                ->onDelete('cascade');

            $table->foreignId('section_id')
                ->nullable()
                ->constrained('sections', 'id')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admissions');
    }
};
