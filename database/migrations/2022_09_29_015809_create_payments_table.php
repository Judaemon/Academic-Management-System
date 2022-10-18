<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                  ->constrained('users', 'id')
                  ->onDelete('cascade');

            $table->decimal('amount_paid')
                  ->default('0.00');
            
            $table->foreignId('fee_id')
                  ->nullable()
                  ->constrained('fees', 'id')
                  ->onDelete('cascade');
            
            $table->string('others')
                  ->nullable();

            // $table->enum('payment_status', [
            //     'refund',
            //     ''
            // ]);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
