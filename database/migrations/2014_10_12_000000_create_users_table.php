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
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('suffix')->nullable();

            $table->date('birthdate');
            $table->string('birthplace');

            $table->string('religion');
            $table->string('gender');
            $table->string('mothertongue');
            $table->string('nationality');
            $table->string('pwdid')->unique()->nullable();

            // physical information
            $table->string('height')->nullable();
            $table->string('weight')->nullable();

            // contact information
            $table->string('mobilenumber')->unique();
            $table->string('email')->unique();
            $table->string('address');

            // educational background
            $table->string('school_kinder')->nullable();
            $table->string('school_kindergrad')->nullable();
            $table->string('school_elementary')->nullable();
            $table->string('school_elementarygrad')->nullable();
            $table->string('school_juniorhigh')->nullable();

            // academic information
            $table->string('lrn')->unique()->nullable();
            $table->string('esc')->unique()->nullable();
            $table->string('qvr')->unique()->nullable();
            $table->string('public_id')->unique()->nullable();

            $table->string('grade_level_id')->nullable();

            // this means the user is enrolled on the current academic year
            $table->boolean('currently_enrolled')->nullable();

            // government beneficiary
            $table->string('beneficiary')->nullable();

            // emergency contact information
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_number')->unique();
            $table->string('emergency_contact_occupation')->nullable();
            $table->string('emergency_contact_address');
            $table->string('emergency_contact_relationship');

            // parent information
            $table->string('mparent_name')->nullable();
            $table->string('mparent_number')->unique()->nullable();
            $table->string('mparent_occupation')->nullable();
            $table->string('mparent_address')->nullable();
            $table->string('fparent_name')->nullable();
            $table->string('fparent_number')->unique()->nullable();
            $table->string('fparent_occupation')->nullable();
            $table->string('fparent_address')->nullable();

            // for account information
            $table->string('pag_ibig')->unique()->nullable();
            $table->string('philhealth')->unique()->nullable();
            $table->string('sss')->unique()->nullable();
            $table->string('tin')->unique()->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('old_password')->nullable();
            $table->string('new_password')->nullable();
            $table->string('password_changed_at')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
