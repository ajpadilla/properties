<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infractions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_origin');
            $table->boolean('status');
            $table->date('date_notification');
            $table->text('description');
            $table->text('response')->nullable();
            $table->integer('type_infraction_id');
            $table->foreign('type_infraction_id')
              ->references('id')
              ->on('type_infractions')
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
        Schema::dropIfExists('infractions');
    }
}
