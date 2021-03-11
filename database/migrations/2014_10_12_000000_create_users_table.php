<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->boolean('student_type')->nullable();
            $table->string('grade_level')->nullable();
            $table->string('lrn', 191)->nullable();
            $table->string('lastname', 191)->nullable();
            $table->string('firstname', 191)->nullable();
            $table->string('middlename', 191)->nullable();
            $table->string('requirements', 191)->nullable();
            $table->string('street_address', 191)->nullable();
            $table->string('barangay', 191)->nullable();
            $table->string('city', 191)->nullable();
            $table->date('birthday', 191)->nullable();
            $table->tinyInteger('age')->nullable();
            $table->string('birthplace', 191)->nullable();
            $table->string('gender', 191)->nullable();
            $table->string('nationality', 191)->nullable();
            $table->string('religion', 191)->nullable();
            $table->string('previous_school', 191)->nullable();
            $table->string('previous_grade_level', 191)->nullable();
            $table->string('previous_school_year', 191)->nullable();
            $table->string('previous_school_address', 191)->nullable();
            $table->string('father', 191)->nullable();
            $table->string('father_occupation', 191)->nullable();
            $table->string('father_tel', 191)->nullable();
            $table->string('father_cellphone', 191)->nullable();
            $table->string('father_email', 191)->nullable()->unique();
            $table->string('father_occupation_address', 191)->nullable();
            $table->string('mother', 191)->nullable();
            $table->string('mother_occupation', 191)->nullable();
            $table->string('mother_tel', 191)->nullable();
            $table->string('mother_cellphone', 191)->nullable();
            $table->string('mother_email', 191)->nullable()->unique();
            $table->string('mother_occupation_address', 191)->nullable();
            $table->string('guardian', 191)->nullable();
            $table->string('guardian_occupation', 191)->nullable();
            $table->string('guardian_tel', 191)->nullable();
            $table->string('guardian_cellphone', 191)->nullable();
            $table->string('guardian_email', 191)->nullable()->unique();
            $table->string('guardian_occupation_address', 191)->nullable();
            // $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
