<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_origin');
            $table->boolean('status');
            $table->text('description');
            $table->date('date_response')->nullable();
            $table->text('description_response')->nullable();
            $table->integer('type_service_id')->unsigned();
            $table->foreign('type_service_id')
              ->references('id')
              ->on('type_services')
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
        Schema::dropIfExists('services');
    }
}
