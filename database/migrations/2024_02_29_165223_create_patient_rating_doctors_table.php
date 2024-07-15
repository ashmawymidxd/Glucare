<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_rating_doctors', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->integer('doctor_id');
            $table->integer('user_rating');
            $table->string('user_review');
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
        Schema::dropIfExists('patient_rating_doctors');
    }
};
