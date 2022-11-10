<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('academic_years', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->boolean('is_open_for_admission')->default('0');
            $table->string('status');

            $table->date('start_date');

            $table->integer('school_days')
                  ->nullable()
                  ->default('0');
            
            $table->date('end_date')
                  ->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('academic_years');
    }
};
