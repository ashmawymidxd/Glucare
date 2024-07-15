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
        Schema::create('dietary_recommendations', function (Blueprint $table) {
            $table->id();
            $table->text('breakfast');
            $table->text('lunch');
            $table->text('dinner');
            $table->longText('image');
            $table->string('totalCalories');
            $table->string('carbohydrates');
            $table->string('proteins');
            $table->string('fats');
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
        Schema::dropIfExists('dietary_recommendations');
    }
};
