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
            $table->decimal('cost')
                  ->default('0.00');

            // $table->foreignId('grade_level_id')
            //       ->unsigned()
            //       ->references('id')
            //       ->on('grade_level')
            //       ->nullable()
            //       ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fees');
    }
};
