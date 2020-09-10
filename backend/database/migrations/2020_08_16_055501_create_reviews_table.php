<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('reviews', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('recipe_id')->default(0);
        $table->unsignedBigInteger('user_id')->default(0);
        $table->integer('stars')->default(0);
        $table->text('comment');
        $table->timestamps();

        $table->foreign('recipe_id')->references('id')->on('recipes');
        $table->foreign('user_id')->references('id')->on('users');
        $table->unique(['recipe_id', 'user_id']);
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
