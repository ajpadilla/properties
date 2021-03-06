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
            $table->text('description');
            $table->string('number', 50);
            $table->string('area', 50);
            $table->integer('number_habitants')->nullable();
            $table->integer('number_pets')->nullable();
            $table->text('address')->nullable();
            $table->string('registration_number', 20)->unique();
            $table->date('date_construction');
            $table->boolean('status');
            $table->boolean('reside_property')->nullable()->default(false);
            $table->string('type_contract', 30);
            $table->date('start_date_lease')->nullable();
            $table->date('end_date_lease')->nullable();
            $table->integer('type_property_id')->unsigned();
            $table->foreign('type_property_id')
            ->references('id')
            ->on('type_properties')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('community_id')->unsigned();
            $table->foreign('community_id')
            ->references('id')
            ->on('communities')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('person_id')->unsigned();
            $table->foreign('person_id')
            ->references('id')
            ->on('persons')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
