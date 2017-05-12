<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->text('question_rating');
            $table->integer('response_rating')->nullable();
            $table->date('date_rating')->nullable();
            $table->date('start_date');
            $table->date('ending_date');
            $table->text('description')->nullable();
            $table->integer('answer_number')->nullable();
            $table->integer('rating_id')->unsigned();
            $table->foreign('rating_id')
              ->references('id')
              ->on('ratings')
              ->onUpdate('cascade')
              ->onDelete('cascade');
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
        Schema::dropIfExists('surveys');
    }
}
