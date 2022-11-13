<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            
            $table->string('fee_name');

            $table->decimal('amount', 10, 2)
                  ->default('0');

            $table->foreignId('grade_level_id')
                  ->nullable()
                  ->constrained('grade_levels', 'id')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fees');
    }
};
