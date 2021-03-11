<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTuitionFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuition_fees', function (Blueprint $table) {
            $table->id();
            $table->string('grade_level', 191)->nullable();
            $table->string('tuition_fee', 191)->nullable();
            $table->string('misc_fee', 191)->nullable();
            $table->string('others_fee', 191)->nullable();
            $table->string('total_due', 191)->nullable();
            $table->string('semestral_1', 191)->nullable();
            $table->string('semestral_2', 191)->nullable();
            $table->string('quarterly_1', 191)->nullable();
            $table->string('quarterly_2', 191)->nullable();
            $table->string('quarterly_3', 191)->nullable();
            $table->string('quarterly_4', 191)->nullable();
            $table->string('monthly_1', 191)->nullable();
            $table->string('monthly_2', 191)->nullable();
            $table->string('monthly_3', 191)->nullable();
            $table->string('monthly_4', 191)->nullable();
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
        Schema::dropIfExists('tuition_fees');
    }
}
