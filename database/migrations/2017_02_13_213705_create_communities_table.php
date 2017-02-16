<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('municipality_id')->unsigned();
            $table->foreign('municipality_id')
              ->references('id')
              ->on('municipalities')
              ->onUpdate('cascade');
              ->onDelete('cascade');
            $table->integer('nit');
            $table->string('name', 30);
            $table->text('address');
            $table->string('home_phone', 30);
            $table->string('auxiliary_phone', 30)->nullable();
            $table->string('cell_phone', 30)->nullable();
            $table->string('auxiliary_cell', 30)->nullable();
            $table->string('home_email');
            $table->string('auxiliary_email', 30)->nullable();
            $table->dateTime('opening_date');
            $table->dateTime('cancellation_date');
            $table->text('reason_retiring');
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
        Schema::dropIfExists('communities');
    }
}
