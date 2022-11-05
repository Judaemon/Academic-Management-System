<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // personal information
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('suffix')->nullable();

            $table->date('birth_date');
            $table->string('birthplace');
            $table->string('nationality');
            $table->string('gender');
            $table->string('mother_tongue');
            $table->string('religion')->nullable();

            // physical information
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('pwd_id')->unique()->nullable();

            // contact information
            $table->string('mobile_number')->unique();
            $table->string('email')->unique();
            $table->string('address');

            // educational background
            $table->string('kinder_name')->nullable();
            $table->string('kinder_grad_date')->nullable();

            $table->string('elementary_name')->nullable();
            $table->string('elementary_grad_date')->nullable();

            $table->string('junior_high_name')->nullable();
            $table->string('junior_high_grad_date')->nullable();

            // academic information
            $table->string('lrn')->unique()->nullable();
            $table->string('esc')->unique()->nullable();
            $table->string('qvr')->unique()->nullable();

            // parent information
            $table->string('mother_name')->nullable();
            $table->string('mother_number')->unique()->nullable();
            $table->string('mother_email')->unique()->nullable();
            $table->string('mother_address')->nullable();

            $table->string('father_name')->nullable();
            $table->string('father_number')->unique()->nullable();
            $table->string('father_email')->unique()->nullable();
            $table->string('father_address')->nullable();

            // emergency contact information
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_relationship');
            $table->string('emergency_contact_number')->unique();
            $table->string('emergency_contact_address');

            // account
            $table->string('password');

            // For non student accounts
            $table->string('pag_ibig')->unique()->nullable();
            $table->string('philhealth')->unique()->nullable();
            $table->string('sss')->unique()->nullable();
            $table->string('tin')->unique()->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('old_password')->nullable();
            $table->string('new_password')->nullable();
            $table->string('password_changed_at')->nullable();

            // For admission
            // If there is no data on the admission table, that means a transferee or a new student.
            // If theres no record on the admission table this will be displayed
            $table->string('grade_level')->nullable();
            $table->string('latest_average_grade')->nullable();
            $table->string('status')->nullable();

            $table->string('grade_level_id')->nullable();

            // this means the user is enrolled on the current academic year
            $table->boolean('currently_enrolled')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
