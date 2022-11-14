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

            $table->foreignId('accountant_id')
                ->constrained('users', 'id')
                ->onDelete('cascade');;

            $table->decimal('amount_paid', 10, 2)
                ->default('0');

            $table->foreignId('fee_id')
                ->nullable()
                ->constrained('fees', 'id')
                ->onDelete('cascade');

            $table->string('others')
                ->nullable();

            $table->decimal('balance', 10, 2)
                ->nullable();

            $table->string('payment_method');

            // Paid, Refunded, Pending
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
