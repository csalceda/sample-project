<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrolleesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollees', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->string('school_year', 191)->nullable();
            $table->string('terms_of_payment', 191)->nullable();
            $table->string('tuition_total', 191)->nullable();
            $table->string('paid_upon_enrollment', 191)->nullable();
            $table->string('remaining_balance', 191)->nullable();
            $table->string('monthly_balance', 191)->nullable();
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
        Schema::dropIfExists('enrollees');
    }
}
