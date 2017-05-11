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
            $table->string('code', 45);
            $table->string('nit', 30);
            $table->string('name', 30);
            $table->string('home_phone', 30);
            $table->string('auxiliar_phone', 30);
            $table->string('home_email', 30);
            $table->string('auxiliar_email', 30);
            $table->string('url', 30);
            $table->string('subsidiary', 30);
            $table->date('opening_date');
            $table->date('cancellation_date');
            $table->integer('municipality_id')->unsigned();
            $table->foreign('municipality_id')
              ->references('id')
              ->on('municipalities')
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
        Schema::dropIfExists('banks');
    }
}
