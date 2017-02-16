<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code');
            $table->string('nit', 30);
            $table->string('name', 30);
            $table->string('home_phone', 30);
            $table->string('auxiliary_phone', 30)->nullable();
            $table->string('home_email');
            $table->string('auxiliary_email', 30)->nullable();
            $table->string('url', 30);
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')
              ->references('id')
              ->on('countries')
              ->onUpdate('cascade');
              ->onDelete('cascade');
            $table->string('subsidiary', 30);
            $table->dateTime('opening_date');
            $table->dateTime('cancellation_date');
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
        Schema::dropIfExists('banks');
    }
}
