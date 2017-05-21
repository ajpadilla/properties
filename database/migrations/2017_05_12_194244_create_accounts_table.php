<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number', 45);
            $table->boolean('status');
            $table->text('description')->nullable();
            $table->integer('bank_id')->unsigned();
            $table->foreign('bank_id')
              ->references('id')
              ->on('banks')
              ->onUpdate('cascade')
              ->onDelete('cascade');
            $table->integer('community_id')->unsigned();
            $table->foreign('community_id')
              ->references('id')
              ->on('communities')
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
        Schema::dropIfExists('accounts');
    }
}
