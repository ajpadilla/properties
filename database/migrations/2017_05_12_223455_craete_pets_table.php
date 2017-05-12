<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CraetePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->string('vaccination_card', 20);
            $table->date('date_carnet_vaccination');
            $table->integer('type_animal_id')->unsigned();
            $table->foreign('type_animal_id')
              ->references('id')
              ->on('type_animals')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->integer('property_id')->unsigned();
            $table->foreign('property_id')
              ->references('id')
              ->on('properties')
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
        Schema::dropIfExists('pets');
    }
}
