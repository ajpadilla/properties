<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_property_id')->unsigned();
            $table->foreign('type_property_id')
                        ->references('id')
                      ->on('type_properties')
                      ->onDelete('restrict')
                      ->onUpdate('cascade');
            $table->integer('community_id')->unsigned();
            $table->foreign('community_id')
                        ->references('id')
                      ->on('communities')
                      ->onDelete('restrict')
                      ->onUpdate('cascade');
            $table->integer('person_id')->unsigned();
            $table->foreign('person_id')
                        ->references('id')
                      ->on('persons')
                      ->onDelete('restrict')
                      ->onUpdate('cascade');
            $table->text('description');
            $table->string('number', 50);
            $table->string('area', 50);
            $table->integer('number_habitants');
            $table->integer('number_pets');
            $table->text('address');
            $table->string('registration_number', 20);
            $table->date('daate_construction');
            $table->boolean('state');
            $table->integer('type_property_contract_id')->unsigned();
            $table->foreign('type_property_contract_id')
                        ->references('id')
                      ->on('types_property_contracts')
                      ->onDelete('restrict')
                      ->onUpdate('cascade');
            $table->boolean('reside_property');
            $table->dateTime('start_date_lease');
            $table->dateTime('end_date_lease');
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
        Schema::dropIfExists('properties');
    }
}
